
<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserStatusController extends Controller
{
    // Use Authorizable;
	Use RegistersUsers;

public function update(Request $request, $id)
{
    // Get the user
    $user = User::findOrFail($id);

    // Update user
    $user->fill($request->toArray());


    $user->save();
    flash()->success('User has been updated.');
    return redirect()->route('users.index');
}

}