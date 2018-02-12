@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Livro</div>
                <div class="panel-body">
                    {{ Form::model($book, ['route' => ['books.update', $book->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) }}
                        @include('books._form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Editar</button>
                                <a href="{{ route('books.index') }}" class="btn">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
