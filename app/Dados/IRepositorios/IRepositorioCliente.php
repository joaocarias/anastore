<?php

namespace App\Dados\IRepositorios;

interface IRepositorioCliente{
    public function ObterTodos();
    public function Obter($id);
}