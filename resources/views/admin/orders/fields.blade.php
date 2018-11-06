<!-- Ordered Article Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordered_article_id', 'Ordered Article Id:') !!}
    {!! Form::number('ordered_article_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid', 'Paid:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('paid', false) !!}
        {!! Form::checkbox('paid', '1', null) !!} 1
    </label>
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
