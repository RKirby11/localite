@extends('layouts/master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/user-pages.css') }}">
@endsection

@section('body')

<!-- Navbar once logged in -->
<nav class="navbar navbar-expand-md navbar-light justify-content-between">
    <a class="navbar-brand" href="{{ route('home')}}">Localite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <!-- Home -->
            @include('widgets/user-pages/nav-link', ['title' => 'Home', 'link' => 'home'])

            <!-- All postboards in dropdown -->
            <li class="nav-item nav-text dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Postboards</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach(Auth::user()->community as $community)
                        <a class="dropdown-item" href="{{ route('postboard', $community->id) }}">{{ $community->name }}</a>
                    @endforeach
                </div>
            </li>

            <!-- Other Key Pages (skillshare, friends, account) -->
            @include('widgets/user-pages/nav-link', ['title' => 'SkillShare', 'link' => 'skillshare'])
            @include('widgets/user-pages/nav-link', ['title' => 'Friends', 'link' => 'friends.index'])
            @include('widgets/user-pages/nav-link', ['title' => 'Account', 'link' => 'account'])

            <!-- Logout -->
            <li class="nav-item nav-text">
                <a class="nav-link my-auto" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Extended by pages-->
@section('content')
    This is where extending pages to user-pages post their content.
@show

<footer>
    <br><br>
</footer>

@endsection