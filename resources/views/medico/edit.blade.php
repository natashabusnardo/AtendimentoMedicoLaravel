@extends('home')

@section('titulo', 'medico - edit')

    <form action="{{ route('medico.update', $medico->id) }}" method="post">
        @method('PATCH')
        @csrf
        @section('content')
        @component('medico.form', ['medico' => $medico])
        @endcomponent
    </form>
@endsection