@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container custom-bg-color-light">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fas fa-users" style="font-size: 35px"></i>
                </div>
                <div class="mr-5">Registered Users:<br><h3 class="pl-3 font-weight-bold">{{ count($users) }}</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users/">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-book" style="font-size: 35px"></i>
                    </div>
                    <div class="mr-5">Registered Books:<br><h3 class="pl-3 font-weight-bold">{{ $books_count }}</h5>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="books/">
                <span class="float-left">View Details</span>
                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fas fa-book-reader" style="font-size: 35px"></i>
                </div>
                <div class="mr-5">Borrowed Books:<br><h3 class="pl-3 font-weight-bold">{{ count($borrowers) }}</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="borrowers/">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-archive" style="font-size: 35px"></i>
                    </div>
                    <div class="mr-5">Shelves:<br><h3 class="pl-3 font-weight-bold">{{ count($shelves) }}</h3></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="shelves">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
     <div class="table-responsive">
        <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">ISBN</th>
                <th scope="col">Added by</th>
                <th scope="col">Added at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="custom-tbody">
        <?php $n = 1; ?>
        @foreach ($books as $book)
            <tr>
                <th scope="row">{{ $n++ }}</th>
                <td>{{ str_limit($book->name, 25) }}</td>
                <td>{{ str_limit($book->ISBN, 11) }}</td>
                <td>{{ str_limit($book->user->email, 11) }}</td>
                <td>{{ $book->created_at }}</td>
                <td>
                    <a href="books/{{ $book->id }}"><button  class="btn btn-info"><i class="fas fa-eye"></i>View</button></a>
                    <a href="books/{{ $book->id }}/edit" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/custom_script.js') }}" defer></script>
@endsection
