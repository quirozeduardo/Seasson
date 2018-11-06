@extends('layouts.main')
@section('title','Carrito de compra')
@section('content')
    <div class="row">
        @if(isset($articles)&&($articles->count()>0))
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 bg-light">
                    <div class="row">
                        <div class="col"></div>
                        <p class="col text-dark">Nombre del producto</p>
                        <p class="col text-dark">Precio</p>
                        <p class="col text-dark">Cantidad</p>
                        <p class="col text-dark">Subtotal</p>
                    </div>
                </div>
                    @foreach($articles as $article)
                        <div class="cart-product col-sm-12 row">
                            <div class="col">
                                <a href="{{URL::to('/')}}/article/{{$article->id}}"><img class="img-fluid" src="{{URL::to('/')}}/storage/images/{{$article->image}}" alt=""></a>
                            </div>
                            <div class="col">
                                <a href="{{URL::to('/')}}/article/{{$article->id}}"><h6>{{$article->name}}</h6></a>
                                <a href="{{URL::to('/cart/remove')}}/{{$article->id}}"><i class="ion-trash-a"></i>Remover</a>
                            </div>
                            <div class="col text-center">
                                <p>
                                    <s class="oldprice">${{$article->price}} MXN</s>
                                    <br>
                                    @if($article->discount>0)
                                    <span class="newprice">${{($article->price)-(($article->price*$article->discount)/100)}} MXN</span>
                                    <br>
                                    <span class="discount">-{{$article->discount}}% </span>
                                    @endif
                                </p>
                            </div>
                            <div class="col">
                                <input class="form-control" type="number" value="1" >
                            </div>
                            <div class="col text-center">
                                <p>
                                    <s class="oldprice">${{$article->price}} MXN</s>
                                    <br>
                                    @if($article->discount>0)
                                    <span class="newprice">${{($article->price)-(($article->price*$article->discount)/100)}} MXN</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-12 row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-12">
                                    <strong class="float-left">Subtotal</strong>
                                    <span class="float-right">${{$price=$articles->sum('price')}}</span>
                                </div>
                                <div class="col-12">
                                    <strong class="float-left">IVA</strong>
                                    <span class="float-right">${{$iva=$articles->sum('price')*0.16}}</span>
                                </div>
                                <div class="col-12">
                                    <strong class="float-left">TOTAL</strong>
                                    <span class="float-right">${{$price+$iva}}</span>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <a href="{{ URL::to('/pay/card') }}" class="btn btn-dark bg-dark col-12">PAGAR</a>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @endif
    </div>
@endsection