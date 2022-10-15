@section('content')
@isset($medico)
    $endereco = Endereco::find($medico->id);
    $user = Usuario::find($medico->user_id);
@endisset
<div id="especialidade-form-container" class="col-md-6 offset-md-3">
    <div class="form-group">
        <input type="text" id="id" nome="id" disabled value="{{ isset($especialidade->id) ? $especialidade->id : 0 }}" class="form-control" hidden>
        <br><br>
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" value="{{ isset($especialidade['nome']) ? $especialidade['nome'] : '' }}" class="form-control" required>
        <br><br>
        <label class="form-label" for="crm"><strong>CRM</strong><br></label>
        <input class="form-control" type="text" id="crm" name="crm" required minlength="11" value="{{ isset($medico) ? $medico->crm : '' }}" onchange="validatecrmCnpj(this)">
        <br><br>
    </div>
</div>
@endsection
   
