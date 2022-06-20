<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <form action="{{ route('reserva.update') }}" method="post" id="update">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <div class=" col-md-12">
                            <div class="form-floating">

                                <input type="text" name="title" id="title" class="form-control">
                                <label for="title">Titulo</label>
                            </div>
                        </div>

                    </div>
                    <br>



                    <div class="form-group row">
                        <div class=" col-md-12">

                            <div class="form-floating">
                                <input type="date" min="2021-12-16" name="fecha" id="fecha" class="form-control">
                                <label for="fecha">Fecha</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">

                        <div class="col-md-6">

                            <div class="form-floating">
                                <input type="time" name="start" id="start" class="form-control" min="15:00"
                                    max="00:00">
                                <label for="start">Inicio</label>

                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-floating">
                                <input type="time" name="end" id="end" class="form-control">
                                <label for="end">Fin</label>
                            </div>
                        </div>


                        <br>


                    </div>
                    <input type="hidden" name="#cancha_id">
                    <br>
                    <div class="form-group row">
                        <div class=" col-md-12">

                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="description"
                                    style="width: 100%; height: 100%;"></textarea>
                                <br>
                                <label for="descripcion">Descripcion</label>
                            </div>
                        </div>
                    </div>

                    <br>
                </div>



                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            <form method="POST" action="{{ route('reserva.delete') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" id="delete" name="delete">
                <button type="submit" class="btn btn-danger" id="btnDelete">Eliminar</button>
            </form>


        </div>
    </div>
</div>
