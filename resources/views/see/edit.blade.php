@extends('layouts.app')

@section('content')
    {{-- ************** formulario tabs ************** --}}
    {{ Form::model($model, ['route' => ['see.update', $model->ema_see_cd_observacao], 'method' => 'PUT']) }}

    @component('tab-components.tab-two', ['enviarCopia' => $enviarCopia, 'selectOption' => $selectOption, 'model' => $model])@endcomponent
    @component('tab-components.tab-one')@endcomponent

    <div class="text-right">
        <button type="submit" class="btn btn-primary btn-lg">Editar</button>
    </div>

    {{-- ************** component modal materias ************** --}}
    @include('modal-components.modal-materias', ['materias' => $materias])
    {{ Form::close() }}
@endsection()
