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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuarios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="col-xl-12">
                            <form action="{{ route('usuario.listar') }}" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-4 my-2">
                                        <input type="text" class="form-control" name="texto"
                                            placeholder="Buscar por nombre">
                                    </div>
                                    <div class="col-auto my-2">
                                        <input type="submit" class="btn btn-primary" value="Buscar">
                                    </div>
                                </div>
                            </form>


                        </div>


                        <div class="col-md-12">

                            <table class="table table-bordered" style="align-content: center">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Rut</th>
                                        <th>Nacionalidad</th>
                                        <th>Edad</th>
                                        <th>Estado</th>
                                        <th>Rol</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($usuarios as $u)
                                        <tr>

                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->apellido_paterno }}</td>
                                            <td>{{ $u->apellido_materno }}</td>
                                            <td>{{ $u->rut }}</td>
                                            <td>{{ $u->nacionalidad }}</td>
                                            <td>{{ $u->edad }}</td>

                                            @if ($u->estado == 1)
                                                <td>Activo</td>
                                            @elseif($u->estado == 2)
                                                <td>TimeOut Temporal</td>
                                            @elseif($u->estado == 3)
                                                <td>TimeOut permanente</td>
                                            @endif

                                            <td>@if ($u->rol == 1) Administrador @elseif($u->rol ==2) Moderador @elseif($u->rol == 3) Usuario @endif</td>

                                            <td> <a class="bi bi-eye"
                                                    href="{{ route('usuario.ver.perfil', ['usuario' => $u->id]) }}"></a>
                                            </td>



                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
