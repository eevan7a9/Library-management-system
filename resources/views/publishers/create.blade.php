@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('publishers') }}" method="POST">
                @csrf
                <div class="card text-left">
                    <div class="card-body custom-bg-color-light">
                        <h4 class="card-title custom-font-cursive">Add New Publisher</h4>
                        <hr>
                        <div class="form-group">
                            <label for="publisher" class="font-weight-bold">Name</label>
                            <input type="text" name="name" id="publisher" class="form-control" placeholder="ex. Evan" aria-describedby="NameId">
                            <small id="name" class="text-muted">Author Name</small>
                        </div>
                        <a href="/publishers"><button  type="button" class="btn btn-custom">Back</button></a>
                        <button class="btn btn-success float-right" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
