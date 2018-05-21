<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $all = DB::table('dados')->simplePaginate(10); //Dado::all()->paginate(10);
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
        $dado->user_id = $request->user_id;
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
        $dado = Dado::findOrFail($id);
        $dado->delete();

        return back()->with(['success' => 'Dado deletado com sucesso']);
    }

    public function getSoma(Request $request){

        $date1 = $request->date1;
        $date2 = $request->date2;

        if($date1 > $date2){
            $soma = "Periodo inválido. Data de início deve ser menor que data final.";
            return view('teste', compact('soma'));
        }


        $soma = DB::table('dados')->whereBetween('data',array( $date1, $date2) )->sum('volume');
        $soma = $soma . '(mm)';

       // return view('teste', compact('soma'));
        return view('teste', compact('soma'));
    }
}
