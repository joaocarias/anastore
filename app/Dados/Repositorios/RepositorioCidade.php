<?php

namespace App\Dados\Repositorios;

use App\Cidade;
use App\Dados\IRepositorios\IRepositorioCidade;

class RepositorioCidade implements IRepositorioCidade{
    public function ObterTodos(){
        return Cidade::OrderBy('nome', 'asc')->get();
    }
}