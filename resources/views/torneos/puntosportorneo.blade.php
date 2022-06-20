@extends('layouts.app')

@section('content')
@php
$i = 0;
$f = 0;
@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form 
                            method="POST" 
                            action="{{ route('torneos.guardarpuntuacion', ['torneo' => $puntuacion[0]->id]) }}"
                            enctype="multipart/form-data">
                        
                            @csrf

                            <div class="table-respoonsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th> Nombre del Equipo </th>
                                            <th> Marque ganador </th>
                                            @if ($puntuacion[0]->tipo_torneo == 0)
                                            <th>
                                                Empate
                                            </th>
                                            @endif
                                            <th> Nombre del Equipo </th>
                                            <th> Marque Ganador </th>
                                            @if ($puntuacion[0]->tipo_torneo == 0)
                                            <th>
                                                Empate
                                            </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($puntuacion as $point)
                                                @php
                                                        $i= $i+1; 
                                                @endphp
                                                @if ($i <= 8)
                                                    <td>
                                                        {{$point->nombreEquipo}}
                                                    </td>
                                                    <td>
                                                            <input id="estado" type="radio" name="posicion" value="{{ $point->posicion }}">
                                                           
                                                            
                                                            
                                                    </td>
                                                    @if ($point->tipo_torneo == 0)
                                                        <td>

                                                        <a class="btn btn-warning" href="{{ route('torneos.guardar.empate', ['posicion' => $point->posicion]) }}">Empate</a>
                                                        </td>
                                                    @endif
                                                    
                                                @endif
                                               
                                            @endforeach 

                                          
                                      
                                    </tbody>
                                </table>
                               
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar ') }}
                                    </button>
                                   <button  type="button" class="btn btn-success " onclick="history.back()">
                                         {{ __('Volver') }}
                                   </button>
                                   
                                   <button type="reset" class="btn btn-warning" >
                                        {{ __('Limpiar') }}
                                    </button>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
