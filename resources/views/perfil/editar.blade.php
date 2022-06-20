@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Perfil') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('perfil.actualizar') }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-md-6">

                                    <div class="col-md-12" style="text-align: center; margin-bottom: 30px">


                                        <img src="/image/{{ $user->foto }}" width="200px">


                                    </div>

                                    <div class="form-group row">

                                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}
                                        </label>

                                        <div class="col-md-6">
                                            <div class="custom-file">

                                                <input type="file" accept="image/*" name="foto" class="custom-file-input">
                                                <label class="custom-file-label">
                                                    Foto...
                                                </label>

                                            </div>
                                        </div>

                                    </div>

                                  


                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Perfil
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                    <label for="name"
                                                        class="col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                </div>

                                                <div class="col-md-6">

                                                    <input id="name" type="text"
                                                        style="margin-bottom: 20px; inline-size: 200px"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ old('name') ?? $user->name }}" required disabled
                                                        autocomplete="name">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                    <label for="apellido_paterno"
                                                        class="col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                                                </div>
                                                <div class="col-md-6">

                                                    <input id="apellido_paterno" type="text"
                                                        style="margin-bottom: 20px; inline-size: 200px"
                                                        class="form-control @error('apellido_paterno') is-invalid @enderror"
                                                        name="apellido_paterno"
                                                        value="{{ old('apellido_paterno') ?? $user->apellido_paterno }}"
                                                        required disabled autocomplete="apellido_paterno">

                                                    @error('apellido_paterno')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="apellido_materno"
                                                        class="col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                                                </div>

                                                <div class="col-md-6">

                                                    <input id="apellido_materno" type="text"
                                                        style="margin-bottom: 20px; inline-size: 200px"
                                                        class="form-control @error('apellido_materno') is-invalid @enderror"
                                                        name="apellido_materno"
                                                        value="{{ old('apellido_materno') ?? $user->apellido_materno }}"
                                                        required disabled autocomplete="apellido_materno">

                                                    @error('apellido_materno')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                    <label for="edad"
                                                        class="col-form-label text-md-right">{{ __('Edad') }}</label>

                                                </div>

                                                <div class="col-md-6">

                                                    <input type="text" id="edad" style="inline-size: 200px" min="1930-04-01"
                                                        max="2010-01-01" class="form-control sendit" name="edad" required
                                                        autocomplete="edad" value="{{ old('edad') ?? $user->edad }}"
                                                        disabled>

                                                </div>

                                            </div>



                                            <div class="form-group row">

                                                <div class="col-md-4" style="text-align: right">
                                                    <label for="nacionalidad"
                                                        class="col-form-label text-md-right">{{ __('Nacionalidad') }}</label>

                                                </div>

                                                <div class="col-md-6">

                                                    <input id="nacionalidad" type="text" style="inline-size: 180px"
                                                        value="{{ old('nacionalidad') ?? $user->nacionalidad }}"
                                                        class="form-control" name="nacionalidad"
                                                        autocomplete="nacionalidad">

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="card" style="margin-bottom: 30px">

                                        <div class="card-header">
                                            Informacion Personal
                                        </div>

                                        <div class="card-body">

                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="email"
                                                        class="col-form-label text-md-right">{{ __('Email') }}</label>

                                                </div>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" style="inline-size: 200px"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') ?? $user->email }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="numero_telefono"
                                                        class="col-form-label text-md-right">{{ __('Celular') }}</label>
                                                </div>

                                                <div class="col-md-2">
                                                    <input type="text" name="cod" id="cod" disabled value="+56"
                                                        class="form-control" style="inline-size: 60px">
                                                </div>

                                                <div class="col-md-6">

                                                    <input type="tel" name="numero_telefono" id="numero_telefono"
                                                        style="inline-size: 143px" maxlength="9" class="form-control"
                                                        value="{{ old('numero_telefono') ?? $user->numero_telefono }}">
                                                </div>

                                            </div>


                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="rut"
                                                        class="col-form-label text-md-right">{{ __('Rut') }}</label>
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="text" name="rut" id="rut" class="form-control"
                                                        style="inline-size: 200px" value="{{ old('rut') ?? $user->rut }}"
                                                        required maxlength="9">

                                                    <p class="text-info" id="msgerror"></p>
                                                </div>
                                            </div>



                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="fecha_nacimiento"
                                                        class="col-form-label text-md-right">{{ __('Fecha Nacimiento') }}
                                                    </label>

                                                </div>

                                                <div class="col-md-6">

                                                    <input type="date" id="fecha_nacimiento" style="inline-size: 200px"
                                                        min="1930-04-01" max="2010-01-01" class="form-control sendit"
                                                        name="fecha_nacimiento" autocomplete="fecha_nacimiento"
                                                        value="{{ $user->fecha_nacimiento != '' ? date('Y-m-d', strtotime($user->fecha_nacimiento)) : '' }}">

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card" style="margin-bottom: 30px">
                                        <div class="card-header">
                                            Mis Direcciones
                                        </div>

                                        <div class="card-body">

                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="comuna"
                                                        class="col-form-label text-md-right">{{ __('Ubicacion') }}</label>
                                                </div>

                                                <div class="col-md-6">
                                                    <input value="{{ old('comuna') ?? $user->comuna }}"
                                                        class="form-control " id="comuna" name="comuna"
                                                        style="inline-size: 180px" />
                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="direccion"
                                                        class="col-form-label text-md-right">{{ __('Direccion') }}
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="direccion" id="direccion"
                                                        class="form-control"
                                                        value="{{ old('direccion') ?? $user->direccion }}"
                                                        style="inline-size: 180px">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="direccion_opcional"
                                                        class="col-form-label text-md-right">{{ __('Direccion Opcional') }}
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="direccion_opcional" id="direccion_opcional"
                                                        class="form-control"
                                                        value="{{ old('direccion_opcional') ?? $user->direccion_opcional }}"
                                                        style="inline-size: 180px">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-3" style="text-align-last: right">
                                                    <label for="region"
                                                        class="col-form-label text-md-right">{{ __('Region') }}
                                                    </label>
                                                </div>

                                                <div class="col-md-6">
                                                    <input value="{{ old('region') ?? $user->region }}" id="region"
                                                        name="region" class="form-control" style="inline-size: 180px">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    Deportes
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">


                                        @foreach ($sports as $e)
                                            <div class="form-group col-md-4">
                                                <input type="checkbox" name="deporte_id[]" value="{{ $e->id }}"
                                                    @foreach ($uDeportes as $de)
                                                {{ $de->deporte_id == $e->id ? 'checked' : '' }}
                                        @endforeach>
                                        {{ $e->nombre }}


                                    </div>
                                    @endforeach









                                </div>

                            </div>

                    </div>

                    <input type="hidden" name="rol" id="row" value="{{ $user->rol }}">
                    <input type="hidden" name="estado" id="row" value="{{ $user->estado }}">


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4" style="margin-bottom: 20px">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </div>


                    </form>
                </div>










            </div>
        </div>
    </div>
    </div>
    </div>
@endsection


@section('scripts')

    <script>
        function edadd(e) {
            edadMS = Date.parse(Date()) - Date.parse(e.target.value);
            edads = new Date();
            edads.setTime(edadMS);
            resultado = edads.getFullYear() - 1970;
            res = (resultado <= 0) ? 0 : resultado; // Para evitar que sea negativo
            document.getElementById('edad').innerHTML = res;
        }
    </script>




    <script>
        $(document).ready(function() {
            $('#region').on('change', function() {
                var region_id = $(this).val();
                if ($.trim(region_id) != '') {
                    $.get('comunas', {
                        region_id: region_id
                    }, function(comunas) {
                        $('#comuna').empty();
                        $('#comuna').append("<option value=''>Seleccionar Comuna</option>");
                        $.each(comunas, function(index, value) {
                            $('#comuna').append("<option value='" + index + "'> " + value +
                                "</option>");
                        })
                    });
                }
            });
        });
    </script>






    <!-- Script Autocomplete direccion-->


    <!-- Script Autocomplete select -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgB56bavzmEa4I3Ac7vZkjpAtdsSvWwrg&callback=initAutocomplete&libraries=places&v=weekly"
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
        let direccion;
        let direccion_opcional;
        let codigoPostal;

        google.maps.event.addDomListener(window, 'load', initAutocomplete);

        function initAutocomplete() {

            direccion = document.getElementById('direccion');
            direccion_opcional = document.querySelector("#direccion_opcional");
            codigPostal = document.querySelector("#codigoPostal");
            // Create the autocomplete object, restricting the search predictions to
            // addresses in the US and Canada.
            autocomplete = new google.maps.places.Autocomplete(direccion, {
                componentRestrictions: {
                    country: ["cl"]
                },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });

            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            const place = autocomplete.getPlace();
            let address1 = "";
            let postcode = "";

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
                        address1 += component.long_name;
                        break;
                    }

                    case "locality": {
                        address1 += " " + component.long_name;
                        break;
                    }

                    /*case "postal_code_suffix": {
                        postcode = `${postcode}-${component.long_name}`;
                        break;
                    }*/
                    case "administrative_area_level_3":
                        document.querySelector("#comuna").value = component.long_name;
                        break;
                    case "administrative_area_level_1": {
                        document.querySelector("#region").value = component.long_name;
                        break;
                    }
                    /*case "pais":
                        document.querySelector("#pais").value = component.long_name;
                        break;*/
                }
            }

            direccion.value = address1;
            // After filling the form with address components from the Autocomplete
            // prediction, set cursor focus on the second address line to encourage
            // entry of subpremise information such as apartment, unit, or floor number.
            direccion_opcional.focus();
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#latitude_Area").addClass("d-none");
            $("#longtitude_Area").addClass("d-none");
        });
    </script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
                $("#latitude_Area").removeClass("d-none");
                $("#longtitude_Area").removeClass("d-none");
            });
        }
    </script>


@endsection
