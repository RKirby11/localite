<!--Community banner on home page-->
<div class="row community-banners">
    <div class="col-lg-6 my-auto community-titles">
        <h1>Your Local {{ $Community->name }} Community Postboard</h1>
        <br>
        <a href="{{ route('postboard', $Community->id) }}" <button type="button" class="btn btn-white">Go</button></a>
        <br>
        <a class="whitelink" href="{{ route('community.remove', $Community->id) }}">Leave Community</a>
    </div>
    <div class="col-lg-6 d-none d-lg-block my-auto community-images">
        <img src="{{ asset($Community->image) }}" class="img-fluid" alt="Responsive image">
    </div>
</div>