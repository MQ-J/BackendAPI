<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use App\Models\Produtos;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = Produtos::all();

        return response()->json([
            'errors' => false,
            'data' => $produtos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pessoas = new Pessoas;

        $pessoas->nome = $request->nome;
        $pessoas->sobrenome = $request->sobrenome;

        $pessoas->save();

        return response()->json([
            'errors' => false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoas::find($id);

        return response()->json([
            'errors' => false,
            'data' => $pessoa
        ]);
    }

    /**
     * Pesquisa os clientes pelo nome
     * 
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function showNome($nome = null)
    {
        $pessoas = Pessoas::where('nome', $nome)->get();
        

        return response()->json([
            'errors' => false,
            'data' => $pessoas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pessoa = Pessoas::find($id);

        $pessoa->nome = $request->nome;
        $pessoa->sobrenome = $request->sobrenome;

        $pessoa->save();

        return response()->json([
            'errors' => false
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoas::find($id);

        $pessoa->delete();

        return response()->json([
            'errors' => false
        ]);
    }
}
