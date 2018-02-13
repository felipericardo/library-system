@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo Empréstimo</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('records.store') }}">
                        {{ csrf_field() }}

                        @include('records._form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                                <a href="{{ route('dashboard') }}" class="btn">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
