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
    {!! Form::select('work_position', 
        [
            'Analista  de datos'  => 'Analista  de datos',
            'Arquitecto' => 'Arquitecto',
            'Asistente contable' => 'Asistente contable',
            'Asistente contable torre 2' => 'Asistente contable torre 2',
            'Auditor Médico' => 'Auditor Médico',
            'Auxiliar administrativo general' => 'Auxiliar administrativo general',
            'Auxiliar biomedico' => 'Auxiliar biomedico',
            'Auxiliar calidad' => 'Auxiliar calidad',
            'Auxiliar clinico' => 'Auxiliar clinico',
            'Auxiliar compras' => 'Auxiliar compras',
            'Auxiliar de admisiones' => 'Auxiliar de admisiones',
            'Auxiliar de autorizacion' => 'Auxiliar de autorizacion',
            'Auxiliar de cuentas médicas' => 'Auxiliar de cuentas médicas',
            'Auxiliar de enfermeria' => 'Auxiliar de enfermeria',
            'Auxiliar de Facturación' => 'Auxiliar de Facturación',
            'Auxiliar de farmacia' => 'Auxiliar de farmacia',
            'Auxiliar de gestion documental' => 'Auxiliar de gestion documental',
            'Auxiliar de gestión quirúrgica' => 'Auxiliar de gestión quirúrgica',
            'Auxiliar de mantenimiento' => 'Auxiliar de mantenimiento',
            'Auxiliar de radicacion' => 'Auxiliar de radicacion',
            'Auxiliar de ropa hospitalaria' => 'Auxiliar de ropa hospitalaria',
            'Auxiliar de servicios generales' => 'Auxiliar de servicios generales',
            'Auxiliar de sistemas' => 'Auxiliar de sistemas',
            'Auxiliar talento humano' => 'Auxiliar talento humano',
            'Comunicadora organizacional' => 'Comunicadora organizacional',
            'Contadora' => 'Contadora',
            'Contratación' => 'Contratación',
            'Convenios especiales' => 'Convenios especiales',
            'Coordinación de UCI' => 'Coordinación de UCI',
            'Coordinacion imagenes' => 'Coordinacion imagenes',
            'Coordinador de servicio farmaceutico' => 'Coordinador de servicio farmaceutico',
            'Coordinador de sistemas' => 'Coordinador de sistemas',
            'Coordinadora de calidad' => 'Coordinadora de calidad',
            'Coordinadora de cirugia' => 'Coordinadora de cirugia',
            'Coordinadora de consulta externa' => 'Coordinadora de consulta externa',
            'Coordinadora de facturacion' => 'Coordinadora de facturacion',
            'Coordinadora de hospitalizacion' => 'Coordinadora de hospitalizacion',
            'Coordinadora general de enfermeria' => 'Coordinadora general de enfermeria',
            'Coordinadora urgencias' => 'Coordinadora urgencias',
            'Enfermera auditor cuentas medicas' => 'Enfermera auditor cuentas medicas',
            'Fisioterapeuta' => 'Fisioterapeuta',
            'Gestion riesgo y control interno' => 'Gestion riesgo y control interno',
            'Gestor quirurgico' => 'Gestor quirurgico',
            'Ingeniera de procesos cirugia' => 'Ingeniera de procesos cirugia',
            'Ingeniero biomedico' => 'Ingeniero biomedico',
            'Ingeniero de procesos' => 'Ingeniero de procesos',
            'Ingeniero de soporte' => 'Ingeniero de soporte',
            'Instrumentadora quirurgica' => 'Instrumentadora quirurgica',
            'Jefe de enfermeria' => 'Jefe de enfermeria',
            'Líder de central de esterilización' => 'Líder de central de esterilización',
            'Lider de enfermeria hospitalizacion' => 'Lider de enfermeria hospitalizacion',
            'Líder de fisioterapia' => 'Líder de fisioterapia',
            'Lider enfermeria urgencias' => 'Lider enfermeria urgencias',
            'Logistica' => 'Logistica',
            'Medico' => 'Medico',
            'Nutricionista' => 'Nutricionista',
            'Orientador' => 'Orientador',
            'Profesional Cartera' => 'Profesional Cartera',
            'Profesional de compras' => 'Profesional de compras',
            'Profesional de costos y presupuestos' => 'Profesional de costos y presupuestos',
            'Profesional de nomina' => 'Profesional de nomina',
            'Programacion de cirugia' => 'Programacion de cirugia',
            'Psicologa clinica' => 'Psicologa clinica',
            'Psicologa organizacional' => 'Psicologa organizacional',
            'Quimico farmaceutico' => 'Quimico farmaceutico',
            'Referencia' => 'Referencia',
            'Referente seguridad del paciente' => 'Referente seguridad del paciente',
            'Regente de farmacia' => 'Regente de farmacia',
            'SST' => 'SST',
            'Supervisor de mantenimiento aire acondicionado' => 'Supervisor de mantenimiento aire acondicionado',
            'Tecnico electricista' => 'Tecnico electricista',
            'Tecnico en imagenes diagnosticas' => 'Tecnico en imagenes diagnosticas',
            'Tecnico en refrigeracion' => 'Tecnico en refrigeracion',
            'Tecnologa en imagenes diagnosticas' => 'Tecnologa en imagenes diagnosticas',
            'Tesoreria' => 'Tesoreria',
            'Transcriptora' => 'Transcriptora'
        ], null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione el cargo']) !!}
</div>

<!-- Unit Field -->
<div class="form-group col-sm-5">
    {!! Form::label('unit', 'Unidad:') !!}
    {!! Form::select('unit', 
        [
            'Administrativo' => 'Administrativo', 
            'Administrativo asistencial' => 'Administrativo asistencial', 
            'Asistencial' => 'Asistencial',
            'Deshabilitado' => 'Deshabilitado'
        ], null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione la unidad']) !!}
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