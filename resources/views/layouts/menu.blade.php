<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{!! route('admin.articles.index') !!}"><i class="ion ion-ios-albums"></i><span>Articulos</span></a>
</li>

<li class="{{ Request::is('sizesArticles*') ? 'active' : '' }}">
    <a href="{!! route('admin.sizesArticles.index') !!}"><i class="fa fa-edit"></i><span>Sizes Articles</span></a>
</li>

<hr>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('admin.categories.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('genders*') ? 'active' : '' }}">
    <a href="{!! route('admin.genders.index') !!}"><i class="fa fa-edit"></i><span>Generos</span></a>
</li>

<li class="{{ Request::is('sizes*') ? 'active' : '' }}">
    <a href="{!! route('admin.sizes.index') !!}"><i class="fa fa-edit"></i><span>Tallas</span></a>
</li>

<hr>

<li class="{{ Request::is('orderedArticles*') ? 'active' : '' }}">
    <a href="{!! route('admin.orderedArticles.index') !!}"><i class="ion ion-ios-cart"></i><span>Articulos ordenados</span></a>
</li>

<li class="{{ Request::is('orderStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.orderStatuses.index') !!}"><i class="ion ion-ios-cart"></i><span>Estatus de pedido</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('admin.orders.index') !!}"><i class="ion ion-ios-cart"></i><span>Pedidos</span></a>
</li>