<div class="modal fade" id="modalBan{{ $usuario->id }}" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="moda-body">
                <div class="card">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Ban</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('usuario.ban') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" id="id" value="{{ $usuario->id }}">
                            <div class="from-group row">
                                <div class="col-md-4">

                                    <input type="number" id="ban_time" name="ban_time" min="0" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <strong>Min</strong>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-danger">Ban</button>
                                </div>
                            </div>
                        </form>

                    </div>




                </div>
            </div>
        </div>



    </div>
</div>
