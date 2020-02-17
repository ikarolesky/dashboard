<?php

namespace App;
use App\Notifications\MailResetPasswordToken;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Product
{
    use UsesTenantConnection;

    protected $fillable = [
        'name','id','url','user_id','is_active',
    ];
}
