<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Plataformaprod extends Model
{
    use UsesTenantConnection;

    protected $table = 'plataforma_produto';
        protected $fillable = [
        'product_key','basic_authentication','product_id', 'plataforma_id', 'codigo_produto'
    ];
}
