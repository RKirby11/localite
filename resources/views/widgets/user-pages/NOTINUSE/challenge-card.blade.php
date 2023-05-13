<!-- NOT IN USE WIDGET -- was for challenges plan -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="card challenge-cards">
        <img class="card-img-top" src="{{ asset($img) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            <p>Description</p>
            <p>Closing Date</p>
            <a class=blacklink href="{{ route('challenge-entries') }}"><h6><u>Enter</u></h6></a>
        </div>
    </div>
</div>