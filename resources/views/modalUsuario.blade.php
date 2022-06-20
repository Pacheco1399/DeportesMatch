<!-- Modal -->


<div class="modal fade" id="modalUser{{ $usuario->id }}" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body">

                        <input type="hidden" name="idUsuario" id="idUsuario" value="{{ $usuario->id }}">
                        <div class="form-group row">

                            <div class="col-md-3">


                                <div class="card">
                                    <div class="card-header">
                                        Informacion Personal

                                    </div>

                                    <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-md-12" style="margin-bottom: 30px;">

                                                <img src="/image/{{ $usuario->foto }}" width="200px">

                                                
                                            </div>

                                            


                                            <p
                                                style="font-size: 30px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center">
                                                <strong>{{ $usuario->name }}
                                                    {{ $usuario->apellido_paterno }}</strong>
                                            </p>

                                            <p
                                                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                {{ $usuario->edad }} Años
                                            </p>
                                            <p
                                                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                {{ $usuario->comuna }}, {{ $usuario->region }}
                                            </p>

                                            @if ($usuario->estado == 1)
                                                <p
                                                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Estado: Activo
                                                </p>
                                            @elseif($usuario->estado == 2)
                                                <p
                                                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Estado: TimeOut Temporal
                                                </p>
                                            @elseif($usuario->estado == 3)
                                                <p
                                                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Estado: Inhabilitado
                                                </p>
                                            @endif

                                            <p
                                                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">

                                                


                                            </p>







                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">


                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">


                                        <div class="form-group row">


                                            <div class="col-md-2">
                                                <label for="name"
                                                    class="col-form-label text-md-right">{{ __('Deporte Favorito') }}</label>

                                            </div>

                                            <div class="col-md-6">

                                                


                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header">
                                        Panel de Administracion
                                    </div>

                                    <div class="card-body">

                                        <div class="form-group row">
                                            <div class="col-md-5">
                                                @if ($usuario->estado == 1)
                                                    <p
                                                        style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                        Estado: Activo
                                                    </p>
                                                @elseif($usuario->estado == 2)
                                                    <p
                                                        style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                        Estado: TimeOut Temporal
                                                    </p>
                                                @elseif($usuario->estado == 3)
                                                    <p
                                                        style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                        Estado: Inhabilitado
                                                    </p>
                                                @endif

                                                <p
                                                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                                                    Motivo:
                                                    <br>{{ $usuario->motivo }}
                                                </p>
                                            </div>
                                            <div class="col-md-3">

                                                <button class="btn btn-primary"
                                                    data-bs-target="#modalUser2{{ $usuario->id }}"
                                                    data-bs-toggle="modal" data-bs-dismiss="modal"> Editar </button>

                                            </div>

                                            <div class="col-md-4">



                                                @if ($usuario->estado == 3)

                                                    <form action="{{ route('activar.actualizar') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $usuario->id }}">
                                                        <input type="hidden" name="estado" id="estado" value="1">


                                                        <button type="submit" class="btn btn-success">Activar
                                                            usuario</button>

                                                    </form>

                                                @elseif($usuario->estado == 2)

                                                    <form action="{{ route('activar.actualizar') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $usuario->id }}">
                                                        <input type="hidden" name="estado" id="estado" value="1">


                                                        <button type="submit" class="btn btn-success">Activar
                                                            usuario</button>

                                                    </form>

                                                @endif
                                            </div>

                                        </div>


                                        <!--
                                    <input type="text" name="modalName" id="modalName"
                                        value="{{ $usuario->name }} {{ $usuario->apellido_paterno }}">
                                    <input type="text" name="modalEdad" id="modalEdad"
                                        value="{{ $usuario->edad }}">
                                    
                                    <input type="text" name="modalNacionalidad" id="modalNacionalidad"
                                        value="{{ $usuario->nacionalidad }}">
                                    <input type="text" name="modalRut" id="modalRut" value="{{ $usuario->rut }}">
                                    -->



                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalUser2{{ $usuario->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                Estado Actual:
                @if ($usuario->estado == 1)
                    Activo
                @elseif($usuario->estado == 2)
                    TimeOut Temporal
                @elseif($usuario->estado == 3)
                    Deshabilitado permanente
                @endif
                <br>
                <br>
                <br>

                <!--<select name="" id="" class="form-control">
                    @if ($usuario->estado == 1)
                        <option selected value="1">Activo</option>
                        <option value="2">Timeout temporal</option>
                        <option value="3">Deshabilitado permanente</option>
@elseif($usuario->estado == 2)
                        <option value="1">Activo</option>
                        <option selected value="2">Timeout temporal</option>
                        <option value="3">Deshabilitado permanente</option>
@elseif($usuario->estado == 3)
                        <option value="1">Activo</option>
                        <option value="2">Timeout temporal</option>
                        <option selected value="3">Deshabilitado permanente</option>
                    @endif
                </select>-->


                <form action="{{ route('estado.actualizar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="id" value="{{ $usuario->id }}">


                    <div class="form-group row">


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    TimeOut Temporal
                                </div>
                                <div class="card-body">
                                    <div class="form-check">

                                        <div class="col-md-12">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ban" id="24horas"
                                                    value="24" checked>
                                                24 Horas
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ban" id="3dias"
                                                    value="72">
                                                3 Dias
                                            </label>
                                        </div>
                                        <div class="col-md-12">

                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ban" id="7dias"
                                                    value="168">
                                                7 Dias
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ban" id="14dias"
                                                    value="336">
                                                14 Dias
                                            </label>
                                        </div>
                                        <div class="col-md-12">

                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ban" id="30dias"
                                                    value="720">
                                                30 Dias
                                            </label>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="col-md-12">

                                            <div class="input-group">
                                                <span class="input-group-text">Motivo</span>

                                                <textarea class="form-control" name="motivo" id="motivo"
                                                    style="height: 200px"></textarea>



                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    TimeOut Permanente
                                </div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="ban" id="1"
                                                value="perma">
                                            Permanente
                                        </label>
                                        <br>
                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-text">Motivo</span>
                                            <textarea class="form-control" name="motivo2" id="motivo2"
                                                style="height: 305px"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">


                            <div class="col-md-12" style="margin-top: 30px">
                                <button style="align-items: center" class="form-control" type="submit"
                                    style="inline-size: 200px">Guardar</button>

                            </div>
                        </div>

                    </div>
                </form>


            </div>
            <div class="modal-footer">


                <button class="btn btn-primary" data-bs-target="#modalUser{{ $usuario->id }}" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
