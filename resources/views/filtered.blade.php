@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="top-ten">
                <h3 class="text-center">Articulos</h3>
                <div class="row">
                    @if(isset($articles))
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
                                            <span class="newprice">${{($article->price)-(($article->price*$article->discount)/100)}} MXN</span>
                                            <br>
                                            <span class="discount">-10% </span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection