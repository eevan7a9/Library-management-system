@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php
                 if (!isset($borrowers->id)) {
            redirect('home');
        }
                ?>
        <form action="{{ url('borrowers/'.$borrowers->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                    <h4 class="card-title custom-font-cursive">Return Book</h4>
                    <hr>
                        <div class="form-group">
                            <label for="user">Borrowers Email</label>
                            <input type="text" name="email" id="user" class="form-control" value="{{ $borrowers->users->email }}" disabled>
                            <small id="name" class="text-muted">User's Email Address</small>
                        </div>
                        <div class="form-group">
                            <label for="user">Book's Title</label>
                            <input type="text" name="name" id="user" class="form-control" value="{{ $borrowers->books->name }}" disabled>
                            <small id="name" class="text-muted">Book's Name</small>
                        </div>
                        <div class="form-group">
                            <label for="book">Book's ISBN</label>
                            <input type="text" name="ISBN" id="book" class="form-control" value="{{ $borrowers->books->ISBN }}" disabled>
                            <small id="name" class="text-muted">Borrowed Book</small>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label for="num_book">Number of Books</label>
                                <input type="text" name="book_count" id="num_book" class="form-control" value="{{ $borrowers->number_of_books }}" disabled>
                                <small id="name" class="text-muted"></small>
                            </div>
                        </div>
                            <a href="{{ URL::previous() }}"><button class="btn btn-custom mb-3" type="button">Back</button></a>
                            <button class="btn btn-success float-right" type="submit" name="submit">Proceed</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
