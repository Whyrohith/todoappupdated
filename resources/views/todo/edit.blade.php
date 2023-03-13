
@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

    <form action="/p/{{$todo->id}}/{{$user->id}}" method="post" class="mt-4 p-4">
        @csrf
        @method('PATCH')
        <div class="form-group m-3">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" name="taskname" value="{{ old('taskname') ?? $todo->TaskName }}">
        </div>
        <div class="form-group m-3">
            <label for="description">Task Description</label>
            <textarea class="form-control" name="taskdescription" rows="3">{{ old('taskdescription') ?? $todo->TaskDescription}}</textarea>
        </div>
        <div class="form-group m-3">Group id:<select name ="todo_group_id">
        @foreach($user->todogroups as $todogroup)
            <option value="{{ $todogroup->id }}"
                @if ($todogroup->id == $todo->todo_group_id)
                    selected = "selected"
                @endif
            >{{ $todogroup->name }}</option>
            @endforeach
        </select>
       </div>
        @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li> 
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Update">
        </div>
    </form>

@endsection