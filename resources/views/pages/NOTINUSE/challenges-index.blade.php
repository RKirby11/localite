<!--NOT IN USE PAGE - was going to add challenges for people to partake in-->

@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => 'Challenges' ])

<br>

<div class="container">
    <div class="row">
        @include('widgets/user-pages/challenge-card', ['title' => 'Bristol Art Challenge', 'img' => 'images/art.png'])  
        @include('widgets/user-pages/challenge-card', ['title' => 'Bristol Art Challenge', 'img' => 'images/art.png'])  
        @include('widgets/user-pages/challenge-card', ['title' => 'Bristol Art Challenge', 'img' => 'images/art.png'])  
    </div>
</div>
<br>

@endsection