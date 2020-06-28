<?php

namespace App\Dados\Repositorios;

use App\Dados\IRepositorios\IRepositorioUser;
use App\User;

class RepositorioUser implements IRepositorioUser{
    public function ObterTodos(){
        return User::OrderBy('name', 'asc')->get();
    }
}