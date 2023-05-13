@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => 'Your Account'])

<div class="container">
    <!--Account Info -->
    <div class="row account-info">

        <!-- User Details -->
        <div class="col-6">
            <h2>Your Info</h2>
            <p><b>Username: </b>{{ Auth::user()->name }}</p>
            <p><b>Age: </b>{{ Auth::user()->age }}</p>
            <p><b>City: </b>{{ Auth::user()->city }}</p>
            <p><b>Email: </b>{{ Auth::user()->email }}</p>
            <p><b>Bio: </b>{{ Auth::user()->bio }}</p>
            <a href="{{ route('user.edit') }}" class="blacklink"><p>Edit Details</p></a>
            <hr>
            <p><b>Your Communities:</b>
                <ul>
                    @foreach(Auth::user()->community as $community)
                    <li>{{ $community->name }}</li>
                    @endforeach
                </ul>
            </p>
        </div>

        <!-- User Avatar -->
        <div class="col-12 col-lg-4 offset-lg-2 center my-auto">
            <img src="{{ asset(Auth::user()->avatar) }}" class="avatar img-fluid rounded-circle" alt="Avatar">
            <form method="post" action="{{ route('avatar.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarUpload" aria-describedby="fileHelp">
                </div>
                <button type="submit" class="btn btn-purple">Upload New Avatar</button>
            </form>
        </div>
    </div>

    <hr>

    <!-- Call to Action - Join Skill Share -->
    <div class="row">
        <div class="col-12 center">

            <!-- If already have account (visit)-->
            @if($skillshareExists)
            <h2 class="highlight">Your Skill Share Profile</h2>
            <p><b>Skills to share:</b>
                @foreach($skillShare as $skill)
                {{ $skill->skill }},
                @endforeach
            </p>
            <p><b>Skills to share:</b>
                @foreach($skillLearn as $skill)
                {{ $skill->skill }},
                @endforeach
            </p>
            <a href="{{ route('skillshare') }}"><button class="btn btn-orange">Head to Skill Share!</button></a>
           
            <!-- If don't have an account (create) -->
            @else
            <h2 class="highlight">Join Skill Share</h2>
            <br>
            <p>Want to expand your skilset? Got a skill you would be happy to share?
                Why not join skill share to find the locals in your community willing to
                collaborate so you can both grow...</p>
            <br>
            <a href="{{ route('skillshare.create') }}"><button class="btn btn-orange">Join!</button></a>
            @endif
        </div>
    </div>
    <hr>
</div>

<script>

</script>

@endsection