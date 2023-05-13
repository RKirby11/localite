<!--Form for adding share or learn skills to user skillshare profile-->
<form action="{{ route('skillshare.store', $type) }}" method="post">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-10">
                <input name="skill" type="text" class="form-control @error('skill') is-invalid @enderror" placeholder="e.g. watercolour painting">
                @error('skill')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror('skill')
            </div>
            <div class="col-2 align-bottom">
                <button type="submit" class="btn-sm btn-white">Add</button>
            </div>
        </div>
    </div>
</form>