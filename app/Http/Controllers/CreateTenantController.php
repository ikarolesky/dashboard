<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateTenantController extends Controller
{
    use RegistersUsers;




    public function index()
    {
    	return view('tenant.add');
    }


        protected function create(Request $request)
    {
            User::create([
            $validatedData = $request->validate(['name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenant.users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]),
        	$data = $request,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
            return redirect ('tenant/add')->with('success', 'Usuário criado com sucesso!');

    }
}
