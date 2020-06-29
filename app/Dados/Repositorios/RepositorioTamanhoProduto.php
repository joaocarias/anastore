<?php

namespace App\Dados\Repositorios;

use App\Dados\IRepositorios\IRepositorioTamanhoProduto;
use App\TamanhoProduto;

class RepositorioTamanhoProduto implements IRepositorioTamanhoProduto{
    public function ObterTodos(){
        return TamanhoProduto::OrderBy('nome', 'asc')->get();
    }
}