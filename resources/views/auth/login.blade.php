@extends('layouts.main')
@section('title','Login o crear una cuenta')
@section('titleSub','Login o crear una cuenta')
@section('content')
    <div class="row">
        <div class="col-md-6 card">
            <div class="card-body">
                <h5 class="card-title">SOY NUEVO AQUI</h5>
                <p class="card-text">Crea tu cuenta y registra tus datos personales y de envío con nosotros de forma rápida y sencilla.
                    De esta forma podrás gestionar tus direcciones de entrega y facturación, ver tu lista de pedidos, y mucho más.</p>
                <a href="{{ URL::to('/register') }}" class="btn btn-dark">CREAR UNA CUENTA</a>
            </div>
        </div>
        <div class="col-md-6 card">
            <div class="card-body">
                <h5 class="card-title">YA ESTOY REGISTRADO</h5>
                {{ Form::open(array('url' => '/login')) }}
                <div class="form-group">
                    <label for="InputEmail1">Email</label>
                    <input type="email" class="form-control" id="InputEmail1" value="{{ old('email') }}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">No compartiremos tu email con ninguna persona</small>
                </div>
                <div class="form-group">
                    <label for="InputPassword1">Password</label>
                    <input type="password" class="form-control" id="InputPassword1" name="password" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Recuerdamé</label>
                </div>
                <button type="submit" class="btn btn-dark">INICIAR SESIÓN</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection