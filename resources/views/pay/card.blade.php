@extends('layouts.main')
@section('content')
    @if(\App\Http\Controllers\CartController::cartArticles()->count()>0)
        @php
            $arts = \App\Http\Controllers\CartController::getArticlesCookies();
        @endphp
    <div class="row">
        <div class="col-xs-12 col-md-7">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Samantha</strong>
                        <br>
                        2135 B.anaya
                        <br>
                        San Luis Potosi, CP 90026
                        <br>
                        <abbr title="Phone">P:</abbr> (444) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Fecha: 1 Noviembre, 2018</em>
                    </p>
                    <p>
                        <em>Recibo #: 34522677W</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Recibo</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Http\Controllers\CartController::cartArticles() as $article)
                        <tr>
                            <td class="col-md-9"><em>{{$article->name}}</em></td>
                            @php
                                $value = 0;
                                for ($i = 0; $i<sizeof($arts); $i++){
                                    if($article->id.'' == $arts[$i]->id){
                                        $value = $arts[$i]->quantity;
                                    }
                                }
                            @endphp
                            <td class="col-md-1" style="text-align: center">{{ $value }} </td>
                            <td class="col-md-1 text-center">${{$article->price * $value}}</td>
                            <td class="col-md-1 text-center">${{$article->price * $value}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>IVA: </strong>
                            </p></td>
                        <td class="text-center">
                            <p>
                                <strong>${{$price=\App\Http\Controllers\CartController::cartArticles()->sum('price')}}</strong>
                            </p>
                            <p>
                                <strong>${{$iva=\App\Http\Controllers\CartController::cartArticles()->sum('price')*0.16}}</strong>
                            </p></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h4><strong>Total: </strong></h4></td>
                        <td class="text-center text-danger"><h4><strong>${{$price+$iva}}</strong></h4></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Detalles de pago
                    </h3>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Recordar
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" >
                        <div class="form-group">
                            <label for="cardNumber">
                                NUMERO DE TARJETA</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cardNumber" placeholder="Numero de tarjeta valida"
                                       required autofocus />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="expityMonth">
                                        FECHA DE EXPIRACIÓN</label>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                    </div>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cvCode">
                                        CV CODIGO</label>
                                    <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>${{$price+$iva}}</span> Pago final</a>
                </li>
            </ul>
            <br/>
            <a href="{{ URL::to('/pay/card/payed') }}" class="btn btn-success btn-lg btn-block" role="button">PAGAR</a>
        </div>
    </div>
    @endif
@endsection
