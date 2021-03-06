<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cidade()
    {
        return $this->hasOne(Cidade::class, 'id', 'cidade_id');
    }
}
