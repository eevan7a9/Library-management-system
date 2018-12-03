@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ url('borrowers') }}" method="POST">
        @csrf
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                    <h4 class="card-title custom-font-cursive">New Issue</h4>
                    <hr>
                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Borrowers Email</label>
                        <input type="text" name="email" id="user" class="form-control" placeholder="user@email.com" aria-describedby="NameId">
                        <small id="name" class="text-muted">User's Email Address</small>
                    </div>
                    <div class="form-group">
                        <label for="book" class="font-weight-bold">Book's ISBN</label>
                        <input type="text" name="ISBN" id="book" class="form-control" placeholder="000-100-100" aria-describedby="NameId">
                        <small id="name" class="text-muted">Borrowed Book</small>
                    </div>
                    <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="return_book" class="font-weight-bold">Return Date</label>
                        <input type="date" name="return_date" id="return_book" class="form-control" placeholder="0" aria-describedby="NameId">
                        <small id="name" class="text-muted"></small>
                    </div>
                    </div>
                    <a href="/borrowers"><button  type="button" class="btn btn-custom">Back</button></a>
                    <button class="btn btn-success float-right" type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
