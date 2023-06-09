@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
               
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-header" style="color: #69C5A0">
            <strong>Carnets entregados</strong>
            @can('create_cards')
            <a class="float-right btn btn-default" href="{{ route('cards.create') }}">
                <span class="fas fa-user-plus" style="color: #69C5A0"></span>
            </a>
            @endcan
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="cards-table">
                    <thead>
                        <tr>
                            <th>Empleado</th>
                            <th>Fecha de entrega</th>
                            <th>Firma del empleado</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                        <tr>
                            <td>{{ $card->employe_id ? $card->employe->name : 'Sin ID'}}</td>
                            <td>{{ $card->delivery_date_card->format('Y-m-d') }}</td>
                            <td><img src="{{ $card->signature_employe_card }}" alt="Firma del empleado"></td>
                            <td width="120">
                                {!! Form::open(['route' => ['cards.destroy', $card->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('cards.show', [$card->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye" style="color: #13A4DA"></i>
                                    </a>
                                    <a href="{{ route('cards.edit', [$card->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit" style="color: #6c6d77"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' =>
                                    'btn
                                    btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection