@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
    <div class="container custom-bg-color-light">
        <br>
        <div class="card text-left mb-5">
            <div class="card-body">
                <h2 class="card-title font-weight-bold">Account Info</h2>
                <div class="row">
                    <div class="col-6 col-sm-4">
                        <dt>First Name:</dt>
                        <div class="form-group">
                          <input type="text" class="form-control text-capitalize" value="{{ $users->first_name }}" aria-describedby="helpId" readonly>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4">
                        <dt>Last Name:</dt>
                        <div class="form-group">
                            <input type="text" class="form-control text-capitalize" value="{{ $users->last_name }}" aria-describedby="helpId" readonly>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4">
                        <dt>Username:</dt>
                        <div class="form-group">
                            <input type="text" class="form-control text-capitalize" value="{{ $users->username }}" aria-describedby="helpId" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <dt>Email:</dt>
                        <div class="form-group">
                            <input type="text" class="form-control text-capitalize" value="{{ $users->email }}" aria-describedby="helpId" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <dt>Account Type:</dt>
                        <?php
                            if ($users->user_type == 2) {
                               $user_type = "admin";
                            } elseif($users->user_type == 1){
                                $user_type = "librarian";
                            }else{$user_type = "standard";}
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-control text-capitalize" value="{{ $user_type }}" aria-describedby="helpId" readonly>
                        </div>
                    </div>
                </div>
                <a  href="/accounts/{{ $users->id }}/edit" <button class="btn btn-primary float-right"><i class="fas fa-user-edit"></i>Edit Info</button></a>
            </div>
        </div>
        <hr>
        <h5>You're Activity</h5>
        <div class="row">
    @if ($users->user_type > 0)
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body justify-content-center ">
                        <i class="fas fa-user-tie" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Added Authors :<br>
                        <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#AuthorsModal">
                            {{ count($authors) }}
                        </button></h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-layer-group" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Added Categories:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#CategoriesModal">
                                {{ count($categories) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-file-upload" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Added Publishers:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#PublishersModal">
                                {{ count($publishers) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-archive" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Added Shelves:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#ShelvesModal">
                                {{ count($shelves) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
           
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-book" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Added Books:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#BooksAddedModal">
                            {{ count($books) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
             <div class="col-12 col-sm-6 col-md-3 mb-2">
                    <div class="card text-center">
                        
                        <div class="card-body">
                            <i class="fas fa-share-square" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Issued Books:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#BooksIssuedModal">
                                {{ count($issued) }}
                            </button>
                        </h5>
                    </div>
                </div>
                </div>
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-undo-alt" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Received Books:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#BooksReceivesModal">
                            {{ count($receives) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
        @endif
        </div>
    <hr>
    <h4>Borrowed</h4>
    <div class="row">
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-book-reader" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Borrowed Books Total:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#BooksBorrowedModal">
                            {{ count($borrowers) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-check-circle" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">All Returned Books:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#ReturnBorrowedModal">
                            {{ count($borrowed_returned) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-2">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <i class="fas fa-exclamation-triangle" style="font-size: 36px"></i>
                        <h5 class="card-title text-capitalize font-weight-bold">Not Returned Books:<br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#CurrentlyBorrowedModal">
                            {{ count($currently_borrowed) }}
                            </button>
                        </h5>
                    </div>
                </div>
            </div>


        </div>



<!--                        BooksBorrowed Modal                                          -->
<div class="modal fade" id="BooksBorrowedModal" tabindex="-1" role="dialog" aria-labelledby="BooksBorrowedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title  font-ghost" id="BooksBorrowedModalLabel">Book's You Borrowed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($borrowers as $borrowed)
                    <li>{{ $borrowed->books->name }}</li>
                @endforeach
            </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--                        ReturnBorrowed Modal                                          -->
<div class="modal fade" id="ReturnBorrowedModal" tabindex="-1" role="dialog" aria-labelledby="ReturnBorrowedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="ReturnBorrowedModalLabel">Returned Books</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($borrowed_returned as $borrowed)
                    <li>{{ $borrowed->books->name }}</li>
                @endforeach
            </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--                        currentlyBorrowed Modal                                          -->
<div class="modal fade" id="CurrentlyBorrowedModal" tabindex="-1" role="dialog" aria-labelledby="CurrentlyBorrowedModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="CurrentlyBorrowedModalLabel">Not Returned Books</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($currently_borrowed as $borrowed)
                    <li>{{ $borrowed->books->name }}</li>
                @endforeach
            </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--                        Authors     Modal                                            -->
<div class="modal fade" id="AuthorsModal" tabindex="-1" role="dialog" aria-labelledby="AuthorsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="AuthorsModalLabel">Authors You Added</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($authors as $author)
                    <li>{{ $author->name }}</li>
                @endforeach
            </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--                        Categories    Modal                                            -->
<div class="modal fade" id="CategoriesModal" tabindex="-1" role="dialog" aria-labelledby="CategoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="CategoriesModalLabel">Categories You Added</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--                        Publishers    Modal                                            -->
<div class="modal fade" id="PublishersModal" tabindex="-1" role="dialog" aria-labelledby="PublishersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header custom-red">
                    <h5 class="modal-title font-ghost" id="PublishersModalLabel">Publishers You Added</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @foreach ($publishers as $publisher)
                            <li>{{ $publisher->name }}</li>
                        @endforeach
                    </div>
                <div class="modal-footer custom-bg-color-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!--                        Shelves    Modal                                            -->
<div class="modal fade" id="ShelvesModal" tabindex="-1" role="dialog" aria-labelledby="ShelvesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="ShelvesModalLabel">Shelves You Added</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach ($shelves as $shelf)
                        <li>{{ $shelf->name }}</li>
                    @endforeach
                </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--                        BooksIssued    Modal                                            -->
<div class="modal fade" id="BooksIssuedModal" tabindex="-1" role="dialog" aria-labelledby="BooksIssuedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="BooksIssuedModalLabel">Book's You Issued</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach ($issued as $item)
                        <li>{{ $item->books->name }}-<small>{{ $item->books->created_at }}</small></li>
                    @endforeach
                </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--                        BooksAdded   Modal                                            -->
<div class="modal fade" id="BooksAddedModal" tabindex="-1" role="dialog" aria-labelledby="BooksAddedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="BooksAddedModalLabel">Book's You Added</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach ($books as $item)
                    <li>{{ $item->name }}</li>
                    @endforeach
                </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="BooksReceivesModal" tabindex="-1" role="dialog" aria-labelledby="BooksReceivesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header custom-red">
                <h5 class="modal-title font-ghost" id="BooksReceivesModalLabel">Book's You Received</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach ($receives as $item)
                    <li>{{ $item->books->name }}-<small>{{ $item->books->created_at }}</small></li>
                    @endforeach
                </div>
            <div class="modal-footer custom-bg-color-light">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@endsection
