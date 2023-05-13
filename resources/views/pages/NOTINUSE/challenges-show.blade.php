<!--NOT IN USE PAGE - was going to add challenges for people to partake in-->

@extends('layouts/user-pages')

@section('content')

    @include('widgets/user-pages/title', ['title' => 'Bristol Art Challenge' ])

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Description</p>
            </div>
            <div class="col-12">
                <p>Closing Date</p>
            </div>
            <div class="col-12 center">
                <h5 class='highlight'>Submit your entry!</h5>
            </div>
            <div class="col-12 center">
                <form>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-grey">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <br>

@endsection