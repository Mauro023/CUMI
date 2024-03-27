@extends('layouts.app')
@section('content')

<div id="app">
    <cost-menu 
    :labour-Route='{{ json_encode(route('labours.index')) }}' 
    :procedures-Route='{{ json_encode(route('procedures.index')) }}'
    :articles-Route='{{ json_encode(route('articles.index')) }}'
    :basket-Route='{{ json_encode(route('baskets.index')) }}'
    :consumable-Route='{{ json_encode(route('consumables.index')) }}'
    :Rate-Route='{{ json_encode(route('diferentialRates.index')) }}'
    :Fees-Route='{{ json_encode(route('medicalFees.index')) }}'
    :doctors-Route='{{ json_encode(route('doctors.index')) }}'
    :surgeries-Route='{{ json_encode(route('surgeries.index')) }}'
    :unit-Route='{{ json_encode(route('unitCosts.index')) }}'
    :general-Route='{{ json_encode(route('generalCosts.index')) }}'
    :soat-Route='{{ json_encode(route('soatGroups.index')) }}'
    :msurgery-Route='{{ json_encode(route('msurgeryProcedures.index')) }}'
    :log-Route='{{ json_encode(route('logOperationCosts.index')) }}'
    :rented-Route='{{ json_encode(route('rentedEquipments.index')) }}'
    ></cost-menu>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@endsection