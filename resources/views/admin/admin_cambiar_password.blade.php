@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">


        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle"
                                     src="{{ (!empty($perfilData->imagen)) ? url('upload/admin_images/'.$perfilData->imagen) : url('upload/no_image.jpg') }}"
                                     alt="profile">
                                <span class="h4 ms-3 ">{{ $perfilData->username }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Nombres y Apellidos:</label>
                            <p class="text-muted">{{ $perfilData->nombres }} {{ $perfilData->apellidos }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $perfilData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Teléfono:</label>
                            <p class="text-muted">{{ $perfilData->telefono }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Dirección:</label>
                            <p class="text-muted">{{ $perfilData->direccion }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Actualizar Contraseña</h6>

                            <form action="{{ route('admin.password.update') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Contraseña actual</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                                           name="current_password">
                                    @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                           name="password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                           name="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
