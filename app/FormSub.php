<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class FormSub extends Model
{
 	protected $fillable =
 	[
        'nome','email', 'telefone', 'selecione','forms_id' ,'user_id'
    ];
    protected $table = 'forms_sub';

    use UsesTenantConnection;
}