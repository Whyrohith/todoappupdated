@extends('layouts.navigation')
@section('title')
    My Todo App
@endsection
@section('body')
    <div class="pt-3">
        <div class="justify-content-end">
            <ul class="list-group">
                Todo
                @foreach($user->todos as $todo)
                <div class="col-4">
                    <li class ="list-group-item">
                    <div class="col-4">    
                    @if($todo->isCompleted())
                        <span class = "badge badge-pill badge-success" style = "background-color: green" >Completed</span>
                    @endif
                    </div>
                     <a href ="/p/{{$todo->id}}/{{$user->id}}" style = "color: cornflowerblue"> {{ $todo->TaskName }}</a>
                    <form action="/{{$user->id}}/p/complete/{{$todo->id}}" method="POST">
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
        <div class="pt-3">
        <div class="justify-content-end">
            <ul class="list-group">
                Group Todo
                @foreach($user->todogroups as $todo)
                <div class="col-4">
                    <li class ="list-group-item">
                    <div class="col-4">  
                    </div>
                     <a href ="/todogroup/{{$todo->id}}/{{$user->id}}" style = "color: cornflowerblue">{{ $todo->name }}</a>
                    </li>
                </div>
                @endforeach     
            </ul>
        </div>
@endsection
