@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

    <form action="/p" method="post" class="mt-4 p-4">
        @livewireScripts
        @csrf
        <div class="form-group m-3">
            <label for="TaskName">Task Name</label>
            <input type="text" class="form-control" name="taskname">
        </div>
        <div class="form-group m-3">
            <label for="TaskDescription">Task Description</label>
            <textarea class="form-control" name="taskdescription" rows="3"></textarea>
        </div>
        <div class="form-group m-3">Group id:<select name ="todo_group_id">
        <option value="">--Please choose an option--</option>
        @foreach($user->todogroups as $todogroup)
            <option value="{{ $todogroup->id }}"
                >{{ $todogroup->name }}</option>
            @endforeach
        </select>
       </div>
        <div>
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
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
        
    </form>

@endsection