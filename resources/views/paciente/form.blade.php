@section('content')
<div id="paciente-form-container" class="col-md-6 offset-md-3">
<div class="form-group">
   <input type="text" id="id" nome="id" disabled value="{{ isset($paciente->id) ? $paciente->id : 0 }}" class="form-control" hidden>
   <br><br>
   <label for="nome" class="form-label"><strong>Nome: </strong></label>
   <input type="text" id="nome" name="nome" value="{{ isset($paciente['nome']) ? $paciente['nome'] : '' }}" class="form-control" required>
   <label class="form-label" for="cpf"><strong>CPF</strong><br></label>
   <input class="form-control" type="text" id="cpf" name="cpf" required minlength="11" value="{{ isset($paciente) ? $paciente->cpf : '' }}" onchange="validateCpfCnpj(this)">
   <label class="form-label" for="telefone"><strong>Telefone</strong><br></label>
   <input class="form-control" type="text" id="telefone" name="telefone" placeholder="(47) 90000-0000" value="{{ isset($paciente) ? $paciente->telefone : '' }}">
   <label for="email"><strong>Email: </strong></label>
   <input type="email" id="email" name="email" value="{{ isset($paciente['email']) ? $paciente['email'] : '' }}" class="form-control" required>
   <label for="data_nascimento">Data de Nascimento: </label>
   <input type="date" id="data_nascimento" name="data_nascimento" value="{{ isset($paciente['data_nascimento']) ? $paciente['data_nascimento'] : '' }}" class="form-control" required>
   <div class="mb-3"><label class="form-label" for="cep"><strong>CEP</strong><br></label>
      <input class="form-control" type="text" id="cep" name="cep" placeholder="00000-000" value="{{ isset($endereco) ? $endereco->cep : '' }}">
   </div>
   <div class="mb-3"><label class="form-label" for="logradouro"><strong>Logradouro</strong><br></label>
      <input class="form-control" type="text" id="logradouro" name="logradouro" required value="{{ isset($endereco) ? $endereco->logradouro : '' }}">
   </div>
   <div class="mb-3"><label class="form-label" for="numero"><strong>Número</strong><br></label>
      <input class="form-control" type="text" id="numero" name="numero" required value="{{ isset($endereco) ? $endereco->numero : '' }}">
   </div>
</div>
<div class="row">
   <div class="col">
      <div class="mb-3"><label class="form-label" for="bairro"><strong>Bairro</strong><br></label>
         <input class="form-control" type="text" id="bairro" name="bairro" required value="{{ isset($endereco) ? $endereco->bairro : '' }}"> 
      </div>
   </div>
   <div class="col">
      <div class="mb-3"><label class="form-label" for="complemento"><strong>Complementoo</strong><br></label>
         <input class="form-control" type="text" id="complemento" name="complemento" value="{{ isset($endereco) ? $endereco->complemento : '' }}">
      </div>
   </div>
</div>
<div class="row">
   <div class="col">
      <div class="mb-3">
         <label class="form-label" for="estado"><strong>Estado</strong><br></label>
         <select class="form-select" id="estado" required name="estado">
            <option value="" selected>Selecione uma opção</option>
            @php 
            use App\Models\Estado;
            $estados = Estado::all();
            @endphp
            @foreach ($estados as $estado)
            <option value="{{ $estado->id }}" {{ isset($endereco) && $endereco->estado == $estado->id ? 'selected' : '' }}>{{ $estado->nome }}</option>
            @endforeach
         </select>
      </div>
   </div>
   <div class="col">
      <div class="mb-3">
         <label class="form-label" for="cidade"><strong>Cidade</strong><br></label>
         <select class="form-select" id="cidade_id" required name="cidade_id">
            @if (isset($address))
            <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
            @else
            <option value="" selected>Selecione uma opção</option>
            @endif
         </select>
      </div>
   </div>
   <br><br>
</div>
<input type="submit" value="Salvar" class="btn btn-primary">
</div>
@endsection