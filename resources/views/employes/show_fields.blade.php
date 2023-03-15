<!-- Employe Id Field -->
<div class="col-sm-12">
    {!! Form::label('employe_id', 'Identificacion:') !!}
    <p>{{ $employe->employe_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $employe->name }}</p>
</div>

<!-- Work Position Field -->
<div class="col-sm-12">
    {!! Form::label('work_position', 'Cargo:') !!}
    <p>{{ $employe->work_position }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Fecha de creacion:') !!}
    <p>{{ $employe->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Fecha de modificacion:') !!}
    <p>{{ $employe->updated_at }}</p>
</div>

