<?php

namespace App\Dados\Repositorios;

use App\Produto;
use App\Dados\IRepositorios\IRepositorioProduto;

class RepositorioProduto implements IRepositorioProduto{
    public function ObterTodos(){
        return Produto::OrderBy('nome', 'asc')->get();
    }
}