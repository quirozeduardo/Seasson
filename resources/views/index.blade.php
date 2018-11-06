@extends('layouts.main')
@section('title','Bienvenido')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/slider1.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider2.jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider3.jpeg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/slider4.jpeg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        @if(isset($articles)&&($articles->count()>0))
        <div class="col-sm-12">
            <div class="top-ten">
                <h3 class="text-center">TOP 10</h3>
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <a href="{{URL::to('/')}}/article/{{$article->id}}">
                                <div class="product-img">
                                    <img class="img-thumbnail" src="{{URL::to('/')}}/storage/images/{{$article->image}}" alt="Nike">
                                </div>
                                <div class="product-caption text-center">
                                    <h4 class="product-title"></h4>
                                    <p>
                                        <s class="oldprice">${{$article->price}} MXN</s>
                                        @if($article->discount>0)
                                            <span class="newprice">${{($article->price)-(($article->price*$article->discount)/100)}} MXN</span>
                                            <br>
                                            <span class="discount">-{{$article->discount}}% </span>
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection