@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => 'Skill Share' ])

<div class="container">
    <div class="row">
        <div class="col-12">
            
            <!--Encourage user to join-->
            <p>Want to expand your skilset? Got a skill you would be happy to share?
                Why not join skill share to find the locals in your community willing to
                collaborate so you can both grow...</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="jumbotron setup-box">

                <!--Skills form-->
                <p>Add a skill you're able to share:</p>
                @include('widgets/user-pages/skill-create', ['type' => 'share' ])
                <p>Add a skill you want to learn:</p>
                @include('widgets/user-pages/skill-create', ['type' => 'learn' ])

                <!--Begin-->
                <div class="center">
                    <a href="{{ route('skillshare') }}" ><button class="btn btn-orange btn-center">Start</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection