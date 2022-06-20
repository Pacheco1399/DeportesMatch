@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>


    <div class="container">
        @if (session('error'))
            <p style="color: red"> {{ session('error') }}</p>
        @endif
        <?php
        $can = count($integrantes_equipo);
        ?>
        <div class="container-fluid">

            <body>


                <div class="col-md-12">

                    <div class="form-group row">
                        @foreach ($equipo as $e)

                            <div class="col-md-3">

                                <div class="col-md-12" style="text-align: center">

                                    <img src="/image/{{ $e->foto }}" width="250px">
                                </div>

                                <hr>
                                <h3 style="text-align: center">{{ $e->nombreEquipo }}</h3>
                                <hr>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        @if ($abandonar == 1)

                                            <div class="form-group row">

                                                <div class="col-md-6">
                                                    <form method="POST" action="{{ route('equipos.abandonar') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $e->id }}">
                                                        <input type="hidden" name="usuario_id" id="usuario_id"
                                                            value="{{ Auth::user()->id }}">
                                                        <button type="submit"
                                                            class="btn btn-danger button">Abandonar</button>


                                                    </form>

                                                </div>
                                                @if ($e->usuario_id == Auth::user()->id)

                                                    <div class="col-md-6">

                                                        <a class="btn btn-success" href="{{ route('equipos.editar', ['equipo' => $e->id]) }}"> Configurar </a>

                                                    </div>
                                                @endif

                                            </div>
                                        @else
                                            @if ($e->privacidad == 0)

                                                <form method="GET" action="{{ route('equipos.unirse') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="equipo_id" value="{{ $e->id }}">
                                                    <input type="hidden" name="usuario_id" id="usuario_id"
                                                        value="{{ Auth::user()->id }}">

                                                    <button type="submit" class="btn btn-primary button">Unirse</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-9">


                                <h5>Fundador: {{ $e->nombreFundador }}</h5>
                                <h5>Deporte: {{ $e->nombreDeporte }}</h5>
                                <h5>Año de Creacion: {{ $year }}</h5>
                                <h5>Capacidad: {{ $can }}/{{ $e->capacidad }}</h5>
                                <h5>Privacidad: @if ($e->privacidad == 0) Publico  @elseif($e->privacidad == 1) Privado @endif</h5>
                                <h5>Descripcion: {{ $e->descripcion }}</h5>

                            </div>
                        @endforeach
                        <div class="col-md-12">

                            <a class="btn btn-success align-center" href="{{ route('torneos.visualizar', ['equipo' => $e->id]) }}"> Buscar Torneo </a>

                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-8">
                            <div class="table-respoonsive">
                                <table class="table table-hover">
                                    <hr>
                                    <h5>Integrantes</h1>
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>


                                            @foreach ($integrantes_equipo as $int)
                                                <tr>
                                                    <td>{{ $can }}</td>
                                                    <td>{{ $int->nombre }}</td>

                                                    <?php $can--; ?>

                                                    <td>
                                                        <a class="bi bi-eye"
                                                    href="{{ route('usuario.ver.perfil', ['usuario' => $int->usuario_id]) }}"></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                </table>
                            </div>
                        </div>
                     

                    </div>




                </div>



            </body>
        </div>
    </div>
@endsection
