@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <style>
        p.clasificacion {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        p.clasificacion input {
            position: absolute;
            top: -100px;
        }

        p.clasificacion label {
            float: right;
            color: #333;
        }

        p.clasificacion input:checked~label {
            color: #dd4;
        }

    </style>

    <div class="container">

        <?php
        $can = count($participantes_eventos);
        ?>


        @foreach ($eventos as $evento)



            <div class="card">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="form-group row">
                                <div class="col-md-6">


                                    <h4>
                                        {{ $evento->nombreEvento }}


                                        @if ($evento->estado == 1)
                                            <span class="badge badge-info">Pendiente</span>

                                        @elseif($evento->estado == 2)
                                            <span class="badge badge-warning">Por Calificar</span>

                                        @else
                                            <span class="badge badge-success">Finalizado</span>
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="text-align: center">

                                            <img src="/{{ $evento->link }}" class="img-fluid" width="100%"
                                                height="50%" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <p
                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                        Nombre del evento: {{ $evento->nombreEvento }}
                                    </p>
                                    <p
                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman';color: grey">
                                        Fecha del evento: {{ $evento->fechaEvento }}
                                    </p>
                                    <p
                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                        Hora del evento: {{ $evento->horaEvento }}
                                    </p>
                                    <p
                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                        Ubicacion del evento:
                                        {{ $evento->ubicacionEvento }}
                                    </p>
                                    <p
                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                        Cupo disponible:
                                        {{ count($participantes_eventos) }}/{{ $evento->participantesTotales }}
                                    </p>
                                    <p
                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                        Deporte: {{ $evento->nombreDeporte }}
                                    </p>

                                </div>
                                <div class="col-md-4">
                                    <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Valoración</div>
                                        <div class="card-body">
                                            @if (count($comentarios) >= 1)

                                                <label for="clasificacion"
                                                    class="col-md-12 ">Valoracion del evento ({{ $calificacion }}) </label>
                                                <div class="col-md-6 offset-md-3">
                                                    <p class="clasificacion">
                                                        <input id="radio1" type="radio" name="valoracion" value="5" disabled @if($star == 5.0) checked @endif>
                                                        <label for="radio1">★</label>
                                                        <input id="radio2" type="radio" name="valoracion" value="4" disabled @if($star == 4.0) checked @endif>
                                                        <label for="radio2">★</label>
                                                        <input id="radio3" type="radio" name="valoracion" value="3" disabled @if($star == 3.0) checked @endif>
                                                        <label for="radio3">★</label>
                                                        <input id="radio4" type="radio" name="valoracion" value="2" disabled @if($star == 2.0) checked @endif>
                                                        <label for="radio4">★</label>
                                                        <input id="radio5" type="radio" name="valoracion" value="1" disabled @if($star == 1.0) checked @endif>
                                                        <label for="radio5">★</label>
                                                    </p>
                                                </div>
                                                
                                                @else
                                                <label for="clasificacion"
                                                    class="col-md-12 ">{{ __('Aun no hay valoración!') }}</label>
                                                @endif
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-2">
                                    <form action="{{ route('eventos.comentar', ['evento' => $evento->id]) }}"
                                        method="get">
                                        @csrf
                                        <input type="hidden" name="evento_id" id="evento_id" value="{{ $evento->id }}">
                                        <input type="hidden" name="usuario_id" id="usuario_id" value="{{ $evento->id }}">
                                        <button type="submit" class="btn btn-warning">Comentar</button>


                                    </form>

                                    @if (session('comentar'))
                                        <strong style="color: red">{{ session('comentar') }}</strong>

                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('evento.participar') }}"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" id="id" value="{{ $evento->id }}">
                                        <input type="hidden" name="usuario_id" id="usuario_id"
                                            value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="participantes" id="participantes"
                                            value="{{ $evento->participantesTotales }}">
                                        <input type="hidden" name="capacidad" id="capacidad"
                                            value="{{ $evento->participantesTotales }}">

                                        <button type="submit" class="btn btn-primary">
                                            Participar
                                        </button>
                                        @if (session('participar'))
                                            <strong style="color: red">{{ session('participar') }}</strong>

                                        @endif

                                    </form>
                                    @if (session('error'))
                                        <strong style="color: red">{{ session('error') }}</strong>

                                    @endif
                                </div>

                            </div>


                        </div>


                        <div class="form-group row">

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Participantes
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <div class="card">

                                                    <div class="table-respoonsive">
                                                        <table class="table table-hover">


                                                            <thead>

                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nombre</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>


                                                                @foreach ($participantes_eventos as $par)
                                                                    <tr>
                                                                        <td>{{ $can }}</td>
                                                                        <td>{{ $par->nombre }}</td>
                                                                        <?php $can--; ?>


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
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Comentarios

                                    </div>

                                    <div class="card-body">
                                        @foreach ($comentarios as $c)

                                            <hr>

                                            <p>Usuario: {{ $c->nombre }}</p>
                                            <p>Fecha: {{ $c->created_at }}</p>
                                            <p>Valoracion: {{ $c->valoracion }}</p>
                                            <p>Comentario: {{ $c->comentario }}</p>


                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>





                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins
                                                                                                                                                            ago</small></p>-->
                    </div>
                </div>
            </div>




        @endforeach









    </div>
@endsection
