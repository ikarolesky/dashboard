<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Resgate extends Model
{
    use UsesTenantConnection;

    protected $table = 'lancamento';
}
