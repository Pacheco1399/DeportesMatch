@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        p.clasificacion {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        
        p.clasificacion input {
            position: absolute;
            top: -100px;
        }
        
        p.clasificacion label {
            float: right;
            color: #333;
        }
        
        p.clasificacion label:hover,
        p.clasificacion label:hover ~ label,
        p.clasificacion input:checked ~ label {
            color: #dd4;
    }
    </style>    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               
            </div>
        </div>
        
        
        <div class="container-fluid"> 
            <body>
                <form method="POST" action="{{ route('eventos.guardar') }}">
                    @csrf
                    <input type="hidden" name="usuario_id" id="usuario_id" value="{{ Auth::user()->id }}"> 
                    <input type="hidden" name="evento_id" id="evento_id" value="{{ $evento->id }}"> 


                    <h1>Evento {{$evento->nombreEvento}}</h1>
                    <div class="alert alert-warning" role="alert">
                        Esta valoracion solo la vera el creador del evento
                        </div>
                        <div class="form-group row">
                            <label for="clasificacion"
                                class="col-md-4 col-form-label text-md-right">{{ __('Valoracion del evento') }}</label>
                            <div class="col-md-6 my-2">
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="valoracion" value="5">
                                    <label for="radio1">★</label>
                                    <input id="radio2" type="radio" name="valoracion" value="4">
                                    <label for="radio2">★</label>
                                    <input id="radio3" type="radio" name="valoracion" value="3">
                                    <label for="radio3">★</label>
                                    <input id="radio4" type="radio" name="valoracion" value="2">
                                    <label for="radio4">★</label>
                                    <input id="radio5" type="radio" name="valoracion" value="1" checked>
                                    <label for="radio5">★</label>
                                </p>
                            </div>
                            <label for="comentario"
                            class="col-md-4 col-form-label text-md-right">{{ __('Deja tu comentario') }}</label>
                            <div class="col-md-6 my-2">
                                <textarea id="comentario" name="comentario" class="form-control" 
                                aria-label="With textarea" maxlength="128"></textarea>
                                <span class="help-block">
                                    <p id="mensaje_ayuda" name="mensaje_ayuda" class="help-block">Cuerpo del mensaje de alerta</p>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="inputsubmit">
                                    {{ __('insertar valoracion') }}
                                </button>
                               <button  type="button" class="btn btn-success " onclick="history.back()">
                                     {{ __('Volver') }}
                               </button>
                               
                               <button type="reset" class="btn btn-warning" >
                                    {{ __('Limpiar') }}
                                </button>
                        </div>
                </form>   
            </body>
        </div>
    </div>
    <script>
        $('#mensaje_ayuda').text('128 carácteres restantes');
        $('#comentario').keydown(function () {
            var max = 128;
            var len = $(this).val().length;
            if (len >= max) {
                $('#mensaje_ayuda').text('Has llegado al límite');// Aquí enviamos el mensaje a mostrar          
                $('#mensaje_ayuda').addClass('text-danger');
                $('#comentario').addClass('is-invalid');
                $('#inputsubmit').addClass('disabled');    
                document.getElementById('inputsubmit').disabled = true;                    
            } 
            else {
                var ch = max - len;
                $('#mensaje_ayuda').text(ch + ' carácteres restantes');
                $('#mensaje_ayuda').removeClass('text-danger');            
                $('#comentario').removeClass('is-invalid');            
                $('#inputsubmit').removeClass('disabled');
                document.getElementById('inputsubmit').disabled = false;            
            }
        });  
    </script>
@endsection