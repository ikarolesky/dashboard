<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Form extends Model
{
 	protected $fillable =
 	[
        'nome_form','conteudo1', 'conteudo2', 'conteudo3','conteudo4' ,'url', 'produto'
    ];
    protected $table = 'forms';

    use UsesTenantConnection;
}
