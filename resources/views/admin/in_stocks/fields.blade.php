<!-- Article Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('article_id', 'Articulo:') !!}
    {!! Form::select('article_id', $articles, old('article'), ['class' => 'form-control select2']) !!}
    {{--{!! Form::number('article_id', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Size Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size_id', 'Talla:') !!}
    {!! Form::select('size_id', $sizes, old('size'), ['class' => 'form-control select2']) !!}
    {{--{!! Form::number('size_id', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Cantidad:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(' Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.inStocks.index') !!}" class="btn btn-default">Cancel</a>
</div>
