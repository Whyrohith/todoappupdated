<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>

<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a href="/"><span class="navbar-brand mb-0 h1">Todo</span></a>
        <a href ="/t/create" class = "btn btn-primary">Create Group</a>
        <a href="/p/create/{{$user->id}}"><span class="btn btn-primary">Create Todo</span></a>
         @if(session()->has('success'))
    <div class="alert alert-success">

        {{ session()->get('success') }}

    </div>
@endif
    
    </div>
 
    <div class ='navbar navbar-light bg-ligh'>
    <nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div class="pt-2">
           <!-- Settings Dropdown -->
            <div class="pt-2">
                <button class="">
                    <div>{{ Auth::user()->name }}</div>
                </button>                       
                <button class="">
                    <div>{{ $user->todos->count() }} Tasks </div>
                 </button>
                 <div> {{ Auth::user()->email }}</div>

                    <!-- Authentication -->
            <x-slot name="content"> 
                <form method="POST" action="{{ route('logout') }}">
                         @csrf
                     <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                        {{ __('Log Out') }}           
                        </x-dropdown-link>
                    </form>
            </x-slot>
        </div>
    <!-- Responsive Navigation Menu -->
        <!-- Responsive Settings Options -->
        <div class="">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                 @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
        </div>
    </nav>
    </div>
</nav>
<div class="container">

    @yield('content')

</div>

<div class="container">
        @yield('body')
</div>
</body>
</html>