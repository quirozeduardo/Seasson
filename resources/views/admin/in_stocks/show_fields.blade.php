<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $inStock->id !!}</p>
</div>

<!-- Article Id Field -->
<div class="form-group">
    {!! Form::label('article_id', 'Articulo:') !!}
    <p>{!! $inStock->article_id !!}</p>
</div>

<!-- Size Id Field -->
<div class="form-group">
    {!! Form::label('size_id', 'Talla:') !!}
    <p>{!! $inStock->size_id !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Cantidad:') !!}
    <p>{!! $inStock->quantity !!}</p>
</div>

<!-- Color Field -->
<div class="form-group">
    {!! Form::label('color', 'Color:') !!}
    <p>{!! $inStock->color !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $inStock->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $inStock->updated_at !!}</p>
</div>

