@extends('home')
@section('title', 'paciente Index')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um paciente</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div class="col-md-10 offset-md-1 dashboard-agendas-container">
    <p>Confira nossos pacientes</p>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <th scope="row">{{ $paciente->id }}</th>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ $paciente->cpf }}</td>
                    <td>{{ $paciente->telefone }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</td>
                    <td class="text-end align-middle">
                        <a href="{{ route('paciente.show', $paciente->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <form action="{{ route('paciente.destroy', $paciente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" onclick=" return confirm('Deseja remover essa paciente?');"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    <td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection