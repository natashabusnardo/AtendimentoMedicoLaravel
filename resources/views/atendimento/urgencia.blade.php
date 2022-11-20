@extends('home')
@section('title', 'Lista de Urgências')
@section('content')
<div class="col-md-10 offset-md-1 dashboard-agendas-container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Paciente</th>
            <th scope="col">Medico</th>
            <th scope="col">CID10</th>
            <th scope="col">Descrição</th>
            <th scope="col">Gravidade</th>
            <th scope="col">Hora Chegada</th>
            <th scope="col">Hora Atendimento</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atendimentos as $atendimento)
                <tr>
                    <th scope="row">{{ $atendimento->id }}</th>
                    <td>{{ @App\Models\Paciente::find($atendimento->paciente_id)->nome }}</td>
                    <td>{{ @App\Models\Medico::find($atendimento->medico_id)->nome }}</td>
                    <td>{{ $atendimento->cid_id }}</td>
                    <td>{{ $atendimento->descricao }}</td>
                    <td>{{ $atendimento->gravidade }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($atendimento->created_at)) }}</td>
                    <td>{{ $atendimento->hora_atendimento }}</td>
                    <td class="text-end align-middle">
                        <a href="{{ route('atendimento.show', $atendimento->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('atendimento.atender', $atendimento->id) }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Realizar Atendimento</a>
                    <td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection