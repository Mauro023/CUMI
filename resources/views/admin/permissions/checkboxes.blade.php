<a href="#" id="select-all">Seleccionar Todos</a>
@foreach ($permissions as $per)
    <div class="col-sm-12">
    	<div class="m-b-10">
	        <label class="custom-control custom-checkbox">
	            <input name="permissions[]" type="checkbox" value="{{ $per->name }}"  class="custom-control-input"
	                {{ $model->permissions->contains($per->id)
	                    || collect( old('permissions') )->contains($per->name)
	                    ? 'checked':'' }}
	            >
	            <span class="custom-control-label">{{ $per->display_name }}</span>
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