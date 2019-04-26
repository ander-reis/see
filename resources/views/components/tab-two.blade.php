@component('form-components._form_group', ['field' => 'ema_see_ds_tipo'])
    {{ Form::label('lblIpo', 'Tipo de Envio:', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('ema_see_ds_tipo') ? ' text-danger' : ''}}">
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('ema_see_ds_tipo', 'diversos', true, ['class' => 'custom-control-input', 'id' => 'optDiversos']) }}
            {{ Form::label('optDiversos', 'Diversos', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('ema_see_ds_tipo', 'boletim', false, ['class' => 'custom-control-input', 'id' => 'optBoletim']) }}
            {{ Form::label('optBoletim', 'Boletim', ['class' => 'custom-control-label']) }}
        </div>
    </div>
@endcomponent

<hr>

<div class="row">
    @component('form-components._form_group_inline', ['field' => 'ema_see_ds_de'])
        {{ Form::label('txtDe', 'E-mail de Envio:', ['class' => 'control-label']) }}
        {{ Form::text('ema_see_ds_de', 'boletim@sinpro.org.br', ['class' => 'form-control', 'id' => 'txtDe']) }}
    @endcomponent

    @component('form-components._form_group_inline', ['field' => 'ema_see_ds_exibir'])
        {{ Form::label('txtExibir', 'Exibir Como:', ['class' => 'control-label']) }}
        {{ Form::text('ema_see_ds_exibir', 'SinproSP', ['class' => 'form-control', 'id' => 'txtExibir']) }}
    @endcomponent

    @component('form-components._form_group_inline', ['field' => 'ema_see_ds_assunto'])
        {{ Form::label('txtAssunto', 'Assunto do E-mail:', ['class' => 'control-label']) }}
        {{ Form::text('ema_see_ds_assunto', 'Boletim do SinproSP', ['class' => 'form-control', 'id' => 'txtAssunto']) }}
    @endcomponent
</div>

<hr>

{{ Form::label('lblCopia', 'Enviar cópia para:', ['class' => 'control-label']) }}
<div class="row col">
    @component('form-components._checkbox')
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox('ema_see_ds_copia[]', 'Luiz Antônio Barbagli', false, ['class' => 'custom-control-input teste', 'id' => 'labarbagli']) }}
        {{ Form::label('labarbagli', 'Luiz Antônio Barbagli', ['class' => 'custom-control-label', 'for' => 'labarbagli']) }}
    @endcomponent

    @component('form-components._checkbox', ['field' => 'acarlos'])
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox('ema_see_ds_copia[]', 'Antônio Carlos', false, ['class' => 'custom-control-input', 'id' => 'acarlos']) }}
        {{ Form::label('acarlos', 'Antônio Carlos', ['class' => 'custom-control-label', 'for' => 'acarlos']) }}
    @endcomponent

    @component('form-components._checkbox', ['field' => 'silvia'])
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox(null, 'Silvia Celeste Barbará', false, ['class' => 'custom-control-input', 'id' => 'silvia']) }}
        {{ Form::label('silvia', 'Silvia Celeste Barbará', ['class' => 'custom-control-label', 'for' => 'silvia']) }}
    @endcomponent

    @component('form-components._checkbox', ['field' => 'sofia'])
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox('ema_see_ds_copia[]', 'Maria Sofia Cesar de Aragão', false, ['class' => 'custom-control-input', 'id' => 'sofia']) }}
        {{ Form::label('sofia', 'Maria Sofia Cesar de Aragão', ['class' => 'custom-control-label', 'for' => 'sofia']) }}
    @endcomponent

    @component('form-components._checkbox', ['field' => 'ailton'])
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox('ema_see_ds_copia[]', 'Ailton Fernandes', false, ['class' => 'custom-control-input', 'id' => 'ailton']) }}
        {{ Form::label('ailton', 'Ailton Fernandes', ['class' => 'custom-control-label', 'for' => 'ailton']) }}
    @endcomponent

    @component('form-components._checkbox', ['field' => 'gabriela'])
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox('ema_see_ds_copia[]', 'Gabriela Bueno de Moura', false, ['class' => 'custom-control-input', 'id' => 'gabriela']) }}
        {{ Form::label('gabriela', 'Gabriela Bueno de Moura', ['class' => 'custom-control-label', 'for' => 'gabriela']) }}
    @endcomponent

    @component('form-components._checkbox', ['field' => 'diretoria'])
        @slot('class')
            col-4
        @endslot
        {{ Form::checkbox('ema_see_ds_copia[]', 'Diretoria SinproSP', false, ['class' => 'custom-control-input', 'id' => 'diretoria']) }}
        {{ Form::label('diretoria', 'Diretoria SinproSP', ['class' => 'custom-control-label', 'for' => 'diretoria']) }}
    @endcomponent
</div>

<hr>

<div class="row">
    <div class="col-4">
        @component('form-components._form_has_error', ['field' => 'ema_see_ds_para'])
            {{ Form::label('lblPara', 'Enviar para:', ['class' => 'form-group']) }}
            <select name="ema_see_ds_para[]" id="lblPara" class="custom-select" multiple>
                <option value="sesi">SESI</option>
                <option value="senai">SENAI</option>
                <option value="senac">SENAC</option>
                <option value="basico">B&aacute;sico</option>
                <option value="superior">Superior</option>
                <option value="escbasico">Escola - B&aacute;sico</option>
                <option value="escsuperior">Escola - Superior</option>
                <option data-toggle="modal" data-target="#materias" value="materia">Mat&eacute;ria</option>
                <option value="sql">SQL</option>
                <option value="tabela">E-mails na tabela</option>
            </select>
        @endcomponent
    </div>

    <div class="col-8">
        <div class="form-group">
            {{ Form::label('txtParaLista', 'Enviar para: separar os e-mails com vírgula(,) ou ponto e vírgula(;)', ['class' => 'form-group']) }}
            {{ Form::textarea('ema_see_ds_lista', null, ['class' => 'form-control', 'rows' => '4', 'id' => 'txtParaLista']) }}
        </div>
    </div>

</div>

<hr>

<div class="row">
    <div class="col-4">
        <button type="button" class="btn btn-block btn-outline-secondary">Enviar Teste</button>
    </div>
    <div class="col-4">
        <button type="submit" class="btn btn-block btn-primary">Agendar Envio</button>
    </div>
    <div class="col-4">
        <button type="button" id="btnLimparForm" class="btn btn-block btn-warning">Limpar</button>
    </div>
</div>
