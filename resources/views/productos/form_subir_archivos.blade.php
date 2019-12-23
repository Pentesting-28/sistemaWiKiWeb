<div class="form-control-file">

    {{-- Form::label('file') --}}
    {{ Form::file('file') }}
    {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-sm']) }}

</div>