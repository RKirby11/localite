@extends('layouts/user-setup')

@section('content')

<h1 class="display-4">Create Account</h1><br>

<div id="register">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!--name-->
        <div class="form-group">
            <input id="name" type="text" class="form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('username') }}" placeholder="Username" autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span
            @enderror
        </div>
        
        <!--age-->
        <div class="form-group">
            <input id="age" type="number" class="form-control-lg  @error('age') is-invalid @enderror" name="age" placeholder="Age" autocomplete="age" v-model.number="age">
            <p class='warning' v-show="ageWarning">You must be older than 16 to join Localite</p>
            @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- :class="{'is-invalid': ageWarning}" -->
        <!--city-->
        <div class="form-group">
            <input id="city" type="text" class="form-control-lg @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" placeholder="City" autocomplete="city">
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!--email-->
        <div class="form-group">
            <input id="email" type="email" class="form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!--password-->
        <div class="form-group">
            <input id="password" type="password" class="form-control-lg  @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password" v-model='password'>
            <p class='warning'>
                <span v-if="passwordStrength == 'weak'">Weak</span>
                <span id='medium' v-else-if="passwordStrength == 'medium'">Medium</span>
                <span id='strong' v-else-if="passwordStrength == 'strong'">Strong</span>
                <span v-else></span>
            </p>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!--password check-->
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control-lg" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" v-model='passwordCheck'>
            <p class='warning' v-show='passwordCheckWarning'>This password does not match</p>
        </div>
        <button type="submit" class="btn btn-orange">Go!
            <!--{{ __('Register') }}--></button>
    </form>
</div>

    <p>Already got an Account?
        <a href="{{ route('login') }}"><u>Log In</u></a>
    </p>

    <script>
        var register = new Vue({
            el: "#register", //element
            data: function() {
                return {
                    age: '',
                    ageIsModified: false,

                    password: '',
                    passwordStrength: '',

                    passwordCheck: '',
                    passwordCheckIsModified: false,
                };
            },
            watch: {
                age: function () {
                    this.ageModified();
                },
                password: function () {
                    this.passwordModified();
                },
                passwordCheck: function () {
                    this.passwordCheckModified();
                } 
            },
            computed: {
                ageWarning: function () {
                    return this.ageIsModified && this.age < 16;
                },
                passwordCheckWarning: function () {
                    return this.passwordCheckIsModified && (this.passwordCheck != this.password);
                },
            },
            methods: {
                ageModified: function () {
                    this.ageIsModified = true;
                },
                passwordModified: function() {
                    if(this.password.length >= 8){ this.passwordStrength = 'strong'; }
                    else if(this.password.length >= 6){ this.passwordStrength = 'medium'; }
                    else if(this.password.length != ""){ this.passwordStrength = 'weak'; }
                    else{ this.passwordStrength = 'null'; }
                },
                passwordCheckModified: function () {
                    this.passwordCheckIsModified = true;
                }
            }
        });
    </script>

    @endsection