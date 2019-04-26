<div class="form-group">
    <h3>{{ Form::label('txtEmail', 'Texto a ser enviado por e-mail:') }}</h3>
    {{ Form::textarea('ema_see_ds_email', null, ['class' => 'form-control', 'id' => 'txtEmail']) }}
    <div class="mt-3 float-right col-4">
        <button type="button" id="btnLimparTexto" class="btn btn-block btn-warning">Limpar</button>
    </div>
</div>
