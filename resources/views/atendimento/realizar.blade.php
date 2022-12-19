@extends('home')

@section('titulo', 'atendimento - edit')
    <form action="{{ route('atendimento.realizar', $atendimento->id) }}" method="post">
        @method('PATCH')
        @csrf
        @section('content')
        <div id="atendimento-form-container" class="col-md-6 offset-md-3">
            <div class="form-group">
                <input type="text" id="id" name="id" disabled value="{{ isset($atendimento->id) ? $atendimento->id : 0 }}" class="form-control" hidden>
                <br><br>
                <label for="paciente_id">Paciente: </label>
                <input id="paciente_id" name="paciente_id" value="{{ @App\Models\Paciente::find($atendimento->paciente_id)->nome }}" class="form-control" disabled>
                <br><br>
                <label for="medico_id">Médico: </label>
                <select class="form-select" id="medico_id" required name="medico_id">
                    <option value="" selected>Selecione um médico</option>
                        @php 
                        use App\Models\Medico;
                        $medicos = Medico::where('disponivel', 1)->get();
                        @endphp
                        @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}" {{ isset($medico) && $medico->medico == $medico->id ? 'selected' : '' }}>{{ $medico->nome }}</option>
                        @endforeach
                    </select>
                <br><br>
                <label>Gravidade: </label>
                @if ($atendimento->gravidade == 1)
                    <input type="text" id="gravidade" name="gravidade" value="Leve" class="form-control" readonly>
                @elseif ($atendimento->gravidade == 2)
                    <input type="text" id="gravidade" name="gravidade" value="Moderado" class="form-control" readonly>
                @elseif ($atendimento->gravidade == 3)
                    <input type="text" id="gravidade" name="gravidade" value="Grave" class="form-control" readonly>
                @endif
                <br><br>
                <label for="gravidade">Código CID10 doença: </label>
                <input type="text" id="cid_id" name="cid_id" value="{{ isset($atendimento['cid_id']) ? $atendimento['cid_id'] : '' }}" class="form-control" required>
                <br><br>
                <label for="gravidade">Descrição: </label>
                <input type="text" id="descricao" name="descricao" value="{{ isset($atendimento['descricao']) ? $atendimento['descricao'] : '' }}" class="form-control" required readonly>
                <br><br>
                <input type="submit" value="Salvar" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection