@extends('home')

@section('titulo', 'atendimento - edit')

    <form action="{{ route('atendimento.update', $atendimento->id) }}" method="post">
        @method('PATCH')
        @csrf
        @section('content')
        @component('atendimento.form', ['atendimento' => $atendimento])
        @endcomponent
    </form>
@endsection