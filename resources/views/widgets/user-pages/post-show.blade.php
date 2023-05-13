<!--display posts on community postboard-->

<?php

use App\Models\User;

$member = User::where('id', $Post->user_id)->first();
?>

<div class="row post" id="postId">

    <!-- profile image -->
    <!-- <div class="col-1 profile-img" id="wow">
        <img src="{{ asset($member->avatar) }}" class="rounded-circle img-fluid" alt="Avatar">
    </div> -->

    <!-- post -->
    <div class="col-8">
        <p class="ids" hidden>{{ $Post->id }}</p>
        <p class="post-details"><b>{{ $member->name }}</b> ~ {{ $member->city }} ~ {{ $member->age }}</p>
        <p>{{ $Post->post_text }}</p>

        <!-- if the post does not belong to the current user, allow them to like or view poster profile -->
        @if($member->id != Auth::user()->id)
            <div class="row">
                <div class="col-5 col-md-3 col-xlg-2">
                    <form method="post" action="{{ route('post.likes.update', $Post->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn-sm btn-purple">Like</button>
                   </form>
                </div>
                <div class="col-5 col-md-3 col-xlg-2">
                    <a href="{{ route('friends.show', $member->id) }}"><button class="btn-sm btn-purple">View Profile</button></a>
                </div>
            </div>

        <!-- if the post does belong to the current user, allow them to edit it -->
        @else
            <div class="row">
                <div class="col-5 col-md-3 col-xlg-2">
                    <a href="{{ route('post.edit', ['communityId' => $communityId, 'postId' => $Post->id]) }}"><button class="btn-sm btn-purple">Edit</button></a>
                </div>
                <div class="col-5 col-md-3 col-xlg-2">
                    <form action="{{ route('post.destroy', ['communityId' => $communityId, 'postId' => $Post->id]) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn-sm btn-purple">Delete</button>   
                    </form>
                </div>
            </div>
        @endif
    </div>
    
    <!-- likes -->
    <div class="col-3 text-right">
        <p class="post-details">Likes: {{ $Post->likes }}</p>
    </div>
</div>
<hr>
