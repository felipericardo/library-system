@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista
                    <a href="{{ route('customers.create') }}" class="btn btn-success btn-xs pull-right" title="Cadastrar"><i class="fa fa-plus"></i></a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                                <th>Nascimento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->document }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->birthdate }}</td>
                                    <td align="right">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
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
