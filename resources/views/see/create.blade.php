@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'see.store']) }}
    @include('see._form')
    {{ Form::close() }}
@endsection()
