<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DadoRequest;
use App\Models\Dado;


class DadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $all = Dado::all();
        return view('listar', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DadoRequest $request)
    {
        $dado = new Dado;
        $dado->nome = $request->nome;
        $dado->volume = $request->volume;
        $dado->local = $request->local;
        $dado->hora = $request->hora;
        $dado->data = $request->data;
        $dado->save();   

       // dd($request->all());

        return redirect('/listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dado = Dado::findOrFail($id);
        return view('editar', compact('dado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DadoRequest $request, $id)
    {
        $dado = Dado::findOrFail($id);

        $dado->nome = $request->nome;
        $dado->volume = $request->volume;
        $dado->hora = $request->hora;
        $dado->data = $request->data;
        $dado->local= $request->local;
        $dado->update(); 

        return redirect('/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
