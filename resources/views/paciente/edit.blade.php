@extends('paciente.nav')

@section('titulo', 'paciente - edit')

    <form action="{{ route('paciente.update', $paciente->id) }}" method="post">
        @method('PATCH')
        @csrf
        @section('content')
        @component('paciente.form', ['paciente' => $paciente, 'endereco' => $endereco])
        @endcomponent
    </form>
@endsection