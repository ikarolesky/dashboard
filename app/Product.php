<?php

namespace App;
use App\Plataformaprod;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\MailResetPasswordToken;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Product extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'name','id','url','is_active', 'user_id',
    ];
    protected $table = 'produto';

    public function plataforms()
{
    return $this->hasMany(Plataformaprod::class);
}

}
