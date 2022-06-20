@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
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
                    <form action="{{route('eventos.lista')}}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-4 my-2" >
                                <input type="text" class="form-control" name="texto" value="{{$texto}}" placeholder="Buscar por nombre o dirección">
                            </div>
                            <div class="col-auto my-2">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
                  
                
                </div>
                <div class="table-respoonsive">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th> Nombre del evento </th>
                                <th> Fecha del evento </th>
                                <th> Hora del evento </th>
                                <th> Ubicacion del evento </th>
                                <th> Participantes </th>
                                <th> Deporte </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($eventos) <= 0)
                                <tr>
                                    <td colspan="7" >
                                        No hay regisrtros asociados
                                    </td>
                                </tr>
                            @else    
                          
                            @foreach ($eventos as $evento)
                                <tr>
                                    <input type="hidden"  value="{{ $evento->id}}">
                                    <td>{{ $evento->nombreEvento }}</td>
                                    <td>{{ $evento->fechaEvento }}</td>
                                    <td>{{ $evento->horaEvento }}</td>
                                    <td>{{ $evento->ubicacionEvento }}</td>
                                    <td>{{ $evento->participantesTotales }}</td>
                                    <td>{{ $evento->nombreDeporte }}</td>
                                    <td> 
                                        <a class="btn btn-link" 
                                        href="{{route ('eventos.ver', ['evento' => $evento->id])}}"> Ver </a> 
                                        <a class="btn btn-link" 
                                        href="{{route ('eventos.editar', ['evento' => $evento->id])}}"> Editar </a> 
                                        <form method="POST"
                                            action="{{route ('eventos.destruir', ['evento' => $evento->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link">Borrar</button>    
                                        </form>    
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        @endif
                    </table>
                    {{$eventos->links()}}
                </div>
            </body>
        </div>
    </div>
    
@endsection