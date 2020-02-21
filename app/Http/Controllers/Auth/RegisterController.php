<?php

namespace App\Http\Controllers\Auth;
use App\Tenant;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\CreateTenant;
use App\User;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Database\QueryException;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, HasRoles;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
{
  try
  {
    $subdomain = $data['subdomain'];
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $phone = $data['phone'];
    $doc = $data['doc'];
    $zip = $data['address_zip'];
    $address = $data['address'];
    $number = $data['address_number'];
    $comp = $data['address_comp'];
    $district = $data['address_district'];
    $city = $data['address_city'];
    $state = $data['address_state'];
    $company = $data['company'];
    $tenant = $tenant = Tenant::registerTenant($name, $email, $password,$phone,$doc,$zip,$address,$number,$comp,$district,$city,$state, $subdomain, $company);

    $this->redirectTo = 'https://' . $tenant->hostname->fqdn . '/login';
    return $tenant->admin;
  }
  catch (QueryException $e)
  {
    if($e->getCode() === '23000')
      {
              return redirect()->back()->withErrors(['URL já está em uso', 'Favor escolher nova URL', 'Este será seu acesso permanente!',  'Em caso de dúvidas ou persistência no erro contate dev@kings7.com.br']);
      }
  }

}

}


