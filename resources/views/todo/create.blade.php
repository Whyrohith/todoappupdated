@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

    <form action="/p" method="post" class="mt-4 p-4">
        @csrf
        <div class="form-group m-3">
            <label for="TaskName">Task Name</label>
            <input type="text" class="form-control" name="taskname">
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
            <label for="TaskDescription">TaskDescription</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>

@endsection