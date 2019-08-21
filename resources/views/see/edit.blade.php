@extends('layouts.app')

@section('content')
    {{-- ************** formulario tabs ************** --}}
    {{ Form::model($model, ['route' => ['see.update', $model->ema_see_cd_observacao], 'method' => 'PUT']) }}

    @component('tab-components.tab-two', ['enviarCopia' => $enviarCopia, 'selectOption' => $selectOption, 'model' => $model])@endcomponent
    @component('tab-components.tab-one')@endcomponent

    <div class="row">
        <div class="col-6">
            <div class="text-left">
                    <a href="{{  route('voltar') }}"
                            class="btn btn-outline-primary btn-lg">Voltar</a>
            </div>
        </div>
        @if($model->ema_see_fl_status == 0)
            <div class="col-6" >
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                </div>
            </div>
        @endif
    </div>

    {{-- ************** component modal materias ************** --}}
    @include('modal-components.modal-materias', ['materias' => $materias])
    {{ Form::close() }}
@endsection()
