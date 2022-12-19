Atendimento
@section('content')

<div id="atendimento-form-container" class="col-md-6 offset-md-3">
    <div class="form-group">
        <input type="text" id="id" name="id" disabled value="{{ isset($atendimento->id) ? $atendimento->id : 0 }}" class="form-control" hidden>
        <br><br>
        <label for="paciente_id">Paciente: </label>
        <select class="form-select" id="paciente_id" required name="paciente_id">
            <option value="">Selecione um paciente</option>
                @php 
                use App\Models\Paciente;
                $pacientes = Paciente::all();
                @endphp
                @foreach ($pacientes as $paciente)
                <option value="{{ $paciente->id }}" {{ isset($paciente) && $paciente->paciente == $paciente->id ? 'selected' : '' }}>{{ $paciente->nome }}</option>
                @endforeach
            </select></div>
        <br><br>

        @if (isset($atendimento->id))
        <label for="medico_id">Médico: </label>´
        <select class="form-select" id="medico_id" required name="medico_id">
            <option value="" selected>Selecione um médico</option>
            @endif
                @php 
                use App\Models\Medico;
                $medicos = Medico::all();
                @endphp
                @foreach ($medicos as $medico)
                @if (isset($atendimento->id))
                <option value="{{ $medico->id }}" {{ isset($medico) && $medico->medico == $medico->id ? 'selected' : '' }}>{{ $medico->nome }}</option>
                @endif
                @endforeach
            </select></div>
        <br><br>
            <label for="">Gravidade: </label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="febre" name="febre">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Febre</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="dor" name="dor">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Dor de Cabeça</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="diarreia" name="diarreia">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Diarréia</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="nauseas" name="nauseas">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Náuseas</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="sangramento" name="sangramento">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Sangramento</label>
                    </div>
            <br><br>
        </div>
        @if (isset($atendimento->id))
        <label for="cid_id">Código CID10 doença: </label>
        <input type="text" id="cid_id" name="cid_id" value="{{ isset($atendimento['cid_id']) ? $atendimento['cid_id'] : '' }}" class="form-control" required>
        <br><br>
        <label for="descricao">Descrição: </label>
        <input type="text" id="descricao" name="descricao" value="{{ isset($atendimento['descricao']) ? $atendimento['descricao'] : '' }}" class="form-control" required readonly>
        <br><br>
        @endif
        <input type="submit" value="Salvar" class="btn btn-primary">
    </div>
</div>
@endsection