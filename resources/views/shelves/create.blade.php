@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('shelves') }}" method="POST">
            @csrf
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                    <h4 class="card-title custom-font-cursive">Add New Shelf</h4>
                    <hr>
                    <div class="form-group">
                        <label for="shelves" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="cateshelves" class="form-control" placeholder="ex. Evan" aria-describedby="NameId">
                        <small id="name" class="text-muted">Shelf Name</small>
                    </div>
                    <a href="/shelves"><button  type="button" class="btn btn-custom">Back</button></a>
                    <button class="btn btn-success float-right" type="submit" name="submit">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
