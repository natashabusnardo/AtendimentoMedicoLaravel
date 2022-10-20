@extends('medico.nav')

@section('titulo', $medico->nome)

@section('content')

    <div class="col-md-0 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-5">
                <label for="id"><ion-icon name="grid-outline"></ion-icon>ID: </label> {{ $medico->id }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>Nome: </label> {{ $medico->nome }} <br>
                <label for="nome"><ion-icon name="people-outline"></ion-icon>CRM: </label> {{ $medico->crm }} <br>
                <br><br>
                <a href="{{ route('medico.index') }}" class="btn btn-primary">Voltar </a>
                <a href="{{ route('medico.edit', $medico->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
    
@endsection