<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = medico::all();
        return view('medico.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medico = new medico();
        $medico->nome = $request->nome;
        $medico->crm = $request->crm;
        if ($request->disponivel == 'on') {
            $medico->disponivel = true;
        } else {
            $medico->disponivel = false;
        }
        $medico->save();
        return redirect()->route('medico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(medico $medico)
    {
        return view('medico.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(medico $medico)
    {
        return view('medico.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medico $medico)
    {
        $medico->nome = $request->nome;
        $medico->crm = $request->crm;
        if ($request->disponivel == 'on') {
            $medico->disponivel = true;
        } else {
            $medico->disponivel = false;
        }
        $medico->save();
        return redirect()->route('medico.index');
    }

    /**
     * Remove the specified resource from storage.medico_id
     *
     * @param  \App\Models\medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(medico $medico)
    {
        $medico->delete();
        return redirect()->route('medico.index');
    }

    public function adicionarEspecialidade(Request $request)
    {
        $especialidade = \App\Models\Medico_has_especialidade::create($request->all());
        return response()->json($especialidade);
    } 

    public function deleteEspecialidade($medico_id, $especialidade_id) 
    {
        \App\Models\Medico_has_especialidade::where('medico_id', $medico_id)->where('especialidade_id', $especialidade_id)->delete();
        return response('True', 200);
    }
}
