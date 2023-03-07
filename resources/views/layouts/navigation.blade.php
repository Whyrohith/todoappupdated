@extends('layouts.todoprofile')
@section('title')
    Todo
@endsection
@section('content')
<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div class="pt-2">

           <!-- Settings Dropdown -->
            <div class="pt-2">
                <x-dropdown align="left" width="60">
                    <x-slot name="trigger">
                        <button class="btn btn-primary">
                            <div>{{ Auth::user()->name }}</div>
                        </button>                       
                        <button class="">
                        <div>TO DO LIST </div>
                         </button>

                    </x-slot>
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
                </x-dropdown>
            </div>

    <!-- Responsive Navigation Menu -->
        <!-- Responsive Settings Options -->
        <div class="">
            <div class="">
                <div class="">{{ Auth::user()->name }}</div>
                <div class="">{{ Auth::user()->email }}</div>
            </div>
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
        </div>
    </div>
</nav>
@endsection
