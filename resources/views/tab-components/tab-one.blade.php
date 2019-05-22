<div class="form-group">
    <h3>{{ Form::label('txtEmail', 'Texto a ser enviado por e-mail:') }}</h3>
    {{ Form::textarea('ema_see_ds_email', old('ema_see_ds_email'), ['class' => 'form-control', 'id' => 'txtEmail']) }}
    {{ $slot }}
</div>
