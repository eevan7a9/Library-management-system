@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
   <form action="{{ url('authors/'.$authors->id) }}" method="POST">
    @method("put")
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                    <h4 class="card-title custom-font-cursive">{{ __("EDIT AUTHOR") }}</h4>
                    <hr>
                    <div class="form-group">
                        <label for="author" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="author" class="form-control" value="{{ $authors->name }}" aria-describedby="NameId">
                        <small id="name" class="text-muted">Author Name</small>
                    </div>
                    <a href="/authors"><button type="button" class="btn btn-custom">Back</button></a>
                    <button class="btn btn-success float-right" type="submit" name="submit">Apply Changes</button>
                </div>
            </div>
        </div>
    </div>
   </form>

</div>
@endsection
