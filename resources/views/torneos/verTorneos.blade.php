@extends('layouts.app')
@php
  use App\Models\Puntuacion;  
@endphp
@php
$i = 0;
@endphp

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
 
  <style>
    
    div.tournament {
      display: flex;
      flex-direction: row;
    }

    div.tournament > div {
        flex: 1;
        
    }

    div.tournament > div > div {
        position: relative;
    }

    div.tournament > div + div {
        flex: 1;
        display: flex;
        flex-flow: column;
        padding-left: 20px;
    }

    div.tournament > div:first-child > div + div {
        padding-top: 10px;
    }

    div.tournament > div + div > div {
        flex: 1;
        display: flex;
        flex-flow: row wrap;
        align-content: center;
    }

    div.tournament > div > div + div:after {
        content: "";
        position: absolute;
        bottom: 50%;
        right: -10px;
        width: 1px;
        height: 100%;
        background-color: #333;
    }

    div.tournament > div:first-child > div + div:after {
        height: 62px;
        bottom: 25px;
    }

    div.tournament > div > div > ul {
        position: relative;
        list-style: none;
        margin: 0;
        padding: 0;
        border: 1px solid #333;
        width: 100%;
    }

    div.tournament > div > div > ul:after {
        content: "";
        position: absolute;
        top: 50%;
        left: -11px;
        right: -10px;
        height: 1px;
        background-color: #333;
    }

    div.tournament > div:first-child > div > ul:after {
        left: 0;
        right: -9px;
    }

    div.tournament > div:last-child > div > ul:after {
        right: 0;
    }

    div.tournament > div > div > ul > li {
        z-index: 0;
        font-size: 15px;
        line-height: 1em;
        position: relative;
        list-style: none;
        margin: 0;
        padding: 5px;
        background-color: #ccc;
    }
    div.tournament > div > div >  ul > li {
        z-index: 0;
        font-size: 15px;
        line-height: 1em;
        position: relative;
        list-style: none;
        margin: 0;
        padding: 5px;
        background-color: #ccc;
    }

    div.tournament > div > div > ul > li:before {
        content: "X";
    }
    </style>
    
  <div class="container">
      
                          
        <div class="row justify-content-center">
            <div class="col-md-8">
               
            </div>
        </div>
        

        <div class="container"> 
            <body>
              
                <h1>{{$torneo->nombre}}</h1>
                
                <hr>    
                    @if ($torneo->cantidad_equipos <= 0)
                      <tr>
                          <td colspan="7" >
                              No hay regisrtros asociados
                          </td>
                      </tr>
                    @else 
            @if ($torneo->tipo_torneo == 1)
                
              
                    @if ($torneo->cantidad_equipos <= 8 && $torneo->cantidad_equipos > 4)
                      
                    <h1>{{$torneo->nombre}}</h1>

                        <div class="tournament">
                        
                          <div >
                              <div>
                                  <ul >
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)" name= "1" id = "1">
                                      
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 1)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)"
                                          id="{{$points->posicion}}" width="88" height="31" readonly >


                                      
                                        @endif
                                      @endforeach
                                      </li >
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "2" id = "2">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 2)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        

                                        @endif
                                      @endforeach
                                      </li>
                                  </ul>
                              </div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "3" id = "3">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 3)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @endif
                                        @endforeach
                                      </li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "4" id = "4">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 4)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        

                                        @endif
                                      @endforeach
                                      </li>
                                  </ul>
                              </div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "5" id = "5">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 5)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                      </li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "6" id = "6">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 6)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                      </li>
                                  </ul>
                              </div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "7" id = "7">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 7)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @endif
                                        @endforeach
                                      </li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "8" id = "8">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 8)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        @endif
                                        @endforeach
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "9" id = "9">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 9)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @endif
                                        @endforeach</li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "10" id = "10">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 10)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        

                                       
                                        @endif
                                        @endforeach</li>
                                  </ul>
                              </div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "11" id = "11">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 11)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @endif
                                        @endforeach</li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "12" id = "12">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 12)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                         
                                          @endif
                                        @endforeach</li>
                                  </ul>
                              </div>
                          </div>
                          <div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "13" id = "13">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 13)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        @endif
                                        @endforeach</li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "14" id = "14">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 14)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @else
                                          
                                          @endif
                                        @endforeach</li>
                                  </ul>
                              </div>
                          </div>
                        </div>
                        <div> 
                          <div>
                            <div>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "15" id = "15">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 15)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        

                                      @endif
                                      @endforeach
                                    </li>
                            </div>
                        </div>
                      </div> 
                      @endif
                      
                      @if ($torneo->cantidad_equipos <= 4)
                        
                    
                        <div class="tournament">
                        
                          <div >
                              <div>
                                  <ul >
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)" name= "1" id = "1">
                                      
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 1)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)"
                                          id="{{$points->posicion}}" width="88" height="31" readonly >
                                          
                                          @else
                                      
                                        @endif
                                      @endforeach
                                      </li >
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "2" id = "2">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 2)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach
                                      </li>
                                  </ul>
                              </div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "3" id = "3">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 3)
                                          <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @endif
                                        @endforeach
                                      </li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "4" id = "4">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 4)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div>
                              <div>
                                  <ul>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "5" id = "5">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 5)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                      </li>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "6" id = "6">
                                        @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 6)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div>
                              <div>
                                      <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "7" id = "7">
                                        @foreach ($puntuacion as $points )
                                        @if ($points->posicion == 7)
                                          <input  z-index="2" class=" position-relative" value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                          
                                          @endif
                                        @endforeach
                                      </li>
                              </div>
                          </div>
                    
                        </div> 
                      @endif
                      
                      @if ($torneo->cantidad_equipos >= 9 && $torneo->cantidad_equipos <= 16)
                      <div class="tournament">
                        <div >
                            <div>
                                <ul >
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)" name= "1" id = "1">
                                    
                                    @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 1)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)"
                                        id="{{$points->posicion}}" width="88" height="31" readonly >
                                        
                                        @else
                                    
                                      @endif
                                    @endforeach
                                    </li >
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "2" id = "2">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 2)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @endif
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "3" id = "3">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 3)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                    </li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "4" id = "4">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 4)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @endif
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "5" id = "5">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 5)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      
                                      @endif
                                    @endforeach
                                    </li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "6" id = "6">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 6)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @endif
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "7" id = "7">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 7)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                    </li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "8" id = "8">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 8)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "9" id = "9">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 9)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach</li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "10" id = "10">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 10)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach</li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "11" id = "11">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 11)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach</li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "12" id = "12">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 12)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach</li>
                                </ul>
                            </div>
                        
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "13" id = "13">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 13)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach</li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "14" id = "14">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 14)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        @else
                                        
                                        @endif
                                      @endforeach</li>
                                </ul>
                            </div>
                            <div>
                              <ul>
                                  <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "15" id = "15">
                                    @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 15)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>

                                      

                                      @endif
                                    @endforeach</li>
                                  <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "16" id = "16">
                                    @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 16)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @else
                                      
                                      @endif
                                    @endforeach
                                  </li>
                              </ul>
                          </div>
                        </div>


                        
                        <div>
                          <div>
                            <ul>
                                <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "17" id = "17">
                                  @foreach ($puntuacion as $points )
                                  @if ($points->posicion == 17)
                                    <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    
                                    @endif
                                  @endforeach</li>
                                <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "18" id = "18">
                                  @foreach ($puntuacion as $points )
                                  @if ($points->posicion == 18)
                                    <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @else
                                    
                                    @endif
                                  @endforeach
                                </li>
                            </ul>
                        </div>
                        <div>
                          <ul>
                              <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "19" id = "19">
                                @foreach ($puntuacion as $points )
                                @if ($points->posicion == 19)
                                  <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                  
                                  @endif
                                @endforeach</li>
                              <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "20" id = "20">
                                @foreach ($puntuacion as $points )
                                @if ($points->posicion == 20)
                                  <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                  @else
                                  
                                  @endif
                                @endforeach
                              </li>
                          </ul>
                      </div>
                   
                        <div>
                          <ul>
                            <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "21" id = "21">
                              @foreach ($puntuacion as $points )
                              @if ($points->posicion == 21)
                                <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                
                                @endif
                              @endforeach</li>
                            <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "22" id = "22">
                              @foreach ($puntuacion as $points )
                              @if ($points->posicion == 22)
                                <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                @else
                                
                                @endif
                              @endforeach
                            </li>
                          </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "23" id = "23">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 23)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "24" id = "24">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 24)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "25" id = "25">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 25)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "26" id = "26">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 26)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>

                    <div>
                    
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "27" id = "27">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 27)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                          @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "28" id = "28">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 28)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                  </div>
                    
                  <div>
                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "29" id = "29">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 29)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                          @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "30" id = "30">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 30)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>


                      </div>
                        
                  </body>
            
                </div>
              
              
              </div>
        
                
                  @endif
                  @if ($torneo->cantidad_equipos >= 17 && $torneo->cantidad_equipos < 31)
                      <div class="tournament">
                        <div >
                            <div>
                                <ul >
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)" name= "1" id = "1">
                                    
                                    @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 1)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)"
                                        id="{{$points->posicion}}" width="88" height="31" readonly >
                                        
                                    @endif
                                    @endforeach
                                    </li >
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "2" id = "2">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 2)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @endif
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "3" id = "3">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 3)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                    </li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "4" id = "4">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 4)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @endif
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "5" id = "5">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 5)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      
                                      @endif
                                    @endforeach
                                    </li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "6" id = "6">
                                      @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 6)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @endif
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "7" id = "7">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 7)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach
                                    </li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "8" id = "8">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 8)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "9" id = "9">
                                      @foreach ($puntuacion as $points )
                                      
                                      @if ($points->posicion == 9)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach</li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "10" id = "10">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 10)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach</li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "11" id = "11">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 11)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach</li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "12" id = "12">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 12)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @endif
                                      @endforeach</li>
                                </ul>
                            </div>
                        
                            <div>
                                <ul>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "13" id = "13">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 13)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        
                                        @endif
                                      @endforeach</li>
                                    <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "14" id = "14">
                                      @foreach ($puntuacion as $points )
                                      @if ($points->posicion == 14)
                                        <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                        @else
                                        
                                        @endif
                                      @endforeach</li>
                                </ul>
                            </div>
                          
                            <div>
                              <ul>
                                  <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "15" id = "15">
                                    @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 15)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      
                                      @endif
                                    @endforeach</li>
                                  <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "16" id = "16">
                                    @foreach ($puntuacion as $points )
                                    @if ($points->posicion == 16)
                                      <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                      @else
                                      
                                      @endif
                                    @endforeach
                                  </li>
                              </ul>
                          </div>
                        
                          <div>
                            <ul>
                                <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "17" id = "17">
                                  @foreach ($puntuacion as $points )
                                  @if ($points->posicion == 17)
                                    <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    
                                    @endif
                                  @endforeach</li>
                                <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "18" id = "16">
                                  @foreach ($puntuacion as $points )
                                  @if ($points->posicion == 18)
                                    <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                    @else
                                    
                                    @endif
                                  @endforeach
                                </li>
                            </ul>
                        </div>
                        <div>
                          <ul>
                              <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "19" id = "19">
                                @foreach ($puntuacion as $points )
                                @if ($points->posicion == 19)
                                  <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                  
                                  @endif
                                @endforeach</li>
                              <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "20" id = "20">
                                @foreach ($puntuacion as $points )
                                @if ($points->posicion == 20)
                                  <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                  @else
                                  
                                  @endif
                                @endforeach
                              </li>
                          </ul>
                      </div>
                  
                        <div>
                          <ul>
                            <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "21" id = "21">
                              @foreach ($puntuacion as $points )
                              @if ($points->posicion == 21)
                                <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                
                                @endif
                              @endforeach</li>
                            <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "22" id = "22">
                              @foreach ($puntuacion as $points )
                              @if ($points->posicion == 22)
                                <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                                @else
                                
                                @endif
                              @endforeach
                            </li>
                          </ul>
                      </div>
                    
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "23" id = "23">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 23)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "24" id = "24">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 24)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "25" id = "25">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 25)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "26" id = "26">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 26)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "27" id = "27">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 27)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "28" id = "28">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 28)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "29" id = "29">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 29)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "30" id = "30">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 30)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "31" id = "31">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 31)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "32" id = "32">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 32)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "33" id = "33">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 33)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "34" id = "34">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 34)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "35" id = "35">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 35)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "36" id = "36">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 36)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "37" id = "37">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 37)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "38" id = "38">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 38)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "39" id = "39">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 39)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "40" id = "40">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 40)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "41" id = "41">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 41)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "42" id = "42">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 42)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "43" id = "43">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 43)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "44" id = "44">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 44)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "45" id = "45">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 45)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "46" id = "46">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 46)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "47" id = "47">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 47)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "48" id = "48">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 48)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div>
                      <div>
                        <ul>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "49" id = "49">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 49)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              
                              @endif
                            @endforeach</li>
                          <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "50" id = "50">
                            @foreach ($puntuacion as $points )
                            @if ($points->posicion == 50)
                              <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                              @else
                                
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </div>

                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "51" id = "51">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 51)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                            @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "52" id = "52">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 52)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "53" id = "53">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 53)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                            @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "54" id = "54">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 54)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "55" id = "55">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 55)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                            @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "56" id = "56">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 56)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div>
                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "57" id = "57">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 57)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                            @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "58" id = "58">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 58)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "59" id = "59">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 59)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                            @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "60" id = "60">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 60)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div>
                    <div>
                      <ul>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "59" id = "59">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 59)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            
                            @endif
                          @endforeach</li>
                        <li ondrop="drop(event)" ondragover="allowDrop(event)"  name= "60" id = "60">
                          @foreach ($puntuacion as $points )
                          @if ($points->posicion == 60)
                            <input value="{{ $points->nombreEquipo }}" draggable="true" ondragstart="drag(event)" id="{{$points->posicion}}" width="88" height="31" readonly>
                            @else
                              
                            @endif
                          @endforeach
                        </li>
                      </ul>
                    </div>
                  </div>
                    @endif      
                  </body>
            @endif
            @if ($torneo->tipo_torneo == 0)
            <div class="container-fluid"> 
              <body>
                  @if ($torneo->cantidad_equipos <= 0)
                      <td colspan="7" >
                          No hay regisrtros asociados
                      </td>
                  @endif
                  @if ($torneo->cantidad_equipos > 0)
                      <div class="row">
                          <div class="col-sm-6 p-3 border">
                              <div class="card">
                                  <h3 >Grupo Uno</h3>
                                  <div class="card" >
                                      <table class="table table-striped">
                                          <tr>
                                              <th>Bloque A</th>
                                              <th>Estado</th>
                                              <th>Bloque B</th>
                                              <th>Estado</th>
                                              
                                          </tr>
                                          @if (count($puntuacion) <= 0)
                                            <tr>
                                              <td colspan="7">
                                                No hay registros asociados
                                                <br>
                                                <br>
                                                <hr>
                                              
                                                <form action="{{ route('torneos.agregar.equipo') }}" method="post">
                                                  @csrf
  
                                                  <select class="form-control" name="equipo_id">
                                                    @foreach ($equipos as $e)
                                                        @if(Auth::user()->id == $e->usuario_id)<option value="{{ $e->id }}">{{ $e->nombreEquipo }}</option>@endif
                                                    @endforeach
  
                                                </select>
  
                                                  <button class="form-control" type="submit">agregar</button>
  
  
                                                </form>
                                              </td>
                                            </tr>
                                            <tr>
                                            
                                            </tr>
                                          @else

                                          <tr>
                                              @foreach ($puntuacion as $point)
                                                  @php
                                                          $i= $i+1; 
                                                  @endphp
                                                  @if ($i <= 8)
                                                      <td>
                                                          {{$point->nombreEquipo}}
                                                      </td>
                                                      <td>
                                                        @if($point->estado == 0)
                                                        <p class="text-warning">
                                                          Pendiente
                                                        </p> 
                                                        @elseif($point->estado == 1) 
                                                        <p class="text-success">
                                                          Ganador
                                                        </p> 
                                                        @elseif($point->estado == 2) 
                                                        <p class="text-danger">
                                                          Perdedor
                                                        </p>
                                                        @elseif($point->estado == 3) 
                                                        <p class="text-info">
                                                          Empate
                                                        </p>  
                                                        @endif
                                                      </td>
                                                      @if ($i%2==0)
                                                      <td>

                                                      
                                                       
                                                      </td>
                                                      
                                                      
                                                      
                                          </tr>
                                          <tr>
                                                        @endif
                                                      

                                                  @endif

                                              @endforeach 
                                          </tr>
                                          @endif
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <br>
                      @endif

                      @if ($torneo->cantidad_equipos>=9)
                          <div class="col-sm-6 p-3 border">
                              <div class="card">
                                  <h3 >Grupo Dos</h3>
                                  <div class="card" >
                                      <table class="table table-striped">
                                          <tr>
                                              <th>Bloque C</th>
                                              <th>Puntos</th>
                                              <th>Bloque D</th>
                                              <th>Puntos</th>
                                          </tr>
                                          <tr>
                                                  @php
                                                      $i = 0;
                                                  @endphp
                                              @foreach ($puntuacion as $point)
                                                  @php
                                                          $i= $i+1; 
                                                      
                                                  @endphp
                                                  @if ($i > 8 && $i < 18 )
                                                      <td>
                                                          {{$point->nombreEquipo}}
                                                      </td>
                                                      <td>
                                                          {{$point->estado}}
                                                      </td>
                                                  @endif
                                                  @if ($i%2==0)
                                                      </tr>
                                                      <tr>
                                                  @endif
                                              @endforeach 
                                          </tr>    
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <br>
                      @endif
                      @if($torneo->cantidad_equipos>=24)
                          <div class="col-sm-6 p-3 border">
                              <div class="card">
                                  <h3 >Grupo Tres</h3>
                                  <div class="card" >
                                      <table class="table table-striped">
                                          <tr>
                                              <th>Bloque E</th>
                                              <th>Puntos</th>
                                              <th>Bloque F</th>
                                              <th>Puntos</th>
                                          </tr>
                                          <tr>
                                              @php
                                                  $i = 0;
                                              @endphp
                                          @foreach ($puntuacion as $point)
                                              @php
                                                      $i= $i+1; 
                                                  
                                              @endphp
                                              @if ($i > 18 && $i < 24 )
                                                  <td>
                                                      {{$point->nombreEquipo}}
                                                  </td>
                                                  <td>
                                                      {{$point->estado}}
                                                  </td>
                                              @endif
                                              @if ($i%2==0)
                                                  </tr>
                                                  <tr>
                                              @endif
                                          @endforeach 
                                      </tr>    
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <br>
                      @endif
                      @if ($torneo->cantidad_equipos>=32)
                          <div class="col-sm-6 p-3 border">
                              <div class="card">
                                  <h3 >Grupo Cuatro</h3>
                                  <div class="card" >
                                      <table class="table table-striped">
                                          <tr>
                                              <th>Bloque G</th>
                                              <th>Puntos</th>
                                              <th>Bloque H</th>
                                              <th>Puntos</th>
                                          </tr>
                                          <tr>
                                              @php
                                                  $i = 0;
                                              @endphp
                                          @foreach ($puntuacion as $point)
                                              @php
                                                      $i= $i+1; 
                                                  
                                              @endphp
                                              @if ($i > 24 && $i < 32 )
                                                  <td>
                                                      {{$point->nombreEquipo}}
                                                  </td>
                                                  <td>
                                                      {{$point->estado}}
                                                  </td>
                                              @endif
                                              @if ($i%2==0)
                                                  </tr>
                                                  <tr>
                                              @endif
                                          @endforeach 
                                      </tr>    
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <br>
                      @endif
                      @if ($torneo->cantidad_equipos>=40)
                          <div class="col-sm-6 p-3 border">
                              <div class="card">
                                  <h3 >Grupo Cinco</h3>
                                  <div class="card" >
                                      <table class="table table-striped">
                                          <tr>
                                              <th>Bloque I</th>
                                              <th>Puntos</th>
                                              <th>Bloque J</th>
                                              <th>Puntos</th>
                                          </tr>
                                          <tr>
                                              @php
                                                  $i = 0;
                                              @endphp
                                          @foreach ($puntuacion as $point)
                                              @php
                                                      $i= $i+1; 
                                                  
                                              @endphp
                                              @if ($i > 32 && $i < 40 )
                                                  <td>
                                                      {{$point->nombreEquipo}}
                                                  </td>
                                                  <td>
                                                      {{$point->estado}}
                                                  </td>
                                              @endif
                                              @if ($i%2==0)
                                                  </tr>
                                                  <tr>
                                              @endif
                                          @endforeach 
                                      </tr>    
                                      </table>
                                  </div>
                              </div>
                          </div>
                      @endif
                  </div>
              </body>
          </div>
          
          @endif
            </div>
        </div>
      
      
        @endif
@endsection
<script>
 
  </script>