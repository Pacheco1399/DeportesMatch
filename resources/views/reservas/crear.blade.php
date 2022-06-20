@extends('layouts.app')
@section('content')
    <?php $event = 0; ?>

    <div class="container">
        <div class="card border">

            <div class="card-header">
                Reserva de Canchas
            </div>
            <div class="card-body">

                <form action="{{ route('reserva.almacen') }}" method="post" id="almacen">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select name="evento_id" id="evento_id" class="form-control" required
                                autocomplete="evento_id">>
                                <option disabled selected>Seleccionar Evento</option>
                                @foreach ($eventos as $e)
                                    <option class="form-control" value="{{ $e->id }}">{{ $e->nombreEvento }}
                                        {{ $e->ubicacionEvento }} </option>
                                @endforeach

                            </select>
                        </div>


                        @foreach ($eventos as $e)
                            @if ($e->id == $event)
                                <input type="hidden" name="nombreEvento" id="nombreEvento" value="{{ $e->nombreEvento }}">
                                <input type="hidden" name="horaEvento" id="horaEvento" value="{{ $e->horaEvento }}">
                                <input type="hidden" name="fechaEvento" id="fechaEvento" value="{{ $e->fechaEvento }}">
                            @endif


                        @endforeach

                        <div class="col-md-7">


                            <div class="form-group row">
                                <div class="col-md-12">

                                    <select name="complejo_id" id="complejo_id" class="form-control" required
                                        autocomplete="complejo_id">>
                                        <option disabled selected>Seleccionar complejo</option>
                                        @foreach ($complejos as $c)
                                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                                <br>
                                <div class="col-md-12">

                                    <select id="cancha_id" required data-old="{{ old('cancha_id') }}" name="cancha_id"
                                        class="form-control{{ $errors->has('cancha_id') ? ' is-invalid' : '' }}">
                                    </select>


                                </div>
                                <br>
                                <div class="col-md-12">
                                    <!-- Button trigger modal -->
                                    <br>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Nueva Reserva
                                    </button>

                                    @if (session('start'))
                                        <p style="color: red"> {{ session('start') }}</p>
                                    @endif
                                    <br>
                                    @include('reservas.modal')
                                    <br>

                                    <div class="col-md-12">

                                        <div class="card text-center">
                                            <div class="card-header">
                                                Calendario de Reservas
                                            </div>
                                            <div class="card-body">

                                                <div id="calendar" style="display: none"></div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                        @if (session('error'))
                            <p style="color: red"> {{ session('error') }}</p>
                        @endif


                        <br>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#evento_id').on('change', function() {

                var evento_id = $(this).val();

                if ($.trim(evento_id) != '') {

                    $.ajax({
                        url: "{{ route('reserva.evento.lista') }}",
                        type: "GET",
                        data: {
                            evento_id: evento_id
                        },
                        success: function(evento) {
                            for (var e in evento) {


                                $('#title').empty();
                                $('#fecha').empty();
                                $('#start').empty();

                                document.getElementById('title').value = evento[e].title;
                                document.getElementById('fecha').value = evento[e].fecha;
                                document.getElementById('start').value = evento[e].start;
                            

                            }

                        }
                    });


                }

            });

        });
    </script>

    <script></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("almacen").addEventListener('submit', validarFecha);
        });

        function validarFecha(reserva) {
            reserva.preventDefault();
            var title = document.getElementById('title').value;
            var descripcion = document.getElementById('description').value;
            var fecha = document.getElementById('fecha').value;
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
            var msg = document.getElementById('msg');

            //events: '/full-calender';
            if (title.length == 0) {
                alert('Ingrese titulo');
                return;
                /*} else if (descripcion.length == 0) {
                    alert('Ingrese Descripcion');
                    return;*/
            } else if (fecha.length == 0) {
                alert('Ingrese Fecha');
                return;
            } else if (start.length == 0) {
                alert('Ingrese Inicio de horario');
                return;
            } else if (end.length == 0) {
                alert('Ingrese Fin de horario');
                return;
            }

            if (start >= end) {
                alert(start);
                return;
            }else



            this.submit();

        }
        /*$(document).ready(function() {
            $('#cancha_id').empty();
            $('#cancha_id').on('change', function() {



            })
        })*/
        $(document).ready(function() {
            $('#calendar').empty();
            $('#cancha_id').on('change', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                document.getElementById('calendar').style.display = "block";

                var cancha_id = document.getElementById('cancha_id').value;

                //console.log(calendarEl.start);
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'listWeek',
                    locale: "es",
                    //selected: 'timeGridWeek',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'listWeek, dayGridWeek',

                    },
                    //events: '/full-calender'

                    eventSources: {
                        url: "{{ route('reserva.index') }}",
                        method: 'get',
                        extraParams: {
                            cancha_id: cancha_id,
                            startParam: calendarEl.start,
                            endParam: calendarEl.end,
                        }

                    }



                });
                //calendar.addEvent({cancha_id: cancha_id});
                //console.log(calendar);
                calendar.render();
            });

        });

        /*var start = document.getElementById('start').value;

        var end = document.getElementById('end').value;
        var cancha_id = document.getElementById('cancha_id').value;

        var calendarEl = document.getElementById('calendar');
        //console.log(calendarEl.start);
        var calendar = $('#calendar').fullCalendar({



            locale: 'es',
            defaultView: 'agendaWeek',
            editable: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,agendaDay'

            },
            //events: '/full-calender',
            events: {
                start: calendarEl.start,
                end: calendarEl.end,
                cancha_id: cancha_id,
                url: '/full-calender',


            },


            selectable: false,
            selectHelper: false
        });*/


        /* $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }

         });




         */
    </script>



    <script>
        $(document).ready(function() {
            $('#complejo_id').on('change', function() {
                var complejo_id = $(this).val();
                if ($.trim(complejo_id) != '') {

                    $.ajax({
                        url: "{{ route('cancha.lista') }}",
                        type: "GET",
                        data: {
                            complejo_id: complejo_id
                        },
                        success: function(canchas) {
                            console.log(canchas);
                            $('#cancha_id').empty();
                            $('#cancha_id').append(
                                "<option value=''>Selecciona una Cancha</option>");
                            $.each(canchas, function(index, value) {
                                $('#cancha_id').append("<option value='" + index +
                                    "'>" + value + "</option>");
                            })
                        }
                    });




                }
            });
        });
    </script>



@endsection
