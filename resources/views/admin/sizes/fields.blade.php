<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Talla:') !!}
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.sizes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
