<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Nome</label>

    <div class="col-md-6">
        {{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
    <label for="document" class="col-md-4 control-label">CPF</label>

    <div class="col-md-6">
        {{ Form::text('document', null, ['class' => 'form-control']) }}

        @if ($errors->has('document'))
            <span class="help-block">
                <strong>{{ $errors->first('document') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-mail</label>

    <div class="col-md-6">
        {{ Form::email('email', null, ['class' => 'form-control']) }}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
    <label for="birthdate" class="col-md-4 control-label">Nascimento</label>

    <div class="col-md-6">
        {{ Form::text('birthdate', null, ['class' => 'form-control']) }}

        @if ($errors->has('birthdate'))
            <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
            </span>
        @endif
    </div>
</div>