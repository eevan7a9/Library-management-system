@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
    <div class="container">
        <div class="card custom-bg-color-light">
            @include('layouts.tableNav')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h1 class="custom-font-cursive">Books
                            @can('isLibrarian', Auth::user())
                                <small>you added</small>
                            @endcan
                            :<a href="books/create"><button class="btn btn-success"><i class="fas fa-plus-square mr-1"></i>New</button></a></h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            {{-- <th scope="col">Category</th> --}}
                            <th scope="col">category</th>
                            <th scope="col">ISBN</th>
                            {{-- <th scope="col">Added by</th> --}}
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="custom-tbody">
                    <?php $n = 1; ?>
                    @foreach ($books as $book)
                        <tr>
                            <th scope="row">{{ $n++ }}</th>
                            <td>{{ str_limit($book->name, 25) }}</td>
                            <td>{{ str_limit($book->authors->name,11) }}</td>
                            {{-- <td>{{ $book->categories->name }}</td> --}}
                            <td>{{ str_limit($book->categories->name, 11) }}</td>
                            <td>{{ str_limit($book->ISBN, 11) }}</td>
                            {{-- <td>{{ $book->user->email }}</td> --}}
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
        </div>
    </div>
<script src="{{ asset('js/custom_script.js') }}" defer></script>
@endsection
