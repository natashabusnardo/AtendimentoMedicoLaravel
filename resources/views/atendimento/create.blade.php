@extends('atendimento.nav')
@section('title', 'atendimento create')

    <form action="{{ route('atendimento.store') }}" method="POST">
        @method('POST')
        @csrf
        @component('atendimento.form')
        @section('content')
        @endcomponent
    </form>
@endsection