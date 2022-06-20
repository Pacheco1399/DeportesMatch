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
                <h1>Equipos</h1>
                <hr>




                <div class="col-xl-12">
                    <form action="{{ route('equipos.buscar.team') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-4 my-2">
                                <input type="text" class="form-control" name="texto" placeholder="Buscar por nombre">
                            </div>
                            <div class="col-auto my-2">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
                    
     

                </div>
                <div class="form-group row">
                    @foreach ($equipos as $equipo)
                        <br>
                        <br>
                        <div class="col-md-3">

                            @include('equipos\equipo')
                            <br>
                            <br>
                        </div>
                    @endforeach
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{ $equipos->links() }}

                        <button type="button" class="btn btn-success" onclick="history.back()">
                            {{ __('Volver') }}
                        </button>
                    </div>
                </div>

            </body>
        </div>
    </div>
@endsection
