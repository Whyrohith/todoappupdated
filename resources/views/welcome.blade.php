@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
           <h1> My Todo App</h1>
        </div>
    </div>
    <body class="antialiased">
        <div class="col-12 align-self-center">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/profile/{user}') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div>
            <h2 class="row mt-3 col mt-3">Log in to create a ToDo </h2>
        </div>
        
    </body>
    
@endsection
</html>
