<!-- Delivery Date Card Field -->
<div class="col-sm-12">
    {!! Form::label('delivery_date_card', 'Delivery Date Card:') !!}
    <p>{{ $card->delivery_date_card }}</p>
</div>

<!-- Signature Employe Card Field -->
<div class="col-sm-12">
    {!! Form::label('signature_employe_card', 'Signature Employe Card:') !!}
    <p>{{ $card->signature_employe_card }}</p>
</div>

<!-- Card Item Field -->
<div class="col-sm-12">
    {!! Form::label('card_item', 'Card Item:') !!}
    <p>{{ $card->card_item }}</p>
</div>

<!-- Employe Id Field -->
<div class="col-sm-12">
    {!! Form::label('employe_id', 'Employe Id:') !!}
    <p>{{ $card->employe_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $card->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $card->updated_at }}</p>
</div>

