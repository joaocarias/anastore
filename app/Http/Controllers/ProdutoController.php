<?php

namespace App\Http\Controllers;

use App\Dados\Repositorios\RepositorioCategoriaProduto;
use App\Dados\Repositorios\RepositorioCor;
use App\Dados\Repositorios\RepositorioProduto;
use App\Dados\Repositorios\RepositorioTamanhoProduto;
use App\EstoqueProduto;
use App\Lib\Auxiliar;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index()
    {
        $repositorio = new RepositorioProduto();
        $produtos = $repositorio->ObterTodos();
        return view('produto.index', ['produtos' => $produtos]);
    }
    
    public function create()
    {
        $repositorioCategoriaProduto = new RepositorioCategoriaProduto();
        $categoriaProdutos = $repositorioCategoriaProduto->ObterTodos();

        $repositorioTamanhoProduto = new RepositorioTamanhoProduto();
        $tamanhoProdutos = $repositorioTamanhoProduto->ObterTodos();

        $repositorioCor = new RepositorioCor();
        $cores = $repositorioCor->ObterTodos();

        return view('produto.create', ['model' => null
                        , 'categoriaProdutos' => $categoriaProdutos
                        , 'tamanhoProdutos' => $tamanhoProdutos
                        , 'cores' => $cores      
                    ]);
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
        $obj = new Produto();
        $obj->nome = mb_strtoupper( $request->input('nome') );  
        $obj->categoria_produto_id = $request->input('categoria_produto_id') ;  
        $obj->tamanho_produto_id = $request->input('tamanho_produto_id') ;
        $obj->cor_id = $request->input('cor_id') ;
        $obj->definirPrecoUS($request->input('preco')) ;
        $obj->usuario_cadastro = Auth::user()->id;
        
        $obj->save();

        if(isset($obj) && $obj->id > 0){
            $objEst = new EstoqueProduto();
            $objEst->produto_id = $obj->id;  
            $objEst->quantidade = $request->input('quantidade') ;  
            $objEst->data_compra = Auxiliar::converterDataParaUSA($request->input('data_compra'));
            $objEst->definirValorCompraUS($request->input('valor_compra')) ;
            $objEst->usuario_cadastro = Auth::user()->id;
            
            $objEst->save();            
        }
        
        return redirect()->route('produtos')->withStatus(__('Cadastro Realizado com Sucesso!')); 
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
