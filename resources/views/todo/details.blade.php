@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>TODO DETAILS</b>
        </div>
        <div class="card-body">
            <h5 class="card-title"> Task Name: {{ $todo->TaskName }} </h5>
            <p class="card-text"> Task Description: {{ $todo->TaskDescription ?? 'N/A' }} </p>
            <a href="/p/{{$todo->id}}/{{$user->id}}/edit"><span class="btn btn-primary">Edit</span></a>
            <a href="/delete/{{$todo->id}}"><span class="btn btn-danger">Delete</span></a>
        </div>

@endsection