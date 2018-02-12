@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nova Categoria</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.store') }}">
                        {{ csrf_field() }}

                        @include('categories._form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                                <a href="{{ route('categories.index') }}" class="btn">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
