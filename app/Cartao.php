<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    use UsesTenantConnection;

		public function banco()
		{
		return $this->hasOne(CartaoBanco::class);
		}
		public function ciclo()
		{
		return $this->hasOne(CartaoCiclo::class);
		}


}
