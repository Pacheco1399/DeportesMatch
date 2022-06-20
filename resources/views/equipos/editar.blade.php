@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Equipo') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('equipos.update', ['equipo' => $equipo->id]) }}"
                            enctype="multipart/form-data">


                            @csrf

                            <input type="hidden" name="id" id="id" value="{{ $equipo->id }}">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id }}">


                            <div class="col-md-12" style="text-align: center">

                                <img src="/image/{{ $pic }}" width="150px">



                            </div>
                            <div class="custom-file">
                                <input type="file" accept="image/*" name="escudo" id="escudo" class="custom-file-input">
                                <br>

                                <label class="custom-file-label">
                                    Escudo...
                                </label>


                            </div>
                            <div class="form-group row">
                                <label for="nombreEquipo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Equipo') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="nombreEquipo" type="text" class="form-control " name="nombreEquipo"
                                        value="{{ $equipo->nombreEquipo }}" required autocomplete="nombreEquipo"
                                        autofocus>

                                    @error('nombreEquipo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="descripcion"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descripcion del Equipo') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="descripcion" type="text" class="form-control " name="descripcion"
                                        value="{{ $equipo->descripcion }}" autocomplete="descripcion" autofocus>

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="capacidad"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Capacidad del Equipo') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="capacidad" type="number" class="form-control " name="capacidad" min="1"
                                        max="50" value="{{ $equipo->capacidad }}" required autocomplete="capacidad"
                                        autofocus>

                                    @if (session('capacidad'))

                                        <strong style="color: red">{{ session('capacidad') }}</strong>

                                    @endif
                                </div>
                            </div>


                            <div class="form-check form-switch">

                                <div class="form-group row">
                                    <label for="capacidad"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Privacidad') }}</label>

                                    <div class="col-md-6 my-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="privacidad" name="publico"
                                                @if ($equipo->privacidad == 0) checked @endif>
                                            <label class="form-check-label" for="privacidad">Publico</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="privacidadPriv"
                                                name="privado" @if ($equipo->privacidad == 1) checked @endif>
                                            <label class="form-check-label" for="privacidadPriv">Privado</label>
                                        </div>

                                        @if (session('privacidad'))
                                            <strong style="color: red"> {{ session('privacidad') }}</strong>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="deporte_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Deporte a practicar') }}</label>

                                    <div class="col-md-6 my-2">
                                        <select name="deporte_id" id="deporte_id"
                                            class="form-control @error('deporte_id') is-invalid @enderror" name="deportes"
                                            value="{{ old('deporte_id') }}" required autocomplete="deporte_id">>
                                            <option disabled>Selecciona un deporte</option>
                                            @foreach ($deportes as $deporte)
                                                <option @if ($deporte->id == $equipo->deporte_id) selected @endif value="{{ $deporte->id }}">
                                                    {{ $deporte->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Equipo') }}
                                        </button>
                                        <button type="button" class="btn btn-success " onclick="history.back()">
                                            {{ __('Volver') }}
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
