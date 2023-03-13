@extends('layouts.app')
@section('title')
    Group Todo 
@endsection
@section('content')
<div class="pt-3">
        <div class="justify-content-end">
        <a href ="/t/{{$todogroup->id}}/edit" class ="btn btn-primary">Edit Group</a>
        <a href ="/t/{{$todogroup->id}}" class ="btn btn-primary">Delete Group</a>
            <ul class="list-group">
                <li>
                Group Id: {{$todogroup->id}}</li>
                <li> 
                Group Name: {{$todogroup->name}}
                </li>
                @foreach($todogroup->todos as $todo)
                <div class="col-4">
                    <li class ="list-group-item">
                    <div class="col-4">    
                    @if($todo->isCompleted())
                        <span class = "badge badge-pill badge-success" style = "background-color: green" >Completed</span>
                    @endif
                    </div>
                     <a href ="/p/{{$todo->id}}/{{$user->id}}" style = "color: cornflowerblue"> {{ $todo->TaskName }}</a>
                    <form action="/p/complete/{{$todo->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        @if(!$todo->isCompleted())
                            <button class ="btn btn-primary" input="submit">complete</button>
                        @endif
                        </form>
                    </li>
                </div>
                @endforeach     
            </ul>
        </div>
@endsection




