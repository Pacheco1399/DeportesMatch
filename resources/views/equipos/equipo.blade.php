<div class="card" style="width: 18rem;">
    
        <div class="card-header">
            <h5 class="card-title">{{ $equipo->nombreEquipo }}

                <p
                    style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
                    ({{ $equipo->nombreDeporte }} )
                </p>
            </h5>
        </div>
    <div class="card-body">

        <div class="card" style="background-color: white">


            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
            <div class="col-md-12" style="align-items: center">

                <!--<img src="" class="rounded" alt="..." width="200px" height="200px">-->
                <div class="col-md-12" style="text-align: center">

                    <img src="/image/{{ $equipo->foto }}" class="rounded" width="150px" height="150px">
                </div>
            </div>
        </div>



        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Deporte: {{ $equipo->nombreDeporte }}
        </p>
        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Privacidad: @if($equipo->privacidad == 0) Publico @elseif($equipo->privacidad == 1) Privado @endif
        </p>
        <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Capacidad: {{ $equipo->miembros }}/{{ $equipo->capacidad }}
        </p>



        <div class="card-footer">
            <div class="d-grid gap-2 col-6 mx-auto">


              

                <a class="btn btn-success" href="{{ route('equipos.ver.team', ['equipo' => $equipo->id]) }}"> Ver </a>



            </div>



        </div>
    </div>
</div>




<!--<p class="card-text"><small class="text-muted">Last updated 3 mins
                                    ago</small></p>-->
