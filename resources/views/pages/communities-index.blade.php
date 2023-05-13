@extends('layouts/user-setup')

@section('content')

<h3>Hello $USER, what community would you like to join?</h3><br>

<!--Checkbox form for user to join communities-->
<div class="container">
    <form action="{{ route('community.add') }}" method="post">
        @csrf
        <div class="row" id="communityForm">
            @foreach($communities as $community)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class='form-unchecked'>
                    <input name="community_choices[]" type="checkbox" class="form-check-input
                                @error('community_choices') is-invalid @enderror" value="{{ $community->name }}">
                    <label class="form-check-label">{{ $community->name }}</label>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            @error('community_choices')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror('community_choices')
            <div class="col-12">
                <button type="submit" class="btn btn-orange btn-fluid">Go!</button>
            </div>
        </div>
    </form>
</div>

@endsection