<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function update(Request $request)
    {
        $userData = Auth::user();
        $user = User::find($userData->id);
        $user->update($request->all());
        return response()->json([
            'status' => "success",
            'message' => "Updated Successfully"
        ], 200);
    }
    public function delete()
    {
        $userData = Auth::user();
        $user = User::find($userData->id);
        $user->delete();
        return response()->json([
            'status' => "success",
            'message' => "Deleted Successfully"
        ], 200);
    }
}
