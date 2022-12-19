<?php

namespace App\Http\Controllers;

use App\Models\atendimento;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = atendimento::paginate(10);
        $filtro = request()->input('filtro');
            $atendimentos = atendimento::where('id', 'like', "%{$filtro}%")->
                                        orWhere('descricao', 'like', "%{$filtro}%")->
                                        orWhere('paciente_id', 'like', "%{$filtro}%")->
                                        orWhere('medico_id', 'like', "%{$filtro}%") 
                                ->orderBy('id')->paginate(10);
        return view('atendimento.index', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atendimento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atendimento = new atendimento();
        $atendimento->fill($request->all());

        $gravidade = 0;
        
        if ($request->febre == 'on') {
            $gravidade += 1;
        }
        if ($request->dor == 'on') {
            $gravidade += 1;
        }
        if ($request->diarreia == 'on') {
            $gravidade += 1;
        }
        if ($request->nauseas == 'on') {
            $gravidade += 1;
        }
        if ($request->sangramento == 'on') {
            $gravidade += 1;
        }

        if ($gravidade >= 3) {
            $atendimento->gravidade = 3;
        } else if ($gravidade == 2) {
            $atendimento->gravidade = 2;
        } else {
            $atendimento->gravidade = 1;
        }

        $atendimento->save();
        return redirect()->route('atendimento.urgencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show(atendimento $atendimento)
    {
        return view('atendimento.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(atendimento $atendimento)
    {
        return view('atendimento.edit', compact('atendimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, atendimento $atendimento)
    {
        $atendimento->fill($request->all());
        $atendimento->save();
        return redirect()->route('atendimento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(atendimento $atendimento)
    {
        //
    }

    // cria uma funcao que lista os atendimentos com hora_atendimento null ordenados por gravidade
    public function urgencia(){
        $atendimentos = atendimento::where('hora_atendimento', null)->orderBy('gravidade', 'desc')->get();
        return view('atendimento.urgencia', compact('atendimentos'));
    }

    
    public function atender($id)
    {
        $atendimento = atendimento::find($id);
        return view('atendimento.realizar', compact('atendimento'));
    }
    // cria uma funcao para realizar os atendimentos que tem como parametro o id do atendimento
    public function realizar(Request $request, $id){
        $atendimento = atendimento::find($id);
        $atendimento->fill($request->all());
        $atendimento->descricao = $request->descricao;
        $atendimento->hora_atendimento = date('Y-m-d H:i:s');
        $atendimento->save();
        return redirect()->route('atendimento.urgencia');
    }
}