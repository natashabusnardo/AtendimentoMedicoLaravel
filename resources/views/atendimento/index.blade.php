@extends('atendimento.nav')
@section('title', 'atendimento Index')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um atendimento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div class="col-md-10 offset-md-1 dashboard-agendas-container">
    <p>Confira nossos atendimentos</p>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atendimentos as $atendimento)
                <tr>
                    <th scope="row">{{ $atendimento->id }}</th>
                    <td>{{ $atendimento->nome }}</td>
                    <td class="text-end align-middle">
                        <a href="{{ route('atendimento.show', $atendimento->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('atendimento.edit', $atendimento->id) }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <form action="{{ route('atendimento.destroy', $atendimento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" onclick=" return confirm('Deseja remover essa atendimento?');"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    <td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection