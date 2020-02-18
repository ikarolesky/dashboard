<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Plataforma extends Model
{
    use UsesTenantConnection;

    protected $table = 'plataforma';
}
