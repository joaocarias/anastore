<?php

namespace App;

use App\Lib\Auxiliar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstoqueProduto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }

    public function definirValorCompraUS($valor){
        $str = str_replace('.', '', $valor); 
        $this->valor_compra = str_replace(',', '.', $str);        
    }

    public function valorCompraBR(){         
        return number_format($this->valor_compra, 2, ',', '.');
    }

    public function dataCompraBR(){         
        return Auxiliar::converterDataParaBR($this->data_compra);
    }

}
