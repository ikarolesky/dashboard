<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Form extends Model
{
 	protected $fillable =
 	[
        'nome_form','conteudo1', 'conteudo2', 'conteudo3','conteudo4','conteudo5','conteudo6','conteudo7' ,'url', 'produto', 'user_id','whatsapp'
    ];
    protected $table = 'forms';

    use UsesTenantConnection;
}
