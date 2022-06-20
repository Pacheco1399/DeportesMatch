@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    @inject('usuarios', 'App\Services\Usuarios')
    @inject('deportes', 'App\Services\Deportes')

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
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($user as $usuario)
                                        <tr>

                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->apellido_paterno }}</td>
                                            <td>{{ $usuario->apellido_materno }}</td>
                                            <td>{{ $usuario->rut }}</td>
                                            <td>{{ $usuario->nacionalidad }}</td>
                                            <td>{{ $usuario->edad }}</td>

                                            @if ($usuario->estado == 1)
                                                <td>Activo</td>
                                            @elseif($usuario->estado == 2)
                                                <td>TimeOut Temporal</td>
                                            @elseif($usuario->estado == 3)
                                                <td>TimeOut permanente</td>
                                            @endif


                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-md-12">

                                                        <form action="{{ route('rol.usuario') }}" method="get">


                                                            <div class="form-group row">

                                                                <div class="col-md-8">

                                                                    <select class="form-control" name="rol" id="rol"
                                                                        onchange="rol()">
                                                                        <option value="1" @if ($usuario->rol == 1) selected @endif>
                                                                            Administrador
                                                                        </option>
                                                                        <option value="2" @if ($usuario->rol == 2) selected @endif>Moderador
                                                                        </option>
                                                                        <option value="3" @if ($usuario->rol == 3) selected @endif>Usuario
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="usuario_id" id="usuario_id"
                                                                    value="{{ $usuario->id }}">
                                                                <div class="col-md-4">
                                                                    <button type="submit" class="btn btn-success"><i
                                                                            class="bi bi-check-lg"></i></button>

                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>

                                            </td>



                                            <!-- Button trigger modal -->
                                            @include('modalUsuario')
                                            @include('user\modalBan')



                                            <td>
                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                    href="#modalUser{{ $usuario->id }}" role="button">Ver</a>

                                            </td>
                                            <td>
                                                <a class="btn btn-warning" data-bs-toggle="modal"
                                                    href="#modalBan{{ $usuario->id }}" role="button">Ban</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>

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
