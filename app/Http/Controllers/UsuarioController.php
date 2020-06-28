<?php

namespace App\Http\Controllers;

use App\Dados\Repositorios\RepositorioUser;

class UsuarioController extends Controller
{    
    public function index()
    {
        $repositorioUsuario = new RepositorioUser();
        $usuarios = $repositorioUsuario->ObterTodos();
        return view('usuario.index', ['usuarios' => $usuarios]);      
    }     
}
