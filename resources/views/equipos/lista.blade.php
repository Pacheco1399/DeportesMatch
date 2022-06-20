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

        @if (session('error'))
            <p style="color: red"> {{ session('error') }}</p>
        @endif

        <div class="container-fluid">

            <body>
                <h1>Lista de mis Equipos</h1>
                <hr>
                <div class="form-group row">
                    <div class="col-md-12">
                        <h3>Fundador</h3>

                        <div class="table-respoonsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th> Nombre del Equipo </th>
                                        <th> Deporte </th>
                                        <th> Fundador </th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($equipos) <= 0)
                                        <tr>
                                            <td colspan="7">
                                                No hay regisrtros asociados
                                            </td>
                                        </tr>
                                    @else

                                        @foreach ($equipos as $equipo)
                                            <tr>
                                                <input type="hidden" value="{{ $equipo->id }}">
                                                <td>{{ $equipo->nombreEquipo }}</td>
                                                <td>{{ $equipo->nombreDeporte }}</td>
                                                <td>{{ $equipo->nombreFundador }}</td>
                                                <td>

                                  
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <a class="bi bi-pencil-square" href="{{ route('equipos.editar', ['equipo' => $equipo->id]) }}"></a>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <form method="POST" action="{{ route('equipos.destruir') }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id" value="{{ $equipo->id }}">
                                                                <button type="submit" class="btn"><a class="bi bi-trash"></a></button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a class="bi bi-eye" href="{{ route('equipos.ver.team', ['equipo' => $equipo->id]) }}"></a>

                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>

                            </table>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ $equipos->links() }}

                                    <button type="button" class="btn btn-success" onclick="history.back()">
                                        {{ __('Volver') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-md-6">
                        <h3>Integrante</h3>

                        <div class="table-respoonsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th> Nombre del Equipo </th>
                                        <th> Fundador </th>
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($integrantes_equipo as $equipo)
                                        <tr>
                                            <td>{{ $equipo->nombreEquipo }}</td>
                                            <td>{{ $equipo->nombreFundador }}</td>

                                            <td>
                                                <a class="bi bi-eye" href="{{ route('equipos.ver.team', ['equipo' => $equipo->usuario_id]) }}"></a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{ $equipos->links() }}

                                    <button type="button" class="btn btn-success" onclick="history.back()">
                                        {{ __('Volver') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>-->

                </div>
            </body>
        </div>
    </div>


@endsection
