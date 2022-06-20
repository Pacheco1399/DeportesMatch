@extends('layouts.app')
@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgB56bavzmEa4I3Ac7vZkjpAtdsSvWwrg&libraries=places"
        async></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <style>
        #map {
            height: 100%;
            width: 100%;
        }

        /* Optional: Makes the sample page fill the window. */

    </style>
    <div class="container">
        <h3>Crear Complejo Deportivo</h3>

        <form action="{{ route('complejo.almacen') }}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">

                    <div class="form-floating">
                        <input type="text" name="nombre" id="nombre" autocomplete="nombre" value="{{ old('nombre') }}"
                            class="form-control">
                        <label for="nombre">Nombre</label>
                    </div>

                    @if (session('nombre'))
                        <p style="color: red"> {{ session('nombre') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">

                    <div class="form-floating">
                        <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}"
                            class="form-control">
                        <label for="ubicacion">Ubicacion</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">

                    <div class="form-floating">
                        <input type="number" name="cantCanchas" id="cantCanchas" min="0" max="10"
                            value="{{ old('cantCanchas') }}" class="form-control">
                        <label for="cantCanchas">N° Canchas</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-6">
                    <div class="form-floating">

                        <select name="usuario_id" id="usuario_id" class="form-control" required
                            autocomplete="usuario_id">>
                            <option disabled selected>Seleccionar Moderador</option>
                            @foreach ($moderadores as $mod)
                                <option value="{{ $mod->id }}">{{ $mod->name }} {{ $mod->apellido_paterno }}
                                    {{ $mod->apellido_materno }}</option>
                            @endforeach
                        </select>
                        <label for="usuario_id">Moderador</label>
                    </div>
                    @if (session('usuario'))
                        <p style="color: red"> {{ session('usuario') }}</p>
                    @endif
                </div>
                <br>
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>


    </div>







    <!--<div class="container">
                        <h3>Crear Complejo Deportivo</h3>

                        <form action="{{ route('complejo.almacen') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">

                                    <div class="form-floating">
                                        <input type="text" name="nombre" id="nombre" autocomplete="nombre" value="{{ old('nombre') }}"
                                            class="form-control">
                                        <label for="nombre">Nombre</label>
                                    </div>

                                    @if (session('nombre'))
                                        <p style="color: red"> {{ session('nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">

                                    <div class="form-floating">
                                        <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}"
                                            class="form-control">
                                        <label for="ubicacion">Ubicacion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">

                                    <div class="form-floating">
                                        <input type="number" name="cantCanchas" id="cantCanchas" min="0" max="10" value="{{ old('cantCanchas') }}"
                                            class="form-control">
                                        <label for="cantCanchas">N° Canchas</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>

                        <input id="pac-input" class="controls" type="text" placeholder="Search Box" />

                        

                    </div>-->


    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        /* <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13,
                mapTypeId: "roadmap",
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);

            console.log(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };

                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }*/
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13,
                mapTypeId: "roadmap",
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };

                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
    </script>

@endsection
