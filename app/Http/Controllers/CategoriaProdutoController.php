<?php

namespace App\Http\Controllers;

use App\CategoriaProduto;
use App\Dados\Repositorios\RepositorioCategoriaProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaProdutoController extends Controller
{
    public function index()
    {
        $repositorio = new RepositorioCategoriaProduto();
        $categoriaProdutos = $repositorio->ObterTodos();
        return view('categoria_produto.index', ['categoriaProdutos' => $categoriaProdutos]);
    }
    
    public function create()
    {
        return view('categoria_produto.create', ['model' => null]);
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
        $obj = new CategoriaProduto();
        $obj->nome = mb_strtoupper( $request->input('nome') );        
        $obj->usuario_cadastro = Auth::user()->id;
        $obj->save();
        
        return redirect()->route('categoria_produtos')->withStatus(__('Cadastro Realizado com Sucesso!')); 
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
