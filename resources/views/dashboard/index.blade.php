@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body dashboard">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center">{{ $booksCount }}</h2>
                                    <p class="text-center">Livros</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center">4</h2>
                                    <p class="text-center">Empréstimos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center">1</h2>
                                    <p class="text-center">Atrasos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center"><small>R$</small> 1.602,40</h2>
                                    <p class="text-center">Janeiro</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center"><small>R$</small> 143,20</h2>
                                    <p class="text-center">Fevereiro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Empréstimos
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-xs pull-right" title="Cadastrar"><i class="fa fa-plus"></i> Novo empréstimo</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Livro</th>
                                <th>Cliente</th>
                                <th>Retirada</th>
                                <th>Devolução</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td>O Rei Leão</td>
                                <td>Felipe Ricardo</td>
                                <td>09/02/2018</td>
                                <td>
                                    10/02/2018
                                    <span class="label label-danger">atrasado</span>
                                </td>
                                <td>
                                    R$ 1,00
                                    <a tabindex="0" class="badge badge-error" role="button" data-toggle="popover" data-trigger="focus"
                                       title="Multa por atraso!" data-content="R$ 0,20 + R$ 0,80">
                                        <i class="fa fa-question"></i>
                                    </a>
                                </td>
                                <td align="right">
                                    <a href="{{ route('users.edit', 1) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Devolver</a>
                                    <a href="{{ route('users.edit', 1) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('users.destroy', 1) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>O Rei Leão</td>
                                <td>Felipe Ricardo</td>
                                <td>09/02/2018</td>
                                <td>14/02/2018</td>
                                <td>
                                    R$ 1,00
                                </td>
                                <td align="right">
                                    <a href="{{ route('users.edit', 1) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Devolver</a>
                                    <a href="{{ route('users.edit', 1) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('users.destroy', 1) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Histórico</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Livro</th>
                                <th>Cliente</th>
                                <th>Retirada</th>
                                <th>Devolução</th>
                                <th>Devolvido</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4</td>
                                <td>O Rei Leão</td>
                                <td>Felipe Ricardo</td>
                                <td>09/02/2018</td>
                                <td>10/02/2018</td>
                                <td>12/02/2018</td>
                                <td>
                                    R$ 1,00
                                    <a tabindex="0" class="badge badge-error" role="button" data-toggle="popover" data-trigger="focus"
                                       title="Multa por atraso!" data-content="R$ 0,20 + R$ 0,80">
                                        <i class="fa fa-question"></i>
                                    </a>
                                </td>
                                <td align="right">
                                    <form action="{{ route('users.destroy', 1) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>O Rei Leão</td>
                                <td>Felipe Ricardo</td>
                                <td>01/02/2018</td>
                                <td>02/02/2018</td>
                                <td>02/02/2018</td>
                                <td>
                                    R$ 0,20
                                </td>
                                <td align="right">
                                    <form action="{{ route('users.destroy', 1) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
