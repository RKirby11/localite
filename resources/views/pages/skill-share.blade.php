@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => 'Skill Share' ])

<div class="container posts">
    
    <!-- User skill share profile -->
    <div class="row user-highlight ">
        <div class="col-1 profile-img">
            <img src="{{ asset(Auth::user()->avatar) }}" class="mx-auto img-fluid rounded-circle" alt="Account">
        </div>
        <div class="col-11">
            <p class="post-details">Your Profile</h6>
                @if(Auth::user()->bio != '')
                <p><b>Bio: </b>{{ Auth::user()->bio }}</p>
                @endif
                <p><b>Sharing:</b>
                    @foreach($skillShare as $skill)
                    {{ $skill->skill }},
                    @endforeach
                </p>
                <p><b>Learning:</b>
                    @foreach($skillLearn as $skill)
                    {{ $skill->skill }},
                    @endforeach
                </p>
        </div>
    </div>

    <!-- Other skill share profiles -->
    @foreach($relatedMembers as $member)
        @include('widgets/user-pages/skill-profile', $member)
    @endforeach

</div>
<br>

@endsection