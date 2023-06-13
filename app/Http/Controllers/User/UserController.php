<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function update(Request $request)
    {

        $user_id = $request->user_id;

        $user = User::find($user_id);

        $user->first_login = 0;

        $user->save();
    }
}
