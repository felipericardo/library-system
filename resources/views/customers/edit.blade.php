@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Cliente</div>
                <div class="panel-body">
                    {{ Form::model($customer, ['route' => ['customers.update', $customer->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) }}
                        @include('customers._form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Editar</button>
                                <a href="{{ route('customers.index') }}" class="btn">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
