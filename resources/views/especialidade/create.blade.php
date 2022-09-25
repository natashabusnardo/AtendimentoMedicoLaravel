@extends('especialidade.nav')
@section('title', 'especialidade create')

    <form action="{{ route('especialidade.store') }}" method="POST">
        @method('POST')
        @csrf
        @component('especialidade.form')
        @section('content')
        @endcomponent
    </form>
@endsection