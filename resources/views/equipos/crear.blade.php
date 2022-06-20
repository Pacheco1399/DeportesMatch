@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Equipo</div>


                    <form method="POST" action="{{ route('equipos.almacen') }}">
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-md-7">

                                    @csrf

                                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="miembros" id="miembros" value="1">

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" name="nombreEquipo" id="nombreEquipo"
                                                    value="{{ old('nombreEquipo') }}" class="form-control">
                                                <label for="nombreEquipo">Nombre Equipo</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea type="text" name="descripcion" id="descripcion"
                                                    value="{{ old('descripcion') }}" class="form-control"></textarea>
                                                <label for="descripcion">Descripcion</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="number" name="capacidad" id="capacidad"
                                                    value="{{ old('capacidad') }}" class="form-control">
                                                <label for="capacidad">Capacidad</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-check form-switch">

                                        <div class="form-group row">
                                            <label for="capacidad" class="col-md-12">{{ __('Privacidad') }}</label>

                                            <div class="col-md-6 my-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="privacidad"
                                                        name="privacidad" value="0">
                                                    <label class="form-check-label" for="privacidad">Publico</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="privacidadPriv"
                                                        name="privacidad" value="1">
                                                    <label class="form-check-label" for="privacidadPriv">Privado</label>
                                                </div>

                                                @if (session('privacidad'))
                                                    <p style="color: red"> {{ session('privacidad') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">


                                        <div class="col-md-12">
                                            <div class="form-floating">

                                                <select name="deporte_id" id="deporte_id"
                                                    class="form-control @error('deporte_id') is-invalid @enderror"
                                                    name="deportes" value="{{ old('deporte_id') }}" required
                                                    autocomplete="deporte_id">
                                                    <option disabled selected>Selecciona un deporte</option>
                                                    @foreach ($deportes as $deporte)
                                                        <option value="{{ $deporte->id }}">{{ $deporte->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="deporte_id">Deporte</label>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name  = "inscritos" id = 'inscritos' value="0" >

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Crear Equipo') }}
                                            </button>
                                            <button type="button" class="btn btn-success " onclick="history.back()">
                                                {{ __('Volver') }}
                                            </button>

                                            <button type="reset" class="btn btn-warning">
                                                {{ __('Limpiar') }}
                                            </button>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">



                                    <div class="form-group">
                                        <!--<div class="col-md-12">

                                            <img src="/{{ $evento->link }}" class="img-fluid" width="100%"
                                                height="50%">

                                        </div>-->
                                        <div class="col-md-12">

                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control-file" id="foto">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $("#imagen").change(function() {
            readURL(this);
        });
    </script>

@endsection
