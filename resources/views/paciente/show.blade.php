@extends('paciente.nav')

@section('titulo', $paciente->nome)

@section('content')

    <div class="col-md-0 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-5">
                <label for="id"><ion-icon name="grid-outline"></ion-icon>ID: </label> {{ $paciente->id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Nome: </label> {{ $paciente->nome }} <br>
                <label for="cpf"><ion-icon name="people-outline"></ion-icon>CPF: </label> {{ $paciente->cpf }} <br>
                <label for="telefone"><ion-icon name="people-outline"></ion-icon>Telefone: </label> {{ $paciente->telefone }} <br>
                <label for="email"><ion-icon name="people-outline"></ion-icon>email: </label> {{ $paciente->email }} <br>
                <br><br>
                <a href="{{ route('paciente.index') }}" class="btn btn-primary">Voltar </a>
                <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
    
@endsection