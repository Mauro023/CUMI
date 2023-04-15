<!-- Employe Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('dni', 'Identificacion:') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-5">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Work Position Field -->
<div class="form-group col-sm-5">
    {!! Form::label('work_position', 'Cargo:') !!}
    {!! Form::text('work_position', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Field -->
<div class="form-group col-sm-5">
    {!! Form::label('unit', 'Unidad:') !!}
    {!! Form::select('unit', ['Administrativo' => 'Administrativo', 'Asistencial' => 'Asistencial'], null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Cost center Field -->
<div class="form-group col-sm-5">
    {!! Form::label('cost_center', 'Centro de costo:') !!}
    {!! Form::select('cost_center', 
        [
            'Piso 1' => 'Piso 1', 
            'Piso 2' => 'Piso 2', 
            'Piso 3' => 'Piso 3',
            'Piso 4' => 'Piso 4',
            'Piso 5' => 'Piso 5',
            'Piso 6' => 'Piso 6',
            'Piso 7' => 'Piso 7',
            'Piso 8' => 'Piso 8',
            'Piso 9' => 'Piso 9',
            'Piso 10' => 'Piso 10',
            'Piso 11' => 'Piso 11'
        ], null, ['class' => 'form-control custom-select']) !!}
</div>