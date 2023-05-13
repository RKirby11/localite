@extends('layouts/user-pages')

@section('content')

<div class="container-fluid">

    <!-- Links to user communities -->
    @foreach($userCommunities as $Community)
        @include('widgets/user-pages/community-card', ['Community' => $Community ])
    @endforeach
    
    <!-- Option to join more communities -->
    <div class="row community-banners">
        <div class="col-lg-6 my-auto community-titles">
            <h1>Join a new community!</h1>
            <br>
            <a href="{{ route('community.index') }}" <button type="button" class="btn btn-white">Join</button></a>
        </div>
        <div class="col-lg-6 d-none d-lg-block my-auto community-images">
            <img src="{{ asset('images/communities/all.png') }}" class="img-fluid" alt="Responsive image">
        </div>
    </div>

    <!-- Other navigation option cards (skill-share, friends, account) -->
    <div class="row home-options">
        <div class="col-6 col-lg-4 my-auto">
            @include('widgets/user-pages/home-option-card', ['img' => 'images/skill-share.svg', 'title' => 'Skill Share', 'link' => 'skillshare.create'])
        </div>
        <div class="col-6 col-lg-4 my-auto">
            @include('widgets/user-pages/home-option-card', ['img' => 'images/friends.svg', 'title' => 'Friends', 'link' => 'friends.index'])
        </div>
        <div class="d-none col-lg-4 d-lg-block offset-lg-0 my-auto">
            @include('widgets/user-pages/home-option-card', ['img' => 'images/account.svg', 'title' => 'Account', 'link' => 'account'])
        </div>
    </div>

</div>

@endsection