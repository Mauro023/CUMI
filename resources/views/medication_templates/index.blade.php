@extends('layouts.app')

@section('content')
    <section class="content-header">
        
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0"><strong>Plantillas</strong></h3>
                <div class="ml-auto d-flex align-items-center gap-2">
                    @can('create_employes')
                    <a href="{{ route('medicationTemplates.create') }}" class="btn btn-default">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan           
                </div>
            </div>
            <div class="card-body p-0">
                @include('medication_templates.table')
            </div>

        </div>
    </div>

@endsection

