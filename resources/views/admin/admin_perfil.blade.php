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

                            <h6 class="card-title">Actualizar información básica de usuario</h6>

                            <form action="{{ route('admin.perfil.update') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           autocomplete="off" value="{{ $perfilData->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres"
                                           name="nombres" autocomplete="off" value="{{ $perfilData->nombres }}">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                                           autocomplete="off" value="{{ $perfilData->apellidos }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ $perfilData->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                           autocomplete="off" value="{{ $perfilData->telefono }}">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                           autocomplete="off" value="{{ $perfilData->direccion }}">
                                </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" />
                                </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label"></label>
                                    <img id="showImage" class="wd-80 rounded-circle"
                                         src="{{ (!empty($perfilData->photo)) ? url('upload/admin_images/'.$perfilData->photo) : url('upload/no_image.jpg') }}"
                                         alt="profile">
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
@push('scripts_custom')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#imagen').change(function (e) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
