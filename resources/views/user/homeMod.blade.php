@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 offset-md-1">
                <div class="card text-center ">
                    <div class="card-header">Reservas de la Semana</div>

                    @if (session('error'))
                        <p style="color: red"> {{ session('error') }}</p>
                    @endif

                    <div class="card-body">


                        <div class="form-group row">

                            <div class="col-md-12">

                                <div class="card text-center">
                                    <div class="card-header">
                                        Calendario de Reservas
                                    </div>


                                    <div id="calendar"></div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            //$('#calendar').empty();
            //console.log("2222");

            //console.log(calendarEl.start);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'listWeek',
                editable: true,
              
                locale: "es",
                //selected: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },

                //events: '/full-calender'

                eventSources: {
                    url: "{{ route('reserva.index3') }}",
                    method: 'get',
                    description: calendarEl.description
                   

                },
                eventClick: function(info) {
                    var s = info.event.start;
                    var e = info.event.end;

                    start = s.getHours() + ":" + s.getMinutes() + "0:" + s.getSeconds() + "0";
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
    </script>
@endsection
