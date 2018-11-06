@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <img class="img-thumbnail" src="{{URL::to('/')}}/storage/images/{{$article->image}}" alt="{{$article->name}}">
        </div>
        <div class="col-sm-12 col-md-6">
            <h2>{{$article->name}}</h2>
            <div>
                <br>
                <h5>Price: </h5>
                <s class="oldprice">${{$article->price}} MXN</s>
                <br>
                @if($article->discount>0)
                    <span class="newprice">${{($article->price)-(($article->price*$article->discount)/100)}} MXN</span>
                    <br>
                    <span class="discount">-{{$article->discount}}% </span>
                @endif
                <br>
                <br>
                <div id="show-info">
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark mr-1" data-toggle="collapse" data-target=#description aria-expanded="true" aria-controls="description">Descripción</button>
                        <button type="button" class="btn btn-outline-dark mr-1" data-toggle="collapse" data-target="#info" aria-expanded="false" aria-controls="info">+Info</button>
                        <button type="button" class="btn btn-outline-dark" data-toggle="collapse" data-target="#sizes" aria-expanded="false" aria-controls="sizes">Tallas</button>
                    </div>
                    <div class="collapse multi-collapse show" id="description" data-parent="#show-info">
                        <br>
                        <strong>{{$article->description}}</strong>
                    </div>
                    <div class="collapse multi-collapse" id="info" data-parent="#show-info">
                        <br>
                        <strong>{{$article->info}}</strong>
                    </div>
                    <div class="collapse multi-collapse" id="sizes" data-parent="#show-info">
                        <br>
                        <strong>Tallas en el catalogo de tallas</strong>
                    </div>
                </div>
                <br>
                <br>
                <a class="btn btn-primary" href="{{URL::to('/cart/add/')}}/{{$article->id}}"><i class="ion-plus-round"></i>Agregar a carrito</a>
            </div>
        </div>
    </div>
@endsection