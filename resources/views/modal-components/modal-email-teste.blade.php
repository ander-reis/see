@component('form-components._modal', ['title' => 'Envio de Teste do Email', 'idModal' => 'emailTeste', 'modalSize' => 'modal-lg'])
    @component('form-components._form_group_inline', ['field' => 'ema_see_email_test'])
        {{ Form::label('teste_see_ds_email_teste', 'Informe o E-mail para o Envio do Teste:', ['class' => 'control-label']) }}
        {{ Form::text('teste_see_ds_email_teste', null, ['class' => 'form-control', 'id' => 'txtEmailTeste']) }}
    @endcomponent
    {{ Form::hidden('teste_see_ds_email') }}
    {{ Form::hidden('teste_see_ds_de') }}
    @slot('footer')
        <button type="button" id="enviarEmailTeste" class="btn btn-secondary">Enviar</button>
    @endslot
@endcomponent
