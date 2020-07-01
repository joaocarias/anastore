<?php

namespace App\Dados\Repositorios;

use App\EstoqueProduto;
use App\Dados\IRepositorios\IRepositorioEstoqueProduto;

class RepositorioEstoqueProduto implements IRepositorioEstoqueProduto{
    public function ObterTodos(){
        return EstoqueProduto::OrderBy('data_compra', 'asc')->get();
    }

    public function ObterEmEstoque(){
        return EstoqueProduto::OrderBy('data_compra', 'asc')->get();
    }
}