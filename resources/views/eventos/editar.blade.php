@extends('layouts.app')

@section('content')
    <?php
    
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    
    $today = $year . '-' . $month . '-' . $day;
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar evento') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('eventos.update', ['evento' => $evento->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="nombreEvento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Evento') }}</label>
                                <input type="hidden" name="id" id="id" value="{{ $evento->id }}">
                                <div class="col-md-6 my-2">
                                    <input id="nombreEvento" type="text" class="form-control " name="nombreEvento"
                                        value="{{ $evento->nombreEvento }}" required autocomplete="nombreEvento"
                                        autofocus>

                                    @error('nombreEvento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fechaEvento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Fecha del evento') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="fechaEvento" type="date"
                                        class="form-control @error('fechaEvento') is-invalid @enderror " name="fechaEvento"
                                        value="{{ $evento->fechaEvento }}" required autocomplete="fechaEvento">

                                    @error('fechaEvento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="horaEvento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Hora del evento') }}</label>

                                <div class="col-md-6 my-2">
                                    <input type="time" name="horaEvento" id="horaEvento"
                                        class="form-control  @error('horaEvento') is-invalid @enderror "
                                        value="{{ $evento->horaEvento }}" required autocomplete="horaEvento">


                                </div>
                            </div>

                            <div id="map"></div>
                            <div class="form-group row">
                                <label for="ubicacionEvento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Ubicacion del evento') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="pac-input" type="text" placeholder="Av. Siempre viva 123"
                                        class="form-control  @error('ubicacionEvento') is-invalid @enderror "
                                        name="ubicacionEvento" value="{{ $evento->ubicacionEvento }}" required
                                        autocomplete="ubicacionEvento" />

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="participantesTotales"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de participantes') }}</label>

                                <div class="col-md-2 my-2">
                                    <input id="participantesTotales" type="number" min="1" max="100"
                                        class="form-control @error('participantesTotales') is-invalid @enderror"
                                        name="participantesTotales" value="{{ $evento->participantesTotales }}" required
                                        autocomplete="participantesTotales">

                                        @error('fechaEvento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="deporte_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Deporte a practicar') }}</label>

                                <div class="col-md-6 my-2">
                                    <select name="deporte_id" id="deporte_id"
                                        class="form-control @error('deporte_id') is-invalid @enderror" name="deportes"
                                        value="{{ $evento->deporte_id }}" required autocomplete="deporte_id">>
                                        <option disabled>Selecciona un deporte</option>
                                        <option value="{{ $evento->deporte_id }}">Selecciona un deporte</option>
                                        @foreach ($deportes as $deporte)
                                            <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editar Evento') }}
                                    </button>


                                    <button type="button" class="btn btn-success" onclick="history.back()">
                                        {{ __('Volver') }}
                                    </button>



                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgB56bavzmEa4I3Ac7vZkjpAtdsSvWwrg&callback=initMap&libraries=places&v=weekly"
        async></script>
    <script>
        // This sample uses the Place Autocomplete widget to allow the user to search
        // for and select a place. The sample then displays an info window containing
        // the place ID and other information about the place that the user has
        // selected.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13,
            });
            const input = document.getElementById("pac-input");
            const autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo("bounds", map);
            autocomplete.setComponentRestrictions({
                country: ["cl"],
            });
            // Specify just the place data fields that you need.
            autocomplete.setFields(["place_id", "geometry", "formatted_address", "name"]);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");

            infowindow.setContent(infowindowContent);

            const marker = new google.maps.Marker({
                map: map
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
            autocomplete.addListener("place_changed", () => {
                infowindow.close();

                const place = autocomplete.getPlace();

                if (!place.geometry || !place.geometry.location) {
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                // Set the position of the marker using the place ID and location.
                marker.setPlace({
                    placeId: place.place_id,
                    location: place.geometry.location,
                });
                marker.setVisible(true);
                infowindowContent.children.namedItem("place-name").textContent = place.name;
                infowindowContent.children.namedItem("place-id").textContent =
                    place.place_id;
                infowindowContent.children.namedItem("place-address").textContent =
                    place.formatted_address;
                infowindow.open(map, marker);
            });

            function getDate() {
                var today = new Date();

                document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-
                    2) + '-' + ('0' + today.getDate()).slice(-2);
            }
        }
    </script>
@endsection
