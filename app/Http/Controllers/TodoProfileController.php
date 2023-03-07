<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class TodoProfileController extends Controller
{
    public function index($user) 
    {
        $user  = User::findOrFail($user);   
        return view('todo.index' , [
            "user" => $user,
        ]);
    }

    public function edit(){
        return view ('todo.edit');
    }
}
