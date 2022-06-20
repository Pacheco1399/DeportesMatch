<div class="card" style="width: 18rem;">

    <div class="card-header">
        <h5 >{{ $evento->nombreEvento }}
            @if ($evento->estado == 1)
            <span class="badge badge-info">Pendiente</span>
            
            @elseif($evento->estado == 2)
            <span class="badge badge-warning">Por Calificar</span>
            
            @else
            <span class="badge badge-success">Finalizado</span>
            @endif
            <p
                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
                ({{ $evento->nombreDeporte }} )
            </p>
        </h5>
    </div>

    <div class="card-body">

        <div class="card" style="background-color: whitesmoke">


            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
            <div class="col-md-12" style="align-items: center">

                <img src="{{ $evento->link }}" class="rounded" alt="..." width="100%" height="auto">

            </div>
        </div>



        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Fecha: {{ $evento->fechaEvento }}
        </p>
        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Hora: {{ $evento->horaEvento }}
        </p>
        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Ubicacion: {{ $evento->ubicacionEvento }}
        </p>
        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Cupo disponible: {{ $evento->participantesTotales }}
          
        </p>


        <div class="card-footer">
            <div class="d-grid gap-2 col-6 mx-auto">


                
                <form action="{{ route('eventos.ver.evento') }}" method="get">
                    @csrf
                    <input type="hidden" name="evento_id" id="evento_id" value="{{ $evento->id }}">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ $evento->usuario_id }}">
                    <input type="hidden" name="participante_id" id="participante_id" value="{{ Auth::user()->id }}">

                    <button type="submit" class="btn btn-success">Ver
                    </button>

                </form>

            </div>



        </div>
    </div>
</div>




<!--<p class="card-text"><small class="text-muted">Last updated 3 mins
                                    ago</small></p>-->
