<?php

namespace App\Dados\Repositorios;

use App\FormaPagamento;
use App\Dados\IRepositorios\IRepositorioFormaPagamento;

class RepositorioFormaPagamento implements IRepositorioFormaPagamento{
    public function ObterTodos(){
        return FormaPagamento::OrderBy('id', 'asc')->get();
    }
}