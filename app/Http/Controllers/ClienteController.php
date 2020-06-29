<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Dados\Repositorios\RepositorioCidade;
use App\Dados\Repositorios\RepositorioCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{    
    public function index()
    {
        $repositorio = new RepositorioCliente();
        $clientes = $repositorio->ObterTodos();
        return view('cliente.index', ['clientes' => $clientes]);      
    }
    
    public function create()
    {
        $repositorioCidade = new RepositorioCidade();
        $cidades = $repositorioCidade->ObterTodos();

        return view('cliente.create', ['model' => null, 'cidades' => $cidades]);
    }
   
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:254',
        ];
       
        $messagens = [
            'required' => 'Campo Obrigatório!',
            'nome.required' => 'Campo Obrigatório!',
            'nome.min' => 'É necessário no mínimo 3 caracteres!',
        ];
       
        $request->validate($regras, $messagens);
        $obj = new Cliente();
        $obj->nome = $request->input('nome');
        $obj->email = $request->input('email');
        $obj->telefone = $request->input('telefone');
        $obj->cidade_id = $request->input('cidade_id');        
        $obj->usuario_cadastro = Auth::user()->id;
        $obj->save();
        
        return redirect()->route('clientes')->withStatus(__('Cadastro Realizado com Sucesso!')); 
    }

    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
       
    }
    
    public function update(Request $request, $id)
    {
        
    }
    
    public function destroy($id)
    {
        
    }
}
