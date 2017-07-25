<?php

namespace App\Api\v1\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Api\v1\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(Request $request, $id)
    {
        return User::findOrFail($id);
    }
}
