@extends('home')

@section('titulo', $especialidade->nome)

@section('content')

    <div class="col-md-0 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-5">
                <label for="id"><ion-icon name="grid-outline"></ion-icon>ID: </label> {{ $especialidade->id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Nome: </label> {{ $especialidade->nome }} <br>
                <br><br>
                <a href="{{ route('especialidade.index') }}" class="btn btn-primary">Voltar </a>
                <a href="{{ route('especialidade.edit', $especialidade->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
    
@endsection