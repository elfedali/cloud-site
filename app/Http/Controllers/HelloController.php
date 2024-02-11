<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {

        return response()->json([
            'users' => \App\Models\User::all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'user' => \App\Models\User::find($id)
        ]);
    }
}
