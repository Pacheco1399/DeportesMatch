@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    @inject('regiones', 'App\Services\Regiones')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-body">




                        <div class="form-group row">

                            <div class="col-md-4">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-md-12" style="text-align: center">

                                                <img src="/image/{{ $user->foto }}" class="circle" width="100%"
                                                    height="auto">
                                            </div>




                                            <p
                                                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center">
                                                <strong>{{ $user->name }} {{ $user->apellido_paterno }}
                                                    {{ $user->apellido_materno }}</strong>
                                            </p>

                                            <p
                                                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                {{ $user->edad }} Años
                                            </p>
                                            <p
                                                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                {{ $user->comuna }}, {{ $user->region }}
                                            </p>

                                            @if ($user->estado == 1)
                                                <p
                                                    style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Estado: Activo
                                                </p>
                                            @elseif($user->estado == 2)
                                                <p
                                                    style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Estado: TimeOut Temporal
                                                </p>
                                            @elseif($user->estado == 3)
                                                <p
                                                    style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Estado: Inhabilitado
                                                </p>
                                            @endif

                                            <p
                                                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">



                                            </p>




                                            <div class="form-group row" style="margin-top: 15px">

                                                <div class="col-md-12" style="text-align: center">

                                                    <a class="btn btn-warning"
                                                        href="{{ route('editar.perfil') }}">Configurar Perfil</a>

                                                </div>


                                            </div>



                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-8">

                                <div class="card">

                                    <div class="card-header">
                                        Ultimos Eventos
                                    </div>

                                    <div class="card-body">

                                        @foreach ($eventos as $evento)
                                            <div class="card mb-12">
                                                <div class="row g-0">
                                                    <div class="col-md-12">
                                                        <div class="card-header">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">

                                                                    <h5 class="card-title">{{ $evento->nombreEvento }}
                                                                    </h5>

                                                                </div>
                                                                <div class="col-md-12">
                                                                    @if ($evento->estado == 1)
                                                                        <span class="badge badge-info">Pendiente</span>

                                                                    @elseif($evento->estado == 2)
                                                                        <span class="badge badge-warning">Por
                                                                            Calificar</span>

                                                                    @else
                                                                        <span class="badge badge-success">Finalizado</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="form-group row">

                                                                <div class="col-md-4">
                                                                    <div class="card">
                                                                        <div class="card-body">

                                                                            <img src="/{{ $evento->link }}"
                                                                                class="img-fluid" width="100%"
                                                                                height="auto" alt="...">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8">

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
                                                                        Ubicacion del  evento:
                                                                        {{ $evento->ubicacionEvento }}
                                                                    </p>
                                                                    <p
                                                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                                                        Participantes:
                                                                        {{ $evento->participantesTotales }}
                                                                    </p>
                                                                    <p
                                                                        style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman'; color: grey">
                                                                        Deporte: {{ $evento->nombreDeporte }}
                                                                    </p>

                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-6">
                                                                    <form action="{{ route('eventos.ver.evento') }}"
                                                                        method="get">
                                                                        @csrf
                                                                        <input type="hidden" name="evento_id" id="evento_id"
                                                                            value="{{ $evento->id }}">
                                                                        <input type="hidden" name="usuario_id"
                                                                            id="usuario_id" value="{{ $evento->usuario_id }}">
                                                                        <button type="submit" class="btn btn-success">Ver
                                                                            Evento</button>

                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form
                                                                        action="{{ route('eventos.comentar', ['evento' => $evento->id]) }}"
                                                                        method="get">
                                                                        @csrf
                                                                        <input type="hidden" name="evento_id" id="evento_id"
                                                                            value="{{ $evento->id }}">
                                                                        <input type="hidden" name="usuario_id"
                                                                            id="usuario_id" value="{{ $evento->usuario_id }}">
                                                                        <button type="submit"
                                                                            class="btn btn-warning">Comentar</button>


                                                                    </form>
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

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <div class="card" style="margin-bottom: 30px">
                            <div class="card-header">
                                Mis Direcciones
                            </div>

                            <div class="card-body">



                            </div>

                        </div>
                    </div>
                </div>
            </div>










        </div>
    </div>
@endsection
