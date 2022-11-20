@extends('home')

@section('titulo', $atendimento->nome)

@section('content')

    <div class="col-md-0 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-5">
                <label for="id"><ion-icon name="grid-outline"></ion-icon>ID: </label> {{ $atendimento->id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Paciente: </label> {{ $atendimento->paciente_id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Médico: </label> {{ $atendimento->medico_id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Hora chegada: </label> {{ $atendimento->created_at }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Hora saída: </label> {{ $atendimento->hora_atendimento }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>CID10: </label> {{ $atendimento->cid_id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Descrição: </label> {{ $atendimento->descricao }} <br>
                <br><br>
                <a href="{{ route('atendimento.index') }}" class="btn btn-primary">Voltar </a>
                <a href="{{ route('atendimento.edit', $atendimento->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
    
@endsection