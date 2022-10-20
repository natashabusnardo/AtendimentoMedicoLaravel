@section('content')
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
        @isset($medico)
            @php $especialidades = App\Models\Especialidade::all(); @endphp
            <select name="especialidade_id" id="especialidade_id" class="form-control"> 
                @foreach($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}" {{ $especialidade->id == $medico->especialidade_id ? 'selected' : '' }}>{{ $especialidade->nome }}</option>
                @endforeach
            </select> <button class="btn btn-success" type="button" id="addEspecialidade">+</button>
        @endisset
        <table id="especialidades">
            @isset($medico)
                @php $medico_has_especialidades = App\Models\Medico_has_especialidade::where('medico_id', $medico->id)->get(); @endphp
                @foreach($medico_has_especialidades as $medico_has_especialidade)
                    @php $especialidade = App\Models\Especialidade::find($medico_has_especialidade->especialidade_id); @endphp
                    <tr class="align-middle">
                        <td id="especialidade_id" value="{{ $especialidade->id }}">{{ $especialidade->id }}</td>
                        <td>{{ $especialidade->nome }}</td>
                        <td class="text-center"><a class="btn btn-outline-danger border rounded-circle" id="removeBtn" role="button" style="border-radius: 30px;border-width: 1px;">-</a></td>
                    </tr>
                @endforeach
            @endisset
        </table>
        <br><br>
        <label for="disponivel">Disponivel: </label>
        <input type="checkbox" name="disponivel" id="disponivel">
        <br><br>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <br><br>
    </div>
</div>
@endsection
   
