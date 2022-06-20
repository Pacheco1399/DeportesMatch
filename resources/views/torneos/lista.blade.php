@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>


        <div class="container-fluid">

            <body>
                <h1>Mis torneos</h1>
                <hr>
                <h3>Lista de mis torneos</h3>


                <div class="col-xl-12">
                    <form action="{{ route('torneos.lista') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-4 my-2">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}"
                                    placeholder="Buscar por deporte o dirección">
                            </div>
                            <div class="col-auto my-2">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                                <a class="btn btn-success" href="{{ route('torneos.crear') }}">Crear un nuevo torneo</a>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="table-respoonsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th> Nombre del torneo </th>
                                <th> Direccion del torneo </th>
                                <th> Hora del torneo </th>
                                <th> Fecha del torneo </th>
                                <th> Cantidad de equipo </th>
                                <th> Deporte </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($torneos) <= 0)
                                <tr>
                                    <td colspan="7">
                                        No hay regisrtros asociados
                                    </td>
                                </tr>
                            @else

                                @foreach ($torneos as $torneo)
                                    <tr>
                                        <input type="hidden" value="{{ $torneo->id }}">
                                        <td>{{ $torneo->nombre }}</td>
                                        <td>{{ $torneo->direccion_torneo }}</td>
                                        <td>{{ $torneo->fecha }}</td>
                                        <td>{{ $torneo->hora }}</td>
                                        <td>{{ $torneo->cantidad_equipos }}</td>
                                        <td>{{ $torneo->nombreDeporte }}</td>
                                        <td>
                                            <a class="btn-btn-link"
                                                href="{{ route('torneos.administrar', ['torneo' => $torneo->id]) }}"><i
                                                    class="bi bi-eye"></i></a>
                                            <a class="btn btn-link"
                                                href="{{ route('torneos.editar', ['torneo' => $torneo->id]) }}"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <form method="POST"
                                                action="{{ route('torneos.destruir') }}">
                                                <input type="hidden" name="id" value="{{$torneo->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>-->
                                        </td>
                                    </tr>
                                @endforeach

                        </tbody>
                        @endif
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">

                            <button type="button" class="btn btn-success" onclick="history.back()">
                                {{ __('Volver') }}
                            </button>
                        </div>
                    </div>
                </div>
            </body>
        </div>
    </div>

@endsection
