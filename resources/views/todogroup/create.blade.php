@extends('layouts.app')

@section('title')
    Create Group Todo
@endsection

@section('content')

    <form action="/t" method="post" class="mt-4 p-4">
        @csrf
        <div class="form-group m-3">
            <label for="name">Group Name</label>
            <input type="text" class="form-control" name="name">
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
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div> 
    </form>

@endsection