<?php

namespace App\Http\Controllers;

use App\Dados\Repositorios\RepositorioCliente;
use App\Dados\Repositorios\RepositorioProduto;
use App\Dados\Repositorios\RepositorioVenda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $repositorioVenda = new RepositorioVenda();
        $vendas = $repositorioVenda->ObterTodos();

        return view('venda.index', ['vendas' => $vendas]);
    }

    public function create(Request $request)
    {
        $repositorioCliente = new RepositorioCliente();
        $repositorioProduto = new RepositorioProduto();
       
        $clientes = $repositorioCliente->ObterTodos();
        $produtos = $repositorioProduto->ObterTodos();
        
        return view('venda.create', [
            'model' => null, 'clientes' => $clientes, 'produtos' => $produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
