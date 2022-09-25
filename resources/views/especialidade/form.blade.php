
@section('content')

<div id="especialidade-form-container" class="col-md-6 offset-md-3">
    <div class="form-group">
        <input type="text" id="id" nome="id" disabled value="{{ isset($especialidade->id) ? $especialidade->id : 0 }}" class="form-control" hidden>
        <br><br>
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" value="{{ isset($especialidade['nome']) ? $especialidade['nome'] : '' }}" class="form-control" required>
        <br><br>
        <input type="submit" value="Salvar" class="btn btn-primary">
    </div>
</div>

@endsection
   
