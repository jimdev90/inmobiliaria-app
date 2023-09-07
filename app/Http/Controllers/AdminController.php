<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function adminLogin()
    {
        return view('admin.admin_login');
    }

    public function adminPerfil()
    {
        $perfilData = Auth::user();
        return view('admin.admin_perfil', compact('perfilData'));
    }

    public function adminPerfilUpdate(Request $request)
    {
        $data = Auth::user();
        $data->nombres = $request->nombres;
        $data->apellidos = $request->apellidos;
        $data->telefono = $request->telefono;
        $data->direccion = $request->direccion;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            @unlink(public_path('upload/admin_images/' . $data->imagen));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->imagen = $filename;
        }

        $data->save();

        toastr('Los datos del usuario se han actualizado correctamente', 'success', 'Felicitaciones');
        return redirect()->route('admin.perfil');
    }

    public function adminPassword()
    {
        $perfilData = Auth::user();
        return view('admin.admin_cambiar_password', compact('perfilData'));
    }

    public function adminPasswordUpdate(Request $request)
    {
        $request->validate([
            "current_password" => ["required"],
            "password" => ["required", "confirmed"]
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            toastr()->error("La contraseña actual ingresada es incorrecta", "Lo sentimos!");
            return redirect()->back();
        }

        $request->user()->update([
            "password" => bcrypt($request->current_password)
        ]);

        toastr()->success("La contraseña se ha actualizado correctamente", "Felicitaciones!");
        return redirect()->back();
    }
}
