<?php

namespace App\Http\Controllers;

use App\Dados\Repositorios\RepositorioTamanhoProduto;
use App\TamanhoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TamanhoProdutoController extends Controller
{    
    public function index()
    {
        $repositorio = new RepositorioTamanhoProduto();
        $tamanhoProdutos = $repositorio->ObterTodos();
        return view('tamanho_produto.index', ['tamanhoProdutos' => $tamanhoProdutos]);
    }
    
    public function create()
    {
        return view('tamanho_produto.create', ['model' => null]);
    }
    
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:1|max:254',
        ];
       
        $messagens = [
            'required' => 'Campo Obrigatório!',
            'nome.required' => 'Campo Obrigatório!',
            'nome.min' => 'É necessário no mínimo 1 caracteres!',
        ];
       
        $request->validate($regras, $messagens);
        $obj = new TamanhoProduto();
        $obj->nome = mb_strtoupper( $request->input('nome') );        
        $obj->usuario_cadastro = Auth::user()->id;
        $obj->save();
        
        return redirect()->route('tamanho_produtos')->withStatus(__('Cadastro Realizado com Sucesso!')); 
    }

    public function destroy($id)
    {
        
    }
}
