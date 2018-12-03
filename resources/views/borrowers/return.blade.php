@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ url('return_index') }}" method="GET">
            @csrf
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                    <h4 class="card-title custom-font-cursive">Return Book</h4>
                    <hr>
                    <div class="form-group">
                        <label for="user">Borrowers Email</label>
                        <input type="text" name="email" id="user" class="form-control" >
                        <small id="name" class="text-muted">User's Email Address</small>
                    </div>
                    <div class="form-group">
                        <label for="book">Book's ISBN</label>
                        <input type="text" name="ISBN" id="book" class="form-control" >
                        <small id="name" class="text-muted">Borrowed Book</small>
                    </div>
                    <a href="/borrowers"><button class="btn btn-custom" type="button">Back</button></a>
                    <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fas fa-search"></i>Find
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
