@extends('layouts/user-pages')

@section('content')

    @include('widgets/user-pages/title', ['title' => 'Friends' ])
    <!-- show index of all users friends -->
    <div class="container">
        <div class="row">
            @foreach($friends as $friend)
                <div class="col-4 col-md-3 col-lg-2 center">
                    <img src="{{ asset($friend->avatar) }}" class="rounded-circle img-fluid" alt="Avatar">
                    <p><br><a class='blacklink' href="{{ route('friends.show', $friend->id) }}">{{ $friend->name }}</a></p>
                </div>
            @endforeach
        </div>
    </div>
    <br>

@endsection