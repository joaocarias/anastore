<?php

namespace App\Http\Controllers;

use App\Dados\Repositorios\RepositorioFormaPagamento;
use App\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormaPagamentoController extends Controller
{
    public function index()
    {
        $repositorio = new RepositorioFormaPagamento();
        $formaPagamentos = $repositorio->ObterTodos();
        return view('formas_pagamento.index', ['formaPagamentos' => $formaPagamentos]);
    }
    
    public function create()
    {
        return view('formas_pagamento.create', ['model' => null]);
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
        $obj = new FormaPagamento();
        $obj->nome = mb_strtoupper( $request->input('nome') );        
        $obj->usuario_cadastro = Auth::user()->id;
        $obj->save();
        
        return redirect()->route('formas_pagamento')->withStatus(__('Cadastro Realizado com Sucesso!')); 
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
