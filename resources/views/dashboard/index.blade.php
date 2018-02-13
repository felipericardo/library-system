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
                                    <h2 class="text-center">{{ count($recordsOpen) }}</h2>
                                    <p class="text-center">Empréstimos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center">{{ $lateCount }}</h2>
                                    <p class="text-center">Atrasos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center"><small>R$</small> {{ money($lastMonthRevenues, false) }}</h2>
                                    <p class="text-center">{{ monthText(date('m', strtotime('-1 month'))) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h2 class="text-center"><small>R$</small> {{ money($currentRevenues, false) }}</h2>
                                    <p class="text-center">{{ monthText(date('m')) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Empréstimos
                    <a href="{{ route('records.create') }}" class="btn btn-success btn-xs pull-right" title="Cadastrar"><i class="fa fa-plus"></i> Novo empréstimo</a>
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
                            @forelse($recordsOpen as $record)
                                <tr>
                                    <td>{{ $record->id }}</td>
                                    <td>{{ $record->book->title }}</td>
                                    <td>{{ $record->customer->name }}</td>
                                    <td>{{ convertDate('Y-m-d', 'd/m/Y', $record->start) }}</td>
                                    <td>
                                        {{ convertDate('Y-m-d', 'd/m/Y', $record->expected_end) }}
                                        @if($record->has_late)
                                            <span class="label label-danger">atrasado</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ money($record->current_amount) }}
                                        @if($record->has_late)
                                            <a tabindex="0" class="badge badge-error" role="button" data-toggle="popover" data-placement="top" data-trigger="focus"
                                               title="Multa por atraso!" data-content="{{ money($record->value) }} + {{ money($record->current_fee) }}">
                                                <i class="fa fa-question"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td align="right">
                                        <a href="{{ route('records.complete', $record->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Devolver</a>
                                        <a href="{{ route('records.edit', $record->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('records.destroy', $record->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Deletar"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="7">
                                        Nenhum empréstimo encontrado!
                                    </td>
                                </tr>
                            @endforelse
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
                            @forelse($recordsClosed as $record)
                                <tr>
                                    <td>{{ $record->id }}</td>
                                    <td>{{ $record->book->title }}</td>
                                    <td>{{ $record->customer->name }}</td>
                                    <td>{{ convertDate('Y-m-d', 'd/m/Y', $record->start) }}</td>
                                    <td>{{ convertDate('Y-m-d', 'd/m/Y', $record->expected_end) }}</td>
                                    <td>{{ convertDate('Y-m-d H:i:s', 'd/m/Y', $record->real_end) }}</td>
                                    <td>
                                        {{ money($record->amount) }}
                                        @if($record->has_late)
                                            <a tabindex="0" class="badge badge-error" role="button" data-toggle="popover" data-placement="top" data-trigger="focus"
                                               title="Multa por atraso!" data-content="{{ money($record->value) }} + {{ money($record->fee) }}">
                                                <i class="fa fa-question"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td align="right">
                                        <form action="{{ route('records.destroy', $record->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Deletar"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center" colspan="8">
                                        Ainda não existe um histórico para mostrar!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
