@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">


            <div class="card text-center">
                <div class="card-header">
                    Seleccionar fecha de reserva a buscar
                </div>
                <div class="card-body">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id }}">

                    <div class="form-group row">

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" type="date" min="2021-01-01" name="fechaReserva"
                                    id="fechaReserva">
                                <label for="fechaReserva">Fecha</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" id="mostrarTodo" class="btn btn-success">mostrar Todo</button>
                        </div>



                    </div>
                    <div class="row">


                        <div class="col-md-12">

                            <div class="card text-center">
                                <div class="card-header">
                                    Calendario de Reservas
                                </div>


                                <div id="calendar"></div>
                                <div id="calendar2"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('reservas.modal2')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("update").addEventListener('submit', validarFecha);
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



            this.submit();

        }
    </script>

    <script>
        $(document).ready(function() {

            //$('#calendar').empty();

            $(document).on('click', '#btnDelete', function() {
                let txt = "presiona Aceptar para eliminar la reserva!";
                if (confirm(txt) == true) {}
            });


            $(document).on('click', '#mostrarTodo', function() {
                document.getElementById('calendar').style.display = "none";
                $('#calendar').empty();


                document.getElementById('calendar2').style.display = "block";

                var fechaReserva = document.getElementById('fechaReserva').value;
                var usuario_id = document.getElementById('usuario_id').value;
                //console.log(fechaReserva);
                //console.log(calendarEl.start);
                var calendarEl = document.getElementById('calendar2');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: "es",
                    editable: true,
                    //selected: 'timeGridWeek',
                    headerToolbar: {
                        left: 'prev',
                        center: 'title',
                        right: 'dayGridMonth, listWeek, next',

                    },
                    //events: '/full-calender'

                    eventSources: {
                        url: "{{ route('reserva.index3') }}",
                        method: 'get',
                        extraParams: {
                            usuario_id: usuario_id

                        }

                    },
                    eventClick: function(info) {
                        var s = info.event.start;
                        var e = info.event.end;

                        start = s.getHours() + ":" + s.getMinutes() + "0:" + s.getSeconds() +
                            "0";
                        end = e.getHours() + ":" + e.getMinutes() + "0:" + e.getSeconds() + "0";

                        $('#exampleModal').modal("show");
                        document.getElementById('title').value = info.event.title;
                        document.getElementById('description').value = info.event.extendedProps
                            .description;
                        document.getElementById('fecha').value = info.event.extendedProps.fecha;
                        document.getElementById('start').value = start;
                        document.getElementById('end').value = end;
                        document.getElementById('id').value = info.event.id;
                        document.getElementById('delete').value = info.event.id;
                    }



                });
                //calendar.addEvent({cancha_id: cancha_id});
                //console.log(calendar);
                calendar.render();
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            //$('#calendar').empty();
            //console.log("2222");
            $('#fechaReserva').on('change', function() {
                $('#calendar2').empty();
                document.getElementById('calendar2').style.display = "none";

                document.getElementById('calendar').style.display = "block";

                var fechaReserva = document.getElementById('fechaReserva').value;
                //console.log(calendarEl.start);
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGrid',
                    editable: true,
                    visibleRange: {
                        start: fechaReserva,
                        end: fechaReserva
                    },
                    locale: "es",
                    //selected: 'timeGridWeek',
                    headerToolbar: {
                        left: 'prev',
                        center: 'title',
                        right: 'next'
                    },

                    //events: '/full-calender'

                    eventSources: {
                        url: "{{ route('reserva.index2') }}",
                        method: 'get',
                        extraParams: {
                            fechaReserva: fechaReserva,

                        }

                    },
                    eventClick: function(info) {
                        var s = info.event.start;
                        var e = info.event.end;

                        start = s.getHours() + ":" + s.getMinutes() + "0:" + s.getSeconds() +
                            "0";
                        end = e.getHours() + ":" + e.getMinutes() + "0:" + e.getSeconds() + "0";

                        $('#exampleModal').modal("show");
                        document.getElementById('title').value = info.event.title;
                        document.getElementById('description').value = info.event.extendedProps
                            .description;
                        document.getElementById('fecha').value = info.event.extendedProps.fecha;
                        document.getElementById('start').value = start;
                        document.getElementById('end').value = end;
                        document.getElementById('id').value = info.event.id;
                    }



                });
                //calendar.addEvent({cancha_id: cancha_id});
                //console.log(calendar);
                calendar.render();
            });



        });
    </script>

@endsection
