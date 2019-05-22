@component('form-components._modal', ['title' => 'Matérias', 'idModal' => 'modalMaterias', 'modalSize' => 'modal-xl'])
    <div class="row m-1" id="boxMaterias">
        @foreach($materias as $materia)
            @component('form-components._checkbox')
                @slot('class')
                    col-4
                @endslot
                {{ Form::checkbox('ema_see_ds_materia[]', $materia->Materia, (isset($materia->option)) ? $materia->option : false, ['class' => 'custom-control-input', 'id' => "materia-{$materia->Codigo_Materia}"]) }}
                {{ Form::label("materia-{$materia->Codigo_Materia}", $materia->Materia, ['class' => 'custom-control-label']) }}
            @endcomponent
        @endforeach
    </div>
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    @endslot
@endcomponent
