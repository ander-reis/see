@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'see.store']) }}
    @include('see._form', ['materias' => $materias])
    {{ Form::close() }}
@endsection()
