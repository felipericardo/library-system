<div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
    <label for="customer_id" class="col-md-4 control-label">Cliente</label>

    <div class="col-md-6">
        {{ Form::select('customer_id', $customers, null, ['class'=>'form-control']) }}

        @if ($errors->has('customer_id'))
            <span class="help-block">
                <strong>{{ $errors->first('customer_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('book_id') ? ' has-error' : '' }}">
    <label for="book_id" class="col-md-4 control-label">Livro</label>

    <div class="col-md-6">
        {{ Form::select('book_id', $books, null, ['class'=>'form-control']) }}

        @if ($errors->has('book_id'))
            <span class="help-block">
                <strong>{{ $errors->first('book_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
    <label for="start" class="col-md-4 control-label">Retirada</label>

    <div class="col-md-6">
        {{ Form::text('start', isset($record) ? convertDate('Y-m-d', 'd/m/Y', $record->start) : null, ['class' => 'form-control datepicker']) }}

        @if ($errors->has('start'))
            <span class="help-block">
                <strong>{{ $errors->first('start') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('expected_end') ? ' has-error' : '' }}">
    <label for="expected_end" class="col-md-4 control-label">Devolução</label>

    <div class="col-md-6">
        {{ Form::text('expected_end', isset($record) ? convertDate('Y-m-d', 'd/m/Y', $record->expected_end) : null, ['class' => 'form-control datepicker']) }}

        @if ($errors->has('expected_end'))
            <span class="help-block">
                <strong>{{ $errors->first('expected_end') }}</strong>
            </span>
        @endif
    </div>
</div>