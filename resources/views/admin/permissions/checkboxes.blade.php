<div class="d-grid gap-2 d-md-block">
    <button type="button" class="btn btn-primary btn-sm" id="select-all">Seleccionar Todos</button>
</div>
<br><br>
@foreach ($permissions as $per)
    <div class="col-sm-12">
    	<div class="m-b-10">
	        <label class="form-check form-switch">
	            <input name="permissions[]" type="checkbox" role="switch" value="{{ $per->name }}"  class="form-check-input"
	                {{ $model->permissions->contains($per->id)
	                    || collect( old('permissions') )->contains($per->name)
	                    ? 'checked':'' }}
	            >
	            <span class="form-check-label">{{ $per->display_name }}</span>
	        </label>
    	</div>
    </div>
@endforeach
@push('page_scripts')
    <script>
        $(document).ready(function() {
            let isAllSelected = false;
            $('#select-all').click(function(event) {
                event.preventDefault();
                if(isAllSelected) {
                    $('input[type="checkbox"]').prop('checked', false);
                    isAllSelected = false;
                } else {
                    $('input[type="checkbox"]').prop('checked', true);
                    isAllSelected = true;
                }
            });
        });
    </script>
@endpush