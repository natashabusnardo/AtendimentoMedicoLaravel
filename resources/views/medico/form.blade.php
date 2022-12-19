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
        @isset($medico)
            @php $especialidades = App\Models\Especialidade::all(); @endphp
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Especialidade</span>
                            <select class="form-select" required id="especialidade_id" name="especialidade_id">
                                @foreach ($especialidades as $especialidade)
                                    <option value="{{ $especialidade->id }}" {{ $especialidade->id == $medico->especialidade_id ? 'selected' : '' }}>{{ $especialidade->nome }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="button" id="addEspecialidade">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
        <div class="row">
            <div class="col">
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Especialidade</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody id="especialidades">
                            @isset($medico)
                                @php $especialidades = App\Models\Medico_has_especialidade::where('medico_id', $medico->id)->get(); @endphp
                                @foreach ($especialidades as $especialidade)
                                    <tr class="align-middle">
                                        <td>{{ @App\Models\Especialidade::find($especialidade->especialidade_id)->nome }}</td>
                                        <td class="text-center"><button class="btn btn-danger" type="button" id="removeBtn">-</button></td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="padding: 0px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <br><br>
        <label for="disponivel">Disponivel: </label>
        <input type="checkbox" name="disponivel" id="disponivel">
        <br><br>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <br><br>
    </div>
</div>
@endsection

