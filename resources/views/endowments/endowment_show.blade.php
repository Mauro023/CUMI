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
            <strong>Dotacion entregada</strong>
            @can('create_endowments')
            <a class="float-right btn btn-default" href="{{ route('endowments.create') }}">
                <span class="fas fa-user-plus" style="color: #69C5A0"></span>
            </a>
            @endcan
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="endowments-table">
                    <thead>
                        <tr>
                            <th>Empleado</th>
                            <th>Dotacion</th>
                            <th>Periodo de entrega</th>
                            <th>Firma del empleado</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($endowments as $endowment)
                        <tr>
                            <td>{{ $endowment->contract_id ? $endowment->contracts->employe->name : 'SIN ID'}}</td>
                            <td>
                                @php
                                $items = json_decode($endowment->item);
                                if (is_array($items)) {
                                echo implode(', ', $items);
                                } else {
                                echo $items;
                                }
                                @endphp
                            </td>
                            <td>
                                <strong style="color: #69C5A0">{{ $endowment->period }}</strong>
                                <br>
                                <small>{{ $endowment->deliver_date->format('Y-m-d') }}</small>
                            </td>
                            <td><img src="{{ $endowment->employe_signature }}" alt="Firma del empleado"></td>
                            <td width="120">
                                {!! Form::open(['route' => ['endowments.destroy', $endowment->id], 'method' =>
                                'delete']) !!}
                                <div class='btn-group'>
                                    @can('show_endowments')
                                    <a href="{{ route('endowments.show', [$endowment->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-eye" style="color: #13A4DA"></i>
                                    </a>
                                    @endcan
                                    @can('update_endowments')
                                    <a href="{{ route('endowments.edit', [$endowment->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-edit" style="color: #6c6d77"></i>
                                    </a>
                                    @endcan
                                    @can('destroy_endowments')
                                    {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type'
                                    => 'submit', 'class' => 'btn
                                    btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    @endcan
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