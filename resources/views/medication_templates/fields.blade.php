<!-- Template Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('template_name', 'Nombre de la plantilla:') !!}
    {!! Form::text('template_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Generic Namet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generic_namet', 'Nombre generico:') !!}
    {!! Form::text('generic_namet', null, ['class' => 'form-control']) !!}
</div>

<!-- Tradenamet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tradenamet', 'Nombre comercial:') !!}
    {!! Form::text('tradenamet', null, ['class' => 'form-control']) !!}
</div>

<!-- Concentrationt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concentrationt', 'Concentracion:') !!}
    {!! Form::text('concentrationt', null, ['class' => 'form-control']) !!}
</div>

<!-- Pharmaceutical Formt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pharmaceutical_formt', 'Forma farmaceutica:') !!}
    {!! Form::text('pharmaceutical_formt', null, ['class' => 'form-control']) !!}
</div>

<!-- Presentationt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('presentationt', 'Presentacion:') !!}
    {!! Form::text('presentationt', null, ['class' => 'form-control']) !!}
</div>

<div id="app" class="form-group col-sm-12">
    <template>
        <invima-register :data='@json($invimas ?? null)' :select='@json($invimasSelect ?? null)'></invima-register>
    </template>
</div>
<script src="{{ asset('js/app.js') }}"></script>



<!-- Received Amountt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('received_amountt', 'Cantidad recibida:') !!}
    {!! Form::number('received_amountt', null, ['class' => 'form-control']) !!}
</div>

<!-- Samplet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('samplet', 'Muestras:') !!}
    {!! Form::number('samplet', null, ['class' => 'form-control']) !!}
</div>

