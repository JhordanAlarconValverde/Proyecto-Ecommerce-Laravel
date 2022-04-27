@extends('layouts.app')

@section('content')

<div class="container">

    <div>
        <!-- Div imagenes  Piero -->
        <section class="imagen-contacto" style="background-position: center center;
    background-size: cover;
    height: 33rem;
    display: flex;
    align-items: center;
    text-align: center;
    background-image: url('image/index_ofertas/img_contacto.jpg');
    font-family: 'Lato', sans-serif;
    margin-bottom: .5rem;">
            <div class="contenedor contenido-centrado" style="width: 95%;
    max-width: 120rem;
    margin: 0 auto;">
                <h2 style="font-family: 'Lato', sans-serif; font-size: 2rem;font-weight: black;color: #fff;">Lorem ipsum dolor
                    sit amet</h2>
                <p style="font-family: 'Lato', sans-serif; font-size: 1rem;color: #fff;">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Laboriosam magnam quis suscipit minima unde aliquid in! Dolores incidunt odio veniam
                    similique ex. Veritatis optio qui nam hic! Nobis, natus expedita.</p>
                <a href="#" class="boton boton-amarillo" style="color: #fff;
    font-weight: bold;
    text-decoration: none;
    font-size: 1rem;
    padding: 1rem 3rem;
    margin-top: 2.5rem;
    text-align: center;
    border: none;
    display: block;
    flex: 0 0 100%;
    background-color:rgb(116, 30, 254); ;
    width: auto;   
    display: inline-block;">Comprar Ahora</a>
            </div>
        </section>

        <div class="row">
            <div class="col">
                <section class="imagen-contacto" style="background-position: center center;
    background-size: cover;
    height: 33rem;
    display: flex;
    align-items: center;
    text-align: left;
    background-image: url('image/index_ofertas/img_contacto2.jpg');
    font-family: 'Lato', sans-serif;">
                    <div class="contenedor contenido-centrado" style="width: 80%;
    max-width: 120rem;
    margin: 0 auto;">
                        <h2 style="font-family: 'Lato', sans-serif; font-size: 2rem;font-weight: black;color: #fff;">Lorem ipsum dolor
                            sit amet</h2>
                        <p style="font-family: 'Lato', sans-serif; font-size: 1rem;color: #fff;">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Laboriosam magnam quis suscipit minima unde aliquid in! Dolores incidunt odio veniam
                            similique ex. Veritatis optio qui nam hic! Nobis, natus expedita.</p>
                        <a href="#" class="boton boton-amarillo" style="color: #fff;
    font-weight: bold;
    text-decoration: none;
    font-size: 1rem;
    padding: 1rem 3rem;
    margin-top: 2.5rem;
    text-align: center;
    border: none;
    display: block;
    flex: 0 0 100%;
    background-color:rgb(116, 30, 254); ;
    width: auto;   
    display: inline-block;">Comprar Ahora</a>
                    </div>
                </section>
            </div>
            <div class="col">
                <section class="imagen-contacto" style="background-position: center center;
    background-size: cover;
    height: 33rem;
    display: flex;
    align-items: center;
    text-align: right;
    background-image: url('image/index_ofertas/img_contacto3.jpg');
    font-family: 'Lato', sans-serif;">
                    <div class="contenedor contenido-centrado" style="width: 80%;
    max-width: 120rem;
    margin: 0 auto;">
                        <h2 style="font-family: 'Lato', sans-serif; font-size: 2rem;font-weight: black;color: #fff;">Lorem ipsum dolor
                            sit amet</h2>
                        <p style="font-family: 'Lato', sans-serif; font-size: 1rem;color: #fff;">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Laboriosam magnam quis suscipit minima unde aliquid in! Dolores incidunt odio veniam
                            similique ex. Veritatis optio qui nam hic! Nobis, natus expedita.</p>
                        <a href="#" class="boton boton-amarillo" style="color: #fff;
    font-weight: bold;
    text-decoration: none;
    font-size: 1rem;
    padding: 1rem 3rem;
    margin-top: 2.5rem;
    text-align: center;
    border: none;
    display: block;
    flex: 0 0 100%;
    background-color:rgb(116, 30, 254); ;
    width: auto;   
    display: inline-block;">Comprar Ahora</a>
                    </div>
                </section>
            </div>

        </div>
        <!-- Div imagenes  Piero -->

    </div>

    <div class="boxcarac border border-dark border-3 bg-white my-4">
        <!-- Caracteristicas del servicio  Romano -->
        <div id="contenido">
            <div>
                <img class="imag d-inline p-2" src="{{URL::asset('/image/moto.png')}}">
                <p id="info" class="d-inline p-2">Recogida en la acera</p>
            </div>
            <div>
                <img class="imagcaja d-inline p-2" src="{{URL::asset('/image/caja.png')}}">
                <p id="info" class="d-inline p-2">Envío gratuito en pedidos superiores a 50 dólares</p>
            </div>
            <div>
                <img class="imag d-inline p-2" src="{{URL::asset('/image/porcentaje.png')}}">
                <p id="info" class="d-inline p-2">Precios bajos garantizados</p>
            </div>
            <div>
                <img class="imagtiempo d-inline p-2" src="{{URL::asset('/image/tiempo.png')}}">
                <p id="info" class="d-inline p-2">Disponibilidad 24/7</p>
            </div>
        </div>
    </div>

    <div>
        <!-- Los mas vendidos  Marcos -->
        <div class="p-4 bg-white text-center">
            <h1>Lo mas vendido</h1>
            <div class="d-flex justify-content-between">
                @foreach($mostSelled as $product)
                <div class="card" style="width: 18rem;">
                    <a href="#">
                        <img class="card-img-top cover" src="{{ asset('storage').'/'.$product->image }}" alt="Card image cap" height="200px">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <h3 class="text-primary">S/. {{$product->price}}</h3>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="btn btn-primary my-4"> Ver todo </button>
        </div>
    </div>

    <div>
        <!-- Comprar por categorias  Gael -->
    </div>
</div>
@endsection

<style>
    .cover {
        object-fit: cover;
    }
    .boxcarac {
        margin-top: 20px;
        /* borrar luego*/
        height: 150px;
        width: 1300px;
    }

    #contenido {
        display: flex;
        justify-content: space-around;
        margin-top: 40px;
    }

    .imag {
        display: flex;
        width: 80px;
    }

    .imagcaja {
        display: flex;
        width: 70px;
    }

    .imagtiempo {
        display: flex;
        width: 70px;
    }

    #info{
        display: inline-flex;
        height: 3em;
        width: 120px;
    }
</style>
