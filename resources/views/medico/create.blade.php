@extends('home')
@section('title', 'medico create')

    <form action="{{ route('medico.store') }}" method="POST">
        @method('POST')
        @csrf
        @component('medico.form')
        @section('content')
        @endcomponent
    </form>
@endsection