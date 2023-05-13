<?php
    $skillShare = [];
    $skillLearn = [];
    foreach($member->skills as $skill){
        if($skill->type == 'learn'){ $skillLearn[] = $skill->skill; }
        else{ $skillShare[] = $skill->skill; }
    }
?>

<!--Shows profiles on skill share-->
<div class="row post">
    <div class="col-1 profile-img">
        <img src="{{ asset($member->avatar) }}" class="rounded-circle img-fluid" alt="Account">
    </div>
    <div class="col-11">
        <p class="post-details">{{ $member->name }} ~ {{ $member->city }} ~ {{ $member->age }}</p>
        <p><b>Bio: </b>{{ $member->bio }}</p>
        <p><b>Sharing: </b>
            @foreach($skillShare as $skill)
                {{ $skill }}, 
            @endforeach 
        </p>
        <p><b>Learning: </b>
            @foreach($skillLearn as $skill)
                {{ $skill }}, 
            @endforeach 
        </p>
        </p>
        <a href="{{ route('friends.show', $member->id) }}" ><button class="btn-sm btn-purple">View Profile</button></a>
    </div>
</div>
<hr>