<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    <label for="category_id" class="col-md-4 control-label">Categoria</label>

    <div class="col-md-6">
        {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}

        @if ($errors->has('category_id'))
            <span class="help-block">
                <strong>{{ $errors->first('category_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-md-4 control-label">Título</label>

    <div class="col-md-6">
        {{ Form::text('title', null, ['class' => 'form-control', 'autofocus']) }}

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
    <label for="quantity" class="col-md-4 control-label">Quantidade</label>

    <div class="col-md-6">
        {{ Form::number('quantity', null, ['class' => 'form-control', 'min' => 0]) }}

        @if ($errors->has('quantity'))
            <span class="help-block">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
        @endif
    </div>
</div>