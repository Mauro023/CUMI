<!-- Workday Field -->
<div class="col-sm-12">
    {!! Form::label('workday', 'Workday:') !!}
    <p>{{ $attendance->workday }}</p>
</div>

<!-- Entry Time Field -->
<div class="col-sm-12">
    {!! Form::label('aentry_time', 'Entry Time:') !!}
    <p>{{ $attendance->aentry_time }}</p>
</div>

<!-- Departure Time Field -->
<div class="col-sm-12">
    {!! Form::label('adeparture_time', 'Departure Time:') !!}
    <p>{{ $attendance->adeparture_time }}</p>
</div>

<!-- Id Employe Field -->
<div class="col-sm-12">
    {!! Form::label('employe_id', 'Id Employe:') !!}
    <p>{{ $attendance->employe_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $attendance->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $attendance->updated_at }}</p>
</div>

