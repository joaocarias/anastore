<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function categoria()
    {
        return $this->hasOne(CategoriaProduto::class, 'id', 'categoria_produto_id');
    }

    public function tamanho()
    {
        return $this->hasOne(TamanhoProduto::class, 'id', 'tamanho_produto_id');
    }

    public function cor()
    {
        return $this->hasOne(Cor::class, 'id', 'cor_id');
    }

    public function converterMoedaParaUS($valor){
        $str = str_replace('.', '', $valor); 
        return str_replace(',', '.', $str);        
    }

    public function definirPrecoUS($valor){
        $str = str_replace('.', '', $valor); 
        $this->preco = str_replace(',', '.', $str);        
    }

    public function precoBR(){         
        return number_format($this->preco, 2, ',', '.');
    }
}
