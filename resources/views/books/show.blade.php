@extends((!isset(Auth::user()->id))? 'layouts.app': ((Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app'))
@section('content')
<div class="container">

    <div class="col-md-8 mx-auto">

        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body custom-bg-color-light">
                <h3 class="card-title font-weight-bold custom-font-cursive text-center">{{ $books->name }}</h3>
                <p class="card-text text-justify">{{ $books->book_description }}</p>
                <h6 class="card-text mt-3 ml-4">Written By:</h6>
                <h5 class="card-text font-weight-bold pl-4">{{ $books->authors->name }}</h5>
                <h6 class="card-text mt-3 ml-4">Published By:</h6>
                <h5 class="card-text font-weight-bold pl-4">{{ $books->publishers->name }}</h5>
                <h6 class="card-text mt-3 ml-4">Category:</h6>
                <h5 class="card-text font-weight-bold pl-4">{{ $books->categories->name }}</h5>
                <h6 class="card-text mt-3 ml-4">ISBN:</h6>
                <h5 class="card-text font-weight-bold pl-4">{{ $books->ISBN }}</h5>
                @auth
                <div class="form-group text-center">
                    <h6 class="card-text">Total Stock:</h6>
                    <h5 class="card-text font-weight-bold pl-4">{{ $books_number->books_total_count }}</h5>
                </div>
                <div class="form-group text-center">
                    <h6 class="card-text">Available Stock:</h6>
                    <h3 class="card-text font-weight-bold pl-4 text-success">{{ $books_number->books_available }}</h3>
                </div>
                <div class="form-group text-center">
                    <h6 class="card-text">Shelf located:</h6>
                    <h3 class="card-text font-weight-bold pl-4 text-success">{{ $books->shelves->name }}</h3>
                </div>
                @endauth
                @guest
                    <div class="form-group text-center">
                        <h3 class="text-primary"><a href="/login">More Info</a></h3>
                    </div>
                @endguest


            </div>
            <div class="card-footer text-muted">
                <a href="{{ URL::previous() }}"><button class="btn btn-custom mb-3">Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
