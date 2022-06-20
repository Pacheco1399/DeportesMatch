@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Usuario') }}</div>



                    <div class="card-body">





                        <form method="POST" action="{{ route('almacen.usuario') }}">
                            @csrf

                            <div class="form-group row">

                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nombre') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Apellido Paterno') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="apellido_paterno" type="text"
                                        class="form-control @error('apellido_paterno') is-invalid @enderror"
                                        name="apellido_paterno" value="{{ old('apellido_paterno') }}" required
                                        autocomplete="apellido_paterno" autofocus>

                                    @error('apellido_paterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Apellido Materno') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="apellido_materno" type="text"
                                        class="form-control @error('apellido_materno') is-invalid @enderror"
                                        name="apellido_materno" value="{{ old('apellido_materno') }}" required
                                        autocomplete="apellido_materno" autofocus>

                                    @error('apellido_materno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">

                                <div class="col-md-4" style="text-align-last: right">
                                    <label for="rut" class="col-form-label text-md-right">{{ __('Rut') }}
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                        name="rut" maxlength="9" value="{{ old('rut') }}" required>
                                </div>

                                @if (session('error'))
                                    <h2 class="text-danger" style="text-align: center">
                                        {{ session('error') }}
                                    </h2>
                                @endif




                            </div>

                            <div class="form-group row">

                                <div class="col-md-4" style="text-align-last: right">
                                    <label for="rol" class="col-form-label text-md-right">{{ __('Rol') }}
                                    </label>

                                </div>

                                <div class="col-md-6">

                                    <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror"
                                        required>

                                        <option>Seleccionar</option>
                                        <option value="2">Moderador</option>
                                        <option value="3">Usuario</option>

                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <input id="estado" type="hidden"
                                        class="form-control @error('estado') is-invalid @enderror" name="estado" value="1"
                                        required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Contraseña') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
