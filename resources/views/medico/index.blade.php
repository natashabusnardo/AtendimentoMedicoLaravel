@extends('home')
@section('title', 'medico Index')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um medico</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div class="col-md-10 offset-md-1 dashboard-agendas-container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">CRM</th>
            <th scope="col">Disponível</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
                <tr>
                    <th scope="row">{{ $medico->id }}</th>
                    <td>{{ $medico->nome }}</td>
                    <td>{{ $medico->crm }}</td>
                    <td>{{ $medico->disponivel }}</td>
                    <td class="text-end align-middle">
                        <a href="{{ route('medico.show', $medico->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('medico.edit', $medico->id) }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <form action="{{ route('medico.destroy', $medico->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" onclick=" return confirm('Deseja remover essa medico?');"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    <td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
{{@$medicos->links()}}
@endsection