<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SistemaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->mySistemas()
        ->create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'estilo' => $request->estilo,
            'preco' => $request->preco

        ]);

        return redirect (route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $sistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sistema $sistema)
    {
        $sistema->nome = $request->nome;
        $sistema->endereco = $request->endereco;
        $sistema->telefone = $request->telefone;
        $sistema->estilo = $request->estilo;
        $sistema->preco = $request->preco;
        $sistema->save();

        return redirect(route('dashboard'));

    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Material  $sistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sistema $sistema)
    {
        $sistema->delete();
        return redirect(route('dashboard'));
    
    }
}
