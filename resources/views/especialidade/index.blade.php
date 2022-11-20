@extends('home')
@section('title', 'Especialidade Index')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um especialidade</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div class="col-md-10 offset-md-1 dashboard-agendas-container">
    <p>Confira nossos especialidades</p>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $especialidade)
                <tr>
                    <th scope="row">{{ $especialidade->id }}</th>
                    <td>{{ $especialidade->nome }}</td>
                    <td class="text-end align-middle">
                        <a href="{{ route('especialidade.show', $especialidade->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('especialidade.edit', $especialidade->id) }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <form action="{{ route('especialidade.destroy', $especialidade->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" onclick=" return confirm('Deseja remover essa especialidade?');"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    <td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection