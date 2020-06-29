<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Dados\Repositorios\RepositorioCidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CidadeController extends Controller
{    
    public function index()
    {
        $repositorio = new RepositorioCidade();
        $cidades = $repositorio->ObterTodos();
        return view('cidade.index', ['cidades' => $cidades]);    
    }

    public function create()
    {
        return view('cidade.create', ['model' => null]);
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:254',
        ];
       
        $messagens = [
            'required' => 'Campo Obrigatório!',
            'nome.required' => 'Campo Obrigatório!',
            'nome.min' => 'É necessário no mínimo 3 caracteres!',
        ];
       
        $request->validate($regras, $messagens);
        $obj = new Cidade();
        $obj->nome = $request->input('nome');
        $obj->uf = $request->input('uf');        
        $obj->usuario_cadastro = Auth::user()->id;
        $obj->save();
        
        return redirect()->route('cidades')->withStatus(__('Cadastro Realizado com Sucesso!')); 
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
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
