@extends('layouts.app')

@section('content')
<section class="content-header">

</section>
<div class="content px-3">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: white; padding: 0 0;">
                <h4 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Lista de asistencias</strong></h4>
                <div class="ml-auto">
                    @can('create_attendances')
                    <a href="{{ route('attendances.create') }}" class="btn btn-default">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">
                @include('attendances.table')
            </div>
        </div>
    </div>
</div>
@endsection
@push('page_scripts')
<script type="text/javascript">
    $('#start_date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })

    $('#end_date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })
</script>
@endpush