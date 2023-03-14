<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Todo;
use App\Models\TodoGroup;


class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirect(User $user)
    {
        return redirect('/profile/'.auth()->user()->id);
    }

    public function create(User $user, TodoGroup $todogroup)
    {
        return view('todo.create', compact('user','todogroup'));        
    }

    public function store()
    {
        $data = request()->validate([
            'taskname' => 'required',
            'completed' => 'nullable|boolean',
            'taskdescription' =>'',
            'todo_group_id' => 'nullable|integer',
            'completed_at' =>'null',
        ]);


        auth()->user()->todos()->create($data);

        session()->flash('success', 'Todo created succesfully');

        return  redirect('/profile/'.auth()->user()->id);
    }

    public function show(Todo $todo , User $user)
    {
        return view('todo.details', compact('todo','user'));
    }

    public function edit(Todo $todo , User $user)
    {
        return view('todo.edit', compact('todo', 'user'));
    } 

    public function update(Todo $todo , User $user)
    {
        $data = request()->validate([
            'taskname' => 'required',
            'completed' => 'nullable|boolean',
            'taskdescription' => '',
            'todo_group_id' => 'nullable|numeric',
            'completed_at' =>'null',
        ]);

        $todo->update($data);

        return redirect("/p/{$todo->id}/{$user->id}");
    }

    public function updatestatus(User $user , Todo $todo)
    {
      
        $todo->completed_at = now();
        $todo->save();

        return redirect('/profile/'.auth()->user()->id);
    }


    public function delete(User $user , Todo $todo)
    {
        $todo->delete();
        session()->flash('success', 'Todo deleted succesfully');
        return redirect('/profile/'.auth()->user()->id);
    }
}
