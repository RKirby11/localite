@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => 'Edit Your Post' ])

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron setup-box">
                
                <!-- Edit user details -->
                <form action="{{ route('post.update', ['communityId' => $communityId, 'postId' => $post->id ]) }}" method='post'>
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                        <label for="postText">Your Post:</label>
                        <textarea name="postText" class="form-control @error('postText') is-invalid @enderror" rows="3">{{ $post->post_text }}</textarea>
                        @error('postText')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror('postText')
                    </div>
                    <button type="submit" class="btn-sm btn-white">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection