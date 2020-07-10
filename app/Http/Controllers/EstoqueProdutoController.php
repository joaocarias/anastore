<?php

namespace App\Http\Controllers;

use App\Dados\Repositorios\RepositorioEstoqueProduto;
use App\Dados\Repositorios\RepositorioProduto;
use App\EstoqueProduto;
use App\Lib\Auxiliar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstoqueProdutoController extends Controller
{
    public function index()
    {
        $repositorio = new RepositorioEstoqueProduto();
        $estoqueProdutos = $repositorio->ObterTodos();
        return view('estoque_produto.index', ['estoqueProdutos' => $estoqueProdutos]);
    }

    public function create()
    {
        $repositorioProduto = new RepositorioProduto();
        $produtos = $repositorioProduto->ObterTodos();

        return view('estoque_produto.create', ['model' => null
                        , 'produtos' => $produtos
                    ]);
    }

    public function store(Request $request)
    {
        $obj = new EstoqueProduto();
        $obj->produto_id = $request->input('produto_id') ;  
        $obj->quantidade = $request->input('quantidade') ;  
        $obj->data_compra = Auxiliar::converterDataParaUSA($request->input('data_compra'));
        $obj->definirValorCompraUS($request->input('valor_compra')) ;
        $obj->usuario_cadastro = Auth::user()->id;
        
        $obj->save();
        
        return redirect()->route('estoque_produtos')->withStatus(__('Cadastro Realizado com Sucesso!')); 

    }

    public function show($id)
    {

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
