<?php

namespace App\Dados\Repositorios;

use App\Cor;
use App\Dados\IRepositorios\IRepositorioCor;

class RepositorioCor implements IRepositorioCor{
    public function ObterTodos(){
        return Cor::OrderBy('nome', 'asc')->get();
    }
}