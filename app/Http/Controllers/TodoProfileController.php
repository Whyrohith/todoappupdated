<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Todo;

class TodoProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user) 
    {
        return view('todo.index', compact('user'));
    }

}
