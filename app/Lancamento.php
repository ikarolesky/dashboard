<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Lancamento extends Model
{
    use UsesTenantConnection;

    protected $table = 'lancamento';
    protected $fillable = [
        'descrição','valor','tipo', 'cartao_id', 'cartao_digitos' ];
}