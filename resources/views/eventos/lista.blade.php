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
                <h1>Mis Eventos</h1>
                <hr>
                <h3>Lista de mis eventos</h3>


                <div class="col-xl-12">
                    <form action="{{ route('eventos.lista') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-4 my-2">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}"
                                    placeholder="Buscar por nombre o dirección">
                            </div>
                            <div class="col-auto my-2">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                                <a class="btn btn-success" href="{{ route('eventos.crear') }}">Crear un nuevo evento</a>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="table-respoonsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th> Nombre del evento </th>
                                <th> Fecha del evento </th>
                                <th> Hora del evento </th>
                                <th> Ubicacion del evento </th>
                                <th> Participantes </th>
                                <th> Deporte </th>
                                <th> Valorar</th>
                                <th> Editar </th>
                                <th> Borrar </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($eventos) <= 0)
                                <tr>
                                    <td colspan="7">
                                        No hay regisrtros asociados
                                    </td>
                                </tr>
                            @else

                                @foreach ($eventos as $evento)
                                    <tr>
                                        <input type="hidden" value="{{ $evento->id }}">
                                        <td>{{ $evento->nombreEvento }}</td>
                                        <td>{{ $evento->fechaEvento }}</td>
                                        <td>{{ $evento->horaEvento }}</td>
                                        <td>{{ $evento->ubicacionEvento }}</td>
                                        <td>{{ $evento->participantesTotales }}</td>
                                        <td>{{ $evento->nombreDeporte }}</td>
                                        <td>
                                            @if ($evento->estado == 1)
                                                <a class="btn btn-link"
                                                    href="{{ route('eventos.comentar', ['evento' => $evento->id]) }}"><i
                                                        class="bi bi-chat-left-dots"></i>
                                                </a>
                                            @else
                                                <div> Evento Activo</div>


                                            @endif
                                        </td>

                                        <td>

                                            <a class="btn btn-link"
                                                href="{{ route('eventos.editar', ['evento' => $evento->id]) }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>

                                            <form method="POST"
                                                action="{{ route('eventos.destruir', ['evento' => $evento->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {{ $eventos->links() }}
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
