@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
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
                                        name="rut" maxlength="10" placeholder="Formato: 11111111-1"
                                        value="{{ old('rut') }}" required>
                                </div>
                                


                            </div>



                            <input id="rol" type="hidden" class="form-control" name="rol" value="3" required>

                            <input id="estado" type="hidden" class="form-control" name="estado" value="1" required>




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


    <script>
        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut: function(rutCompleto) {
                //console.log(rutCompleto);
                rutCompleto = rutCompleto.replace("‐", "-");
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                    return false;
                var tmp = rutCompleto.split('-');
                var digv = tmp[1];
                var rut = tmp[0];
                if (digv == 'K') digv = 'k';

                return (Fn.dv(rut) == digv);
            },
            dv: function(T) {
                var M = 0,
                    S = 1;
                for (; T; T = Math.floor(T / 10))
                    S = (S + T % 10 * (9 - M++ % 6)) % 11;
                return S ? S - 1 : 'k';
            }
        }
        $(document).ready(function() {
            $('#rut').on('change', function() {
                var rut = document.getElementById('rut').value;
                //console.log(rut);

                if (Fn.validaRut(rut)) {
                    $("#msg").html("El rut ingresado es válido :D");

                } else {
                    $("#msg").html("El Rut no es válido :'( ");
                }



            });

        });
    </script>
@endsection
