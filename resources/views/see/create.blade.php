@extends('layouts.app')

@section('content')
    {{-- ************** formulario tabs ************** --}}
    {{ Form::open(['route' => 'see.store']) }}
    @include('see._form', ['enviarCopia' => $enviarCopia, 'observacoes' => $observacoes])

    {{-- ************** component modal materias ************** --}}
    @include('modal-components.modal-materias', ['materias' => $materias])
    {{ Form::close() }}

    {{-- ************** component modal enviar teste ************** --}}
    @include('modal-components.modal-email-teste')

    {{-- ************** component modal cancelar envio ************** --}}
    @include('modal-components.modal-cancelar-envio')
@endsection()
