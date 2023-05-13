@extends('layouts/user-pages')

@section('content')

@include('widgets/user-pages/title', ['title' => 'Edit Your Account' ])

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron setup-box">

                <!-- Edit user details -->
                <form action="{{ route('user.update') }}" method="post">
                    {{ method_field('PUT') }}
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ Auth::user()->city }}">
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ Auth::user()->age }}">
                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Bio -->
                    <div class="form-group">
                        <label for="bio">Tell other users a bit about you!..</label>
                        <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ Auth::user()->bio }}</textarea>
                        @error('bio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror('bio')
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-sm btn-white">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection