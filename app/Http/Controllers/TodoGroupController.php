<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Todo;
use App\Models\TodoGroup;

class TodoGroupController extends Controller
{
    public function __construction()
    {
        return $this->middleware('auth');
    }
   public function index(TodoGroup $todogroup , User $user)
   {
        return view('todogroup.index',compact('todogroup', 'user'));
   }

   public function create()
   {
        return view('todogroup.create');
   }

   public function store()
   {
        
    $data = request()->validate([
        'name' => 'required',
    ]);


    auth()->user()->todogroups()->create($data);

    session()->flash('success', 'Group created succesfully');

    return  redirect('/profile/'.auth()->user()->id);
   }

   public function edit(TodoGroup $todogroup)
   {
     return view('todogroup.edit', compact('todogroup'));
   }

   public function updatestatus(TodoGroup $todogroup, User $user)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        auth()->user()->todogroups()->update($data);

        return redirect('/profile/'.auth()->user()->id);
    }


   public function delete(TodoGroup $todogroup , User $user)
    {
        $todogroup->delete();
        session()->flash('success', 'Group deleted succesfully');
        return redirect('/profile/'.auth()->user()->id);
    }
}
