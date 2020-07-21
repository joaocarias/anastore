<?php

namespace App\Dados\Repositorios;

use App\Dados\IRepositorios\IRepositorioVenda;
use App\Venda;

class RepositorioVenda implements IRepositorioVenda{
    public function ObterTodos(){
        return Venda::OrderBy('created_at', 'desc')->get();
    }
}