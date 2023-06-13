<?php

namespace App\Http\Controllers\UserPreference;

use App\Http\Controllers\Controller;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class RegisteredUserPreference extends Controller
{

    public function store(Request $request): JsonResponse
    {

        $user = UserPreference::create([
            'user_id' => $request->user_id,
            'preference_name' => $request->preference_name,
        ]);

        return response()->json(['status' => 'success']);
    }
}
