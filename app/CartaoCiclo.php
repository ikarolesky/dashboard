<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class CartaoCiclo extends Model
{
    use UsesTenantConnection;

    protected $table = 'cartao_ciclo';
}
