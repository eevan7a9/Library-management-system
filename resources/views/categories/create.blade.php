@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
        <form action="{{ url('categories') }}" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @csrf
                <div class="card text-left">
                    <div class="card-body custom-bg-color-light">
                        <h4 class="card-title custom-font-cursive">Add New Category</h4>
                        <hr>
                        <div class="form-group">
                            <label for="category" class="font-weight-bold">Name</label>
                            <input type="text" name="name" id="category" class="form-control" placeholder="ex. Evan" aria-describedby="NameId">
                            <small id="name" class="text-muted">Category Name</small>
                        </div>
                        <a href="/categories"><button  type="button" class="btn btn-custom">Back</button></a>
                        <button class="btn btn-success float-right" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
     </div>
@endsection
