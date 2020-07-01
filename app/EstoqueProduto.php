<?php

namespace App;

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
}
