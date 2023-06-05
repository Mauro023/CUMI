<!-- Item Field -->
<div class="col-sm-12">
    {!! Form::label('item', 'Item:') !!}
    <p>{{ $endowment->item }}</p>
</div>

<!-- Deliver Date Field -->
<div class="col-sm-12">
    {!! Form::label('deliver_date', 'Deliver Date:') !!}
    <p>{{ $endowment->deliver_date }}</p>
</div>

<!-- Employe Signature Field -->
<div class="col-sm-12">
    {!! Form::label('employe_signature', 'Employe Signature:') !!}
    <p>{{ $endowment->employe_signature }}</p>
</div>

<!-- Contract Id:unsigned:foreign,Contracts,Id Field -->
<div class="col-sm-12">
    {!! Form::label('contract_id:unsigned:foreign,contracts,id', 'Contract Id:unsigned:foreign,Contracts,Id:') !!}
    <p>{{ $endowment->contract_id:unsigned:foreign,contracts,id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $endowment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $endowment->updated_at }}</p>
</div>

