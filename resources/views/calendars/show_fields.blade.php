<!-- Workday Field -->
<div class="col-sm-12">
    {!! Form::label('workday', 'Workday:') !!}
    <p>{{ $calendar->workday }}</p>
</div>

<!-- Entry Time Field -->
<div class="col-sm-12">
    {!! Form::label('entry_time', 'Entry Time:') !!}
    <p>{{ $calendar->entry_time }}</p>
</div>

<!-- Departure Time Field -->
<div class="col-sm-12">
    {!! Form::label('departure_time', 'Departure Time:') !!}
    <p>{{ $calendar->departure_time }}</p>
</div>

<!-- Floor Field -->
<div class="col-sm-12">
    {!! Form::label('floor', 'Floor:') !!}
    <p>{{ $calendar->floor }}</p>
</div>

<!-- Id Employe Field -->
<div class="col-sm-12">
    {!! Form::label('id_employe', 'Id Employe:') !!}
    <p>{{ $calendar->id_employe }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $calendar->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $calendar->updated_at }}</p>
</div>
