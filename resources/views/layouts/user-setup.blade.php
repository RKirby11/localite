@extends('layouts/master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user-setup.css') }}">
@endsection

<!--Layout for user-setup forms-->
@section('body')
<body>
    <main>
        <div class="jumbotron setup-box">
           
            @section('content')
                This is where extending pages to user-setup post their content.
             @show

            <p>
                <a href="{{ route('landing') }}"><u>Go Back</u></a>
            </p>
        </div>
    </main>
@endsection