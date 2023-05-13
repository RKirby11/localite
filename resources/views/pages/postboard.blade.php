@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => $Community->name . ' Community Postboard' ])

<br>
<div class="container posts" id="postboard">
    <p id="postLen" hidden>{{ count($Posts) }}</p>
    
    <!--User post form...-->
    <div class="row user-highlight ">
        <!-- <div class="col-1 profile-img">
            <img src="{{ asset(Auth::user()->avatar) }}" class="mx-auto img-fluid rounded-circle" alt="Account">
        </div> -->
        <div class="col-11">
            <form action="{{ route('post.store', $Community->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="postText" class="form-control" placeholder="Why not share any books, podcasts, or events you think your local {{ $Community->name }} community would like to hear about?" rows="3"></textarea>
                </div>
                @error('postText')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror('postText')
                <button type="submit" class="btn-sm btn-white">share</button>
            </form>
        </div>
    </div>

    <!--Other posts from community-->
    @foreach($Posts as $Post)
        @include('widgets/user-pages/post-show', [ 'Post' => $Post, 'communityId' => $Community->id ])
    @endforeach

    {{ $Posts->links() }}
</div>
<br>
@endsection