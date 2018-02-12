@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista
                    <a href="{{ route('books.create') }}" class="btn btn-success btn-xs pull-right" title="Cadastrar"><i class="fa fa-plus"></i></a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td align="right">
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
