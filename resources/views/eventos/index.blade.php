@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               
            </div>
        </div>
    

        <div class="container-fluid"> 
            <body>
                <h1>Eventos</h1>
                <hr>
                <h3>Que son los eventos</h3>
                <div class="container md">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sociosqu tellus magna facilisi dictumst eu, 
                        nullam phasellus diam nisi aptent senectus. Bibendum nam mus varius sem fusce convallis tincidunt vehicula, 
                        quam tortor a malesuada dictum blandit tristique conubia senectus, id ad cursus fringilla parturient himenaeos enim. 
                        Nostra ridiculus imperdiet augue platea egestas laoreet praesent,
                        odio conubia sodales elementum blandit morbi, class fermentum mus turpis porta nullam. </p>
                    <br>
                    <h4>¿Para que me sirve crear un evento? </h4>
                    <p>Tempus varius felis praesent nulla massa proin a, dignissim nullam netus vivamus metus ullamcorper, 
                        dis ornare dictumst quam sollicitudin elementum. Porta eleifend quis class porttitor egestas proin mollis accumsan rutrum, 
                        ad facilisis massa sollicitudin luctus nibh hac primis venenatis, scelerisque fermentum vel ultricies praesent taciti cras mus. 
                        Inceptos tempor auctor netus nunc litora tristique euismod cras, 
                        luctus habitant augue sociosqu eros proin viverra commodo, habitasse arcu nisi platea massa id odio.</p>
                </div>
                <div class="card body">
                    <h5>Ver tus eventos 
                        <a class="btn btn-success mb-3" href="{{ route('eventos.ver') }}">Ver</a>
                    </h5>
                    <h5>Crear un nuevo evento
                        <a class="btn btn-success mb-3" href="{{ route('eventos.crear') }}">Crear</a>
                    </h5>
                    <h5>Buscar evento por deporte
                        <a class="btn btn-success mb-3" href="{{ route('home') }}"  >Buscar</a>
                    </h5>
                </div>
            </body>
        </div>
    </div>
@endsection