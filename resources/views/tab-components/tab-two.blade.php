@component('form-components._form_group', ['field' => 'ema_see_ds_tipo'])
    {{ Form::label('lblIpo', 'Tipo de Envio:', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('ema_see_ds_tipo') ? ' text-danger' : ''}}">
        @isset($model)
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('ema_see_ds_tipo', 'Diversos', ($model->ema_see_ds_tipo == 'Diversos') ? true : false, ['class' => 'custom-control-input', 'id' => 'optDiversos']) }}
                {{ Form::label('optDiversos', 'Diversos', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('ema_see_ds_tipo', 'Boletim', ($model->ema_see_ds_tipo == 'Boletim') ? true : false, ['class' => 'custom-control-input', 'id' => 'optBoletim']) }}
                {{ Form::label('optBoletim', 'Boletim', ['class' => 'custom-control-label']) }}
            </div>
        @else
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('ema_see_ds_tipo', 'Diversos', true, ['class' => 'custom-control-input', 'id' => 'optDiversos']) }}
                {{ Form::label('optDiversos', 'Diversos', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('ema_see_ds_tipo', 'Boletim', false, ['class' => 'custom-control-input', 'id' => 'optBoletim']) }}
                {{ Form::label('optBoletim', 'Boletim', ['class' => 'custom-control-label']) }}
            </div>
        @endisset
    </div>
@endcomponent

<hr>

<div class="row">
    @component('form-components._form_group_inline', ['field' => 'ema_see_ds_de'])
        {{ Form::label('txtDe', 'E-mail de Envio:', ['class' => 'control-label']) }}
        {{ Form::text('ema_see_ds_de', isset($model->ema_see_ds_de) ? $model->ema_see_ds_de : 'boletim@sinprosp.org.br', ['class' => 'form-control', 'id' => 'txtDe']) }}
    @endcomponent

    @component('form-components._form_group_inline', ['field' => 'ema_see_ds_exibir'])
        {{ Form::label('txtExibir', 'Exibir Como:', ['class' => 'control-label']) }}
        {{ Form::text('ema_see_ds_exibir', isset($model->ema_see_ds_exibir) ? $model->ema_see_ds_exibir : 'SinproSP', ['class' => 'form-control', 'id' => 'txtExibir']) }}
    @endcomponent

    @component('form-components._form_group_inline', ['field' => 'ema_see_ds_assunto'])
        {{ Form::label('txtAssunto', 'Assunto do E-mail:', ['class' => 'control-label']) }}
        {{ Form::text('ema_see_ds_assunto', isset($model->ema_see_ds_assunto) ? $model->ema_see_ds_assunto : 'Boletim do SinproSP', ['class' => 'form-control', 'id' => 'txtAssunto']) }}
    @endcomponent
</div>

<hr>

{{ Form::label('lblCopia', 'Enviar cópia para:', ['class' => 'control-label']) }}
<div class="row col">
    @foreach($enviarCopia as $name => $key)
        @component('form-components._checkbox', ['field' => $key['id']])
            @slot('class')
                col-4
            @endslot
            {{ Form::checkbox('ema_see_ds_copia[]', $name, $key['option'], ['class' => 'custom-control-input', 'id' => $key['id']]) }}
            {{ Form::label($key['id'], $name, ['class' => 'custom-control-label', 'for' => $key['id']]) }}
        @endcomponent
    @endforeach
</div>

<hr>

<div class="row">
    @component('form-components._form_has_error', ['field' => 'ema_see_ds_para'])
        {{ Form::label('lblPara', 'Enviar Para', ['class' => 'form-group']) }}
        {{ Form::select('ema_see_ds_para[]', $selectOption, (isset($model->ema_see_ds_para)) ? $model->ema_see_ds_para : null, ['id' => 'lblPara', 'class' => 'custom-select', 'multiple']) }}
    @endcomponent

    <div class="col-8">
        <div class="form-group">
            {{ Form::label('txtParaLista', 'Enviar para: separar os e-mails com vírgula(,) ou ponto e vírgula(;)', ['class' => 'form-group']) }}
            {{ Form::textarea('ema_see_ds_lista', null, ['class' => 'form-control', 'rows' => '4', 'id' => 'txtParaLista']) }}
        </div>
    </div>
</div>

<hr>

{{--slot burttons--}}
{{ $slot }}
