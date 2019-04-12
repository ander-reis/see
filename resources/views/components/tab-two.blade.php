
@component('form-components._form_group',['field' => 'fl_oculta'])
    {{ Form::label('lblIpo', 'Tipo de Envio:', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('optDiversos') ? ' text-danger' : ''}}">
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('optTipo', 'diversos', true, ['class' => 'custom-control-input', 'id' => 'optTipo']) }}
            {{ Form::label('optTipo', 'Diversos', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('optTipo', 'boletim', false, ['class' => 'custom-control-input', 'id' => 'optBoletim']) }}
            {{ Form::label('optBoletim', 'Boletim', ['class' => 'custom-control-label']) }}
        </div>
    </div>

    <hr>

    <div class="row">
        @component('form-components._form_group_inline', ['field' => 'dt_cadastro'])
            {{ Form::label('txtDe', 'E-mail de Envio:', ['class' => 'control-label']) }}
            {{ Form::text('txtDe', null, ['class' => 'form-control']) }}
        @endcomponent

        @component('form-components._form_group_inline', ['field' => 'dt_cadastro'])
            {{ Form::label('txtDe', 'E-mail de Envio:', ['class' => 'control-label']) }}
            {{ Form::text('txtDe', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>


    <div class="row">
        <div class="col-4">
            <button type="button" class="btn btn-block btn-outline-secondary">Enviar Teste</button>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-block btn-primary">Agendar Envio</button>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-block btn-warning">Limpar</button>
        </div>
    </div>
@endcomponent
