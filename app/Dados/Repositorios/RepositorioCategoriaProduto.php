<?php

namespace App\Dados\Repositorios;

use App\CategoriaProduto;
use App\Dados\IRepositorios\IRepositorioCategoriaProduto;

class RepositorioCategoriaProduto implements IRepositorioCategoriaProduto{
    public function ObterTodos(){
        return CategoriaProduto::OrderBy('nome', 'asc')->get();
    }
}