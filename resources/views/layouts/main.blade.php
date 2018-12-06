<!doctype html>
<html lang="es">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/favicon.png"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }} - @yield('title')</title>
    {!!Html::style('/ionicons/css/ionicons.min.css')!!}
    {!!Html::style('/css/app.css')!!}

    @yield('css')
</head>
<body>
<div class="container-fluid fixed-top container-header">
    <div class="header bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="row">
                    <div class="col-sm-12 col-md-4 ">
                        <a href="{{ URL::to('/') }}"><img id="logo-image" src="{{URL::to('/')}}/images/samantha.png" alt="Samantha"></a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdownMenuMujer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mujer
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuMujer">
                                @foreach(\App\Http\Controllers\Admin\CategoryController::getCategoriesByGender('Mujer') as $category)
                                    <a class="dropdown-item" href="{{URL::to('/filter')}}/Mujer/{{$category->name}}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdownMenuHombre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hombre
                            </a>
                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdownMenuHombre">
                                @foreach(\App\Http\Controllers\Admin\CategoryController::getCategoriesByGender('Hombre') as $category)
                                    <a class="dropdown-item" href="{{URL::to('/filter')}}/Hombre/{{$category->name}}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdownMenuTendencias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tendencias
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuTendencias">
                                <a class="dropdown-item" href="#">Tendencia 1</a>
                                <a class="dropdown-item" href="#">Tenencia 2</a>
                                <a class="dropdown-item" href="#">Tenencia 3</a>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" id="word" placeholder="Buscar">
                        </div>
                    </div>
                    <div class="mr-3 ml-3">
                        <a class="text-light" href="{{ URL::to('/cart') }}">
                            <i class="ion-bag"></i> CARRITO ({{\App\Http\Controllers\CartController::getCountArticlesInCart()}})
                        </a>
                        <span class="text-light">|</span>
                        @auth
                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-right float-right text-light" href="{{ URL::to('/logout') }}">Salir</a>
                            @if(Auth::user()->isAdmin())
                                <span class="float-right text-light">|</span>
                                <a class="text-right float-right text-light" href="{{ URL::to('/admin') }}">IR A CRUD</a>
                            @else

                                <span class="float-right text-light">|</span>
                                <a class="text-right float-right text-light" href="{{ URL::to('/profile') }}">Perfil</a>
                            @endif

                            {!! Form::open(['id'=>'logout-form','route' => 'logout','method'=>'POST']) !!}
                            {!! Form::close() !!}
                        @else
                            <a class="text-right float-right text-light" href="{{ URL::to('/login') }}">INICIAR SESIÓN</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="container container-main">
    <section class="content">
        @include('flash::message')
        <div class="row">
            <div class="col-md-12 col-lg-9">
                @yield('content')

            </div>
            <div class="col-md-12 col-lg-3">
                @php
                    $clima = \App\Http\Controllers\HomeController::getClima('San Luis Potosi');
                @endphp
                <div class="climaAnimation">
                    @if($clima != null)
                        <h4 class="text-white">Temperatura: {{ $clima['temp'] }} ℃</h4>
                    @if($clima['tiempo'] == 'soleado')
                            <div class="icon sunny">
                                <div class="sun">
                                    <div class="rays"></div>
                                </div>
                            </div>
                    @elseif($clima['tiempo'] == 'soleado-lluvia')
                            <div class="icon sun-shower">
                                <div class="cloud"></div>
                                <div class="sun">
                                    <div class="rays"></div>
                                </div>
                                <div class="rain"></div>
                            </div>
                    @elseif($clima['tiempo'] == 'tormenta-electrica')
                            <div class="icon thunder-storm">
                                <div class="cloud"></div>
                                <div class="lightning">
                                    <div class="bolt"></div>
                                    <div class="bolt"></div>
                                </div>
                            </div>
                    @elseif($clima['tiempo'] == 'nublado')
                            <div class="icon cloudy">
                                <div class="cloud"></div>
                                <div class="cloud"></div>
                            </div>
                    @elseif($clima['tiempo'] == 'lluvia')
                            <div class="icon rainy">
                                <div class="cloud"></div>
                                <div class="rain"></div>
                            </div>
                    @elseif($clima['tiempo'] == 'rafagas')
                            <div class="icon flurries">
                                <div class="cloud"></div>
                                <div class="snow">
                                    <div class="flake"></div>
                                    <div class="flake"></div>
                                </div>
                            </div>
                    @else
                            <div class="icon sunny">
                                <div class="sun">
                                    <div class="rays"></div>
                                </div>
                            </div>
                    @endif
                    @endif
                </div>

            </div>
        </div>
    </section>
</div>

<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Contactanos</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Seasson</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Legal</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Empresas</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Contactanos</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Conocenos</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Seasson</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Legal</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Empresas</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Contactanos</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Amanos</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Seasson</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Legal</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Empresas</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Contactanos</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            </hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p>Seasson empresa de ropa creada en San Luis Potosi, San Luis Potosi, Mexico[Seasson 2018/03/12]</p>
                <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Seasson</a></p>
            </div>
            </hr>
        </div>
    </div>
</section>

{!!Html::script('js/app.js')!!}

<script !src="">
    $(document).ready(function ()
    {
        $('#word').keypress(function(e)
        {
            if(e.which == 13) {
                var value = $(this).val();
                if (value.length > 0)
                {
                    window.location.href = '{{ URL::to('filter/search/') }}' + '/' + value;
                }
            }
        });
    });
</script>

@yield('script')

</body>
</html>
