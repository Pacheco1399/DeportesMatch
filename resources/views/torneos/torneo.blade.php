
<div class="card" style="width: 18rem;">
  
    <div class="card-header">
        <h5 class="card-title">{{ $t->nombre}}
        </h5>
    </div>
    <div class="card-body">

        <div class="card" style="background-color: whitesmoke">


            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
            <div class="col-md-12" style="align-items: center">

                
            </div>
        </div>



            <p
                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
                Direccion: {{ $t->direccion_torneo }}
            </p>
            <p
                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
                Tipo de torneo: 
                @if ($t->tipo_torneo == 1)
                    torneo de Eliminatoria
                @elseif ($t->tipo_torneo == 0)
                    torneo de por grupos
                @endif
            </p>
            <p
                style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
                Capacidad: {{ $t->cantidad_equipos }} Equipos 
            </p>

            <p
            style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: left; color: black">
            Equipos inscritos:  {{($t->inscritos)}}
            </p>
    

            <div class="card-footer">
                <div class="d-grid gap-2 col-12 ">
                    <form method="GET" action="{{ route('torneo.unirse') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="torneo_id" id="torneo_id" value="{{$t->id}}">
                        <input type="hidden" name="equipo_id" id="equipo_id"
                            value="{{ $equipo_id }}">
                        @if ($t->inscritos >= $t->cantidad_equipos)
                        <button type="submit" disabled class="btn btn-danger button">Unirse</button>
                        @else
                        <button type="submit"  class="btn btn-primary button">Unirse</button>
                    
                        @endif
                    
                    </form>
                    
                </div>   
            
            </div>
        <a class="btn btn-success" href="{{ route('torneos.verTorneos', ['torneo' => $t->id]) }}"> Ver torneo</a>
        @if (session('error'))
       
        <p style="color: red"> {{ session('error') }}</p>
        @endif
    </div>
    
    
</div>
