@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
   <form action="{{ url('categories/'.$categories->id) }}" method="POST">
    @method("put")
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                    <h4 class="card-title custom-font-cursive">{{ __("EDIT CATEGORIES") }}</h4>
                    <hr>
                    <div class="form-group">
                        <label for="categories" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="categories" class="form-control" value="{{ $categories->name }}" aria-describedby="NameId">
                        <small id="name" class="text-muted">Category title</small>
                    </div>
                    <div class="form-group">
                        <label for="status" class="font-weight-bold">Status</label>
                        <label class="switch">
                                <input type="checkbox" id="status" name="status" value="1" {{ $checked = ($categories->status == 1) ? 'checked': '' }}>
                                <span class="slider round"></span>
                              </label>
                        </div>
                    <a href="/categories"><button type="button" class="btn btn-custom">Back</button></a>
                    <button class="btn btn-success float-right" type="submit" name="submit">Apply Changes</button>
                </div>
            </div>
        </div>
    </div>
   </form>

</div>
@endsection
