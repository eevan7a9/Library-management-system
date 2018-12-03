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
                            <input type="text" name="email" id="user" class="form-control" value="{{ $borrowers->users->email }}" readonly>
                            <small id="name" class="text-muted">User's Email Address</small>
                        </div>
                        <div class="form-group">
                            <label for="user">Book's Title</label>
                            <input type="text" name="name" id="user" class="form-control" value="{{ $borrowers->books->name }}" readonly>
                            <small id="name" class="text-muted">Book's Name</small>
                        </div>
                        <div class="form-group">
                            <label for="book">Book's ISBN</label>
                            <input type="text" name="ISBN" id="book" class="form-control" value="{{ $borrowers->books->ISBN }}" readonly>
                            <small id="name" class="text-muted">Borrowed Book</small>
                        </div>
                        {{--  <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label for="num_book">Number of Books</label>
                                <input type="text" name="book_count" id="num_book" class="form-control" value="{{ $borrowers->number_of_books }}" readonly>
                                <small id="name" class="text-muted"></small>
                            </div>
                        </div>  --}}
                            <a href="{{ URL::previous() }}"><button class="btn btn-custom mb-3" type="button">Back</button></a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">
                                                 Return<i class="fas fa-check-circle"></i>
                            </button>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header custom-red">
                    <h5 class="modal-title font-weight-bold font-ghost" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle mr-2"></i>Warning!!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body custom-bg-color-light">
                        <h4 class="font-weight-bold text-capitalize">Are you sure?</h4>
                        <h6>Did you check the Book's Title?</h6>
                        <h6>Did you check the ISBN number?</h6>
                        <p>To confirm this action please Enter you're PASSWORD</p>
                        <input type="password" name="password" id="user" class="form-control" placeholder="Librarian/Admin PASSWORD" required>
                    </div>
                    <div class="modal-footer float-left">
                        <button type="button" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" name="submit" type="submit">Continue</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
