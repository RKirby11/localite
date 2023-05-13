@extends('layouts/user-pages')

@section('content')

<!-- Title -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 page-title">
            @if($friendstatus)
                <h1>Friend</h1>
            @else
                <h1>Fellow User</h1>
            @endif
        </div>      
    </div>
</div>
<br>

<div class="container">
    <div class="row account-info">

        <!-- Account details -->
        <div class="col-6">
            <h2>{{ $member->name }}</h2>
            <p>Age: {{ $member->age }}</p>
            <p>City: {{ $member->city }}</p>
            <p><b>Communities:</b>
                <ul>
                    @foreach($member->community as $community)
                        <li>{{ $community->name }}</li> 
                    @endforeach
                </ul>
            </p>
            <p><b>Skills to share:</b>
                <ul>
                @foreach($skillShare as $skillObj)
                    <li>{{ $skillObj->skill }}</li>
                @endforeach
                </ul>
            </p>
            <p><b>Skills to learn:</b>
                <ul>   
                @foreach($skillLearn as $skillObj)
                    <li>{{ $skillObj->skill }}</li>
                @endforeach
                </ul>
            </p>
            <h4>Bio:</h4>
            <p>{{ $member->bio }}</p>
        </div> 

        <!-- Account Avatar -->
        <div class="d-none d-lg-block col-md-4 offset-md-2 center my-auto">
            <img src="{{ asset($member->avatar) }}" class="avatar img-fluid rounded-circle" alt="Avatar">
        </div>        
    </div>

    <!-- Call for engagements with user -->
    <div class="row">
        <div class="col-12 center">
            
            <!-- If they are friends: (message or delete friend) -->
            @if($friendstatus)
                <button class="btn btn-purple">Message</button>
                <form action="{{ route('friends.destroy', $member->id) }}" method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                   <input class="btn btn-purple" type="submit" value="Unfriend"></input>   
                </form>

            <!-- If they are not friends: (add friend)-->
            @else                
                <a href="{{ route('friends.create', $member->id) }}"><button class="btn btn-purple">Add Friend</button></a>
            @endif
        </div>
    </div>
    <hr>
</div>


@endsection