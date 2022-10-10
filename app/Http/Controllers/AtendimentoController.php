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
        $atendimentos = atendimento::all();
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
        $atendimento->nome = $request->nome;
        $atendimento->save();
        return redirect()->route('atendimento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show(atendimento $atendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(atendimento $atendimento)
    {
        //
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
        //
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
}
