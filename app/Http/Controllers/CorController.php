<?php

namespace App\Http\Controllers;

use App\Cor;
use App\Dados\Repositorios\RepositorioCor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorController extends Controller
{
    public function index()
    {
        $repositorio = new RepositorioCor();
        $cores = $repositorio->ObterTodos();
        return view('cor.index', ['cores' => $cores]);
    }
    
    public function create()
    {
        return view('cor.create', ['model' => null]);
    }
    
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:1|max:254',
        ];
       
        $messagens = [
            'required' => 'Campo Obrigatório!',
            'nome.required' => 'Campo Obrigatório!',
            'nome.min' => 'É necessário no mínimo 3 caracteres!',
        ];
       
        $request->validate($regras, $messagens);
        $obj = new Cor();
        $obj->nome = mb_strtoupper( $request->input('nome') );        
        $obj->usuario_cadastro = Auth::user()->id;
        $obj->save();
        
        return redirect()->route('cores')->withStatus(__('Cadastro Realizado com Sucesso!')); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
