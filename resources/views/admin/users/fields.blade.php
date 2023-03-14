<div class="form-group col-md-6 m-t-20 {{ $errors->has('name') ? ' is-invalid' : '' }}">
    {!! Form::text('name',  old('email'), ['class' => 'form-control form-control-line', 'placeholder'=> 'Nombre']) !!}
    @if ($errors->has('name'))
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>

<div class="form-group col-md-12 m-t-20 {{ $errors->has('email') ? ' is-invalid' : '' }}">
    {!! Form::email('email', old('email'), ['class' => 'form-control form-control-line', 'placeholder'=> 'Correo']) !!}
    @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-md-6 m-t-20 {{ $errors->has('password') ? ' is-invalid' : '' }}">
    {!! Form::password('password', ['class' => 'form-control form-control-line', 'placeholder'=> 'Contraseña']) !!}
    @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-md-6 m-t-20 {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
    {!! Form::password('password_confirmation', ['class' => 'form-control form-control-line', 'placeholder'=> 'Confirme la contraseña']) !!}
    @if ($errors->has('password_confirmation'))
        <div class="invalid-feedback">
            {{ $errors->first('password_confirmation') }}
        </div>
    @endif
</div>





@push('css')
    <link href="/css/pages/file-upload.css" rel="stylesheet">
@endpush
@push('scripts')
     <script src="/js/jasny-bootstrap.js"></script>
    <script src="/plugins/styleswitcher/jQuery.style.switcher.js"></script>

@endpush