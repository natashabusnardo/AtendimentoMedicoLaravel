@section('content')
@isset($medico)
    $endereco = Endereco::find($medico->id);
    $user = Usuario::find($medico->user_id);
@endisset
<div id="medico-form-container" class="col-md-6 offset-md-3">
    <div class="form-group">
        <input type="text" id="id" nome="id" disabled value="{{ isset($medico->id) ? $medico->id : 0 }}" class="form-control" hidden>
        <br><br>
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" value="{{ isset($medico['nome']) ? $medico['nome'] : '' }}" class="form-control" required>
        <br><br>
        <label for="crm">CRM: </label>
        <input type="text" id="crm" name="crm" value="{{ isset($medico['crm']) ? $medico['crm'] : '' }}" class="form-control" required>
        <br><br>
        <label for="especialidade">Especialidade: </label>
        <input type="text" id="especiliade" name="especialidade" value="{{ isset($medico['especialidade']) ? $medico['especialidade'] : '' }}" class="form-control" required>
        <input class="form-control" type="text" id="crm" name="crm" required minlength="11" value="{{ isset($medico) ? $medico->crm : '' }}" onchange="validatecrmCnpj(this)">
        <br><br>
    </div>
</div>
@endsection
   
