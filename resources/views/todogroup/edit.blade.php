
@extends('layouts.app')
@section('title')
    Edit Group Name
@endsection
@section('content')

    <form action="/t/complete/{{$todogroup->id}}" method="post" class="mt-4 p-4">
        @csrf
        @method('PATCH')
        <div class="form-group m-3">
            <label for="name">Group Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $todogroup->name }}">
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