@extends('layouts.app')
<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
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
                <div class="card">
                    <div class="card-header">{{ __('Crear evento') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('eventos.almacen') }}">

                            @csrf
                            <input type="hidden" name="estado" id="estado" value="1">

                            <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id }}">
                            <div class="form-group row">
                                <label for="nombreEvento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Evento') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="nombreEvento" type="text" class="form-control " name="nombreEvento"
                                        value="{{ old('nombreEvento') }}" required autocomplete="nombreEvento" autofocus>

                                    @error('nombreEvento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <?php
                            $fecha_actual = date('y-M-d');
                            ?>
                            <div class="form-group row">
                                <label for="fechaEvento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Fecha del evento') }}</label>

                                <div class="col-md-6 my-2">
                                    <input id="fechaEvento" type="date"
                                        class="form-control @error('fechaEvento') is-invalid @enderror " name="fechaEvento"
                                        value="<?php echo $today; ?>" required autocomplete="fechaEvento">

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

                                <div class="col-md-6 my-3">
                                    <input type="time" name="horaEvento" id="horaEvento"
                                        class="form-control  @error('horaEvento') is-invalid @enderror "
                                        value="{{ old('horaEvento') }}" required autocomplete="horaEvento">


                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="participantesTotales"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de participantes') }}</label>

                                <div class="col-md-2">
                                    <input id="participantesTotales" type="number"
                                        class="form-control @error('participantesTotales') is-invalid @enderror"
                                        name="participantesTotales" value="{{ old('participantesTotales') }}" required
                                        autocomplete="participantesTotales" min="0">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deporte_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Deporte a practicar') }}</label>

                                <div class="col-md-6 my-2">
                                    <select name="deporte_id" id="deporte_id"
                                        class="form-control @error('deporte_id') is-invalid @enderror" name="deportes"
                                        value="{{ old('deporte_id') }}" required autocomplete="deporte_id">>
                                        <option disabled selected>Selecciona un deporte</option>
                                        @foreach ($deportes as $deporte)
                                            <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <!--<div class="form-group row">
                                <div class="form-floating">
                                    <div class="col-md-3 offset-md-4">

                                        <input type="checkbox" name="reserva" id="reserva">
                                        <label for="reserva">Agregar Reserva</label>
                                    </div>
                                </div>
                            </div>-->

                            


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Calle/Avenida') }}</label>
                                <!-- Avoid the word "address" in id, name, or label text to avoid browser autofill from conflicting with Place Autocomplete. Star or comment bug https://crbug.com/587466 to request Chromium to honor autocomplete="off" attribute. -->

                                <div class="col-md-6 my-2">
                                    <input class="form-control" id="ship-address" name="ubicacionEvento" required
                                        autocomplete="ubicacionEvento" value="{{ old('ubicacionEvento') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right">{{ __('Departamento O Numeracion #') }}</label>
                                <div class="col-md-6 my-2">
                                    <input class="form-control" id="address2" name="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>
                                <div class="col-md-6 my-2">
                                    <input class="form-control" id="locality" name="" required disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>
                                <div class="col-md-6 my-2">
                                    <input class="form-control" id="state" name="" required disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Ciudad/Pais') }}</label>
                                <div class="col-md-6 my-2">
                                    <input class="form-control" id="country" name="" required disabled />
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear Evento') }}
                                    </button>
                                    <button type="button" class="btn btn-success " onclick="history.back()">
                                        {{ __('Volver') }}
                                    </button>

                                    <button type="reset" class="btn btn-warning">
                                        {{ __('Limpiar') }}
                                    </button>


                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgB56bavzmEa4I3Ac7vZkjpAtdsSvWwrg&callback=initAutocomplete&libraries=places&v=weekly"
        async></script>
    <script>
        // This sample uses the Places Autocomplete widget to:
        // 1. Help the user select a place
        // 2. Retrieve the address components associated with that place
        // 3. Populate the form fields with those address components.
        // This sample requires the Places library, Maps JavaScript API.
        // Include the libraries=places parameter when you first load the API.
        // For example: <script
        // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        let autocomplete;
        let address1Field;
        let address2Field;


        function initAutocomplete() {
            address1Field = document.querySelector("#ship-address");
            address2Field = document.querySelector("#address2");
            // Create the autocomplete object, restricting the search predictions to
            // addresses in the US and Canada.
            autocomplete = new google.maps.places.Autocomplete(address1Field, {
                componentRestrictions: {
                    country: ["cl"]
                },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });
            address1Field.focus();
            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            const place = autocomplete.getPlace();
            let address1 = "";


            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            // place.address_components are google.maps.GeocoderAddressComponent objects
            // which are documented at http://goo.gle/3l5i5Mr
            for (const component of place.address_components) {
                const componentType = component.types[0];

                switch (componentType) {
                    case "street_number": {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                    case "route": {
                        address1 += component.short_name;
                        break;
                    }
                    case "locality":
                        document.querySelector("#locality").value = component.long_name;
                        break;
                    case "administrative_area_level_1": {
                        document.querySelector("#state").value = component.short_name;
                        break;
                    }
                    case "country":
                        document.querySelector("#country").value = component.long_name;
                        break;
                }
            }

            address1Field.value = address1;
            // After filling the form with address components from the Autocomplete
            // prediction, set cursor focus on the second address line to encourage
            // entry of subpremise information such as apartment, unit, or floor number.
            address2Field.focus();
        }

        function getDate() {
            var today = new Date();

            document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) +
                '-' + ('0' + today.getDate()).slice(-2);
        }
    </script>
@endsection
