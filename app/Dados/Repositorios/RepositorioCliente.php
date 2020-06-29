<?php

namespace App\Dados\Repositorios;

use App\Cliente;
use App\Dados\IRepositorios\IRepositorioCliente;

class RepositorioCliente implements IRepositorioCliente{
    public function ObterTodos(){
        return Cliente::OrderBy('nome', 'asc')->get();
    }
}