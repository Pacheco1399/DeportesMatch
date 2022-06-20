<div class="card">

    <div class="card-body">



        <div class="form-group row">
            <div class="col-md-12" style="margin-bottom: 30px;">
                @foreach ($foto as $f)
                    @if ($f->imageable_id == $user->id)
                        <img style="margin-left: 50px" src="{{ asset(Auth::user()->foto_perfil) }}"
                            alt="{{ $user->name }}" width="250" width="250">

                    @endif
                @endforeach

            </div>




            <p
                style="font-size: 30px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center">
                <strong>{{ $user->name }} {{ $user->apellido_paterno }}
                    {{ $user->apellido_materno }}</strong>
            </p>

            <p
                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                {{ $user->edad }} Años
            </p>
            <p
                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                {{ $user->comuna }}, {{ $user->region }}
            </p>

            @if ($user->estado == 1)
                <p
                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                    Estado: Activo
                </p>
            @elseif($user->estado == 2)
                <p
                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                    Estado: TimeOut Temporal
                </p>
            @elseif($user->estado == 3)
                <p
                    style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">
                    Estado: Inhabilitado
                </p>
            @endif

            <p
                style="font-size: 20px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align: center; color: grey">

                @foreach ($deportes->get() as $index => $deporte)
                    @if ($user->deporte_id == $index)
                        Deporte Preferido: {{ $deporte }}
                    @endif
                @endforeach


            </p>




            <div class="form-group row" style="margin-top: 20px">

                <div class="col-md-12">

                    <a class="form-control btn-warning" href="{{ route('editar.perfil') }}">Configurar Perfil</a>

                </div>


            </div>



        </div>
    </div>
</div>
