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

public function updateStatus(Request $request)
{
    $user = User::findOrFail($request->user_id);
    $user->status = $request->status;
    $user->save();

    return response()->json(['message' => 'User status updated successfully.']);
}
}