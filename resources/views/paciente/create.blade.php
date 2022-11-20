@extends('home')
@section('title', 'paciente create')

    <form action="{{ route('paciente.store') }}" method="POST">
        @method('POST')
        @csrf
        @component('paciente.form')
        @section('content')
        @endcomponent
    </form>
@endsection