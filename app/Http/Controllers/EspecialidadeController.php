<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidade::paginate(5);
        $filtro = request()->input('filtro');
            $especialidades = Especialidade::where('nome', 'like', "%{$filtro}%")
                                ->orderBy('nome')->paginate(3);

        return view('especialidade.index', ['especialidades' => $especialidades])
        ->with('especialidades', $especialidades)
        ->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especialidade = new Especialidade;

        $especialidade->id = $request->id;
        $especialidade->nome = $request->nome;
        
        $especialidade->save();

        return redirect()->route('especialidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidade $especialidade)
    {
        $especialidade = Especialidade::findOrFail($especialidade->id);

        return view("especialidade.show", ['especialidade' => $especialidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);

        return view("especialidade.edit", ['especialidade' => $especialidade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->nome = $request->nome;
        $especialidade->save();
        return redirect()->route('especialidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidade $especialidade)
    {
        Especialidade::findOrFail($especialidade->id)->delete();
        return redirect()->route('especialidade.index');
    }
}
