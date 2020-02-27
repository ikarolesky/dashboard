<?php

namespace App\Http\Controllers;
use App\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserForTenantController extends Controller
{
    use RegistersUsers, HasRoles;




    public function index()
    {
    	return view('user.add');
    }


        protected function create(Request $request)
    {
            $user = User::create([
            $validatedData = $request->validate(['name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenant.users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]),
        	$data = $request,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => $data['active'],
        ]);
            $user->guard_name = 'web';
            $user->assignRole($request['role']);
            return redirect ('users')->with('success', 'Usuário criado com sucesso!');

    }
}
