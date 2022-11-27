@extends('home')
@section('title', 'atendimento Index')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um atendimento</h1>
    <form action="">
        <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Procurar um atendimento">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
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
                    @if($atendimento->hora_atendimento == null)
                        <td>Não atendido</td>
                    @else
                        <td>{{ date('d/m/Y H:i', strtotime($atendimento->hora_atendimento)) }}</td>
                    @endif
                    <td class="text-end align-middle">
                        <a href="{{ route('atendimento.show', $atendimento->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('atendimento.edit', $atendimento->id) }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                    <td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
{{@$atendimentos->links()}}
@endsection