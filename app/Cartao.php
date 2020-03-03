<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{

    protected $fillable = [
        'status','id','digitos','tipo', 'saldo', 'cartao_banco_id', 'cartao_ciclo_id',
    ];
    protected $table = 'cartao';

    use UsesTenantConnection;

		public function banco()
		{
		return $this->hasOne(CartaoBanco::class);
		}
		public function ciclo()
		{
		return $this->hasOne(CartaoCiclo::class);
		}
		public function relatorio()
		{
			return $this->hasMany(Recarga::class);
		}


}
