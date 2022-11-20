@extends('home')

@section('titulo', 'especialidade - edit')

    <form action="{{ route('especialidade.update', $especialidade->id) }}" method="post">
        @method('PATCH')
        @csrf
        @section('content')
        @component('especialidade.form', ['especialidade' => $especialidade])
        @endcomponent
    </form>
@endsection