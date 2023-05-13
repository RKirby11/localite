@extends('layouts/master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/landing.css') }}">
@endsection

@section('body')

<!--Welcome section-->
<main id="landing">

    <div class="container" id="logo">
        <h1>Localite</h1>
    </div>
    <br>
    <div class="container" id="invite">
        <div class="row">
            <div class="col-md-6 my-auto">
                <h3>Share, learn, and grow with your local communities...
                    <a href="#explanatory"><span class="badge badge-pill badge-white">i</span></a>
                </h3>
                <br>

                <!--Links to start-->
                <a href="{{ route('register') }}" <button type="button" class="btn btn-orange">Create Account</button></a>
                <br>
                <a href="{{ route('login') }}" <button type="button" class="btn btn-white">Login</button></a>
            </div>
            <div class="col-md-6 my-auto">
                <img src="{{ asset('images/lightbulb.png') }}" class="img-fluid" id="landing-img" alt="Responsive image">
            </div>
        </div>
    </div>
</main>

<!-- section seperation -->
<section id="purple-line">
    <br><br><br>
</section>

<section id="yellow-line">
    <br><br><br>
</section>

<!--Further details section-->
<!-- Overview -->
<section id="explanatory" class="container">
    <div class="container section">
        <div class="row">
            <div class="col-md-4 my-auto">
                <img src="{{ asset('images/social.png') }}" class="img-fluid" id="explain1-img" alt="Responsive image">
            </div>
            <div class="col-md-8 my-auto">
                <h4>The hub for your favourite local communities</h4>
                <p>We believe that community is the key to growth.</p>
                <p>If you want to expand your skillsets,
                    share resources, take part in local competitions
                    and challenges, or simply engage with some like minded
                    people, localite is here to help.
                </p>
            </div>
        </div>
    </div>
    <hr>

    <!-- Pros of Localite -->
    <div class="container section">
        <div class="row">
            <div class="col-md-4 my-auto">
                <div>
                    <h4>Share</h4>
                    <p>Share events, resources, or even some of your time, to help others grow their skillset.</p>
                </div>
                <br>
                <div>
                    <h4>Learn</h4>
                    <p>Find people willing to share their knowledge to help you learn and grow.</p>
                </div>
            </div>
            <div class="col-md-4 d-none d-lg-block my-auto">
                <img src="{{ asset('images/puzzle.png') }}" class="img-fluid" id="explain2-img" alt="Responsive image">
            </div>
            <div class="col-md-4 d-block d-lg-none my-auto">
                <br>
            </div>
            <div class="col-md-4 my-auto">
                <div>
                    <h4>Engage</h4>
                    <p>Find, befriend, and engage with locals who have similar interests and hobbies to you.</p>
                </div>
                <br>
                <div>
                    <h4>Grow</h4>
                    <p>With your local community behind you, the opportunities for you to grow are endless!</p>
                </div>
            </div>
        </div>
        <a href="{{ route('register') }}"><button type="button" class="btn btn-orange">Get Started</button><br></a>
    </div>

</section>

<footer>
    <br><br>
</footer>

@endsection