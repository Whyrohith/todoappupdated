<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('todo.create');        
    }

    public function store()
    {
        $data = request()->validate([
            'taskname' => 'required',
        ]);

        auth()->user()->todos()->create($data);

        dd(request()->all());  
    }
}
