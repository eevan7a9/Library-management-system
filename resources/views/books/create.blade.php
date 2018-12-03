@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card text-dark custom-bg-color-light">
          <div class="card-body">
            <h4 class="card-title custom-font-cursive">Add New Book</h4>
            <form action="{{ url('books') }}" method="POST">
                @csrf
                    <div class="form-group">
                      <label for="name" class="font-weight-bold">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                    </div>

                    <div class="form-group" >
                        <label for="name" class="font-weight-bold">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="number">
                    </div>

                    <div class="form-group">
                            <label for="no_of_books" class="font-weight-bold">No. of Books</label>
                            <input type="text" class="form-control" id="no_of_books" name="number_of_books" placeholder="number">
                        </div>

                    <div class="form-group">
                      <label for="category" class="font-weight-bold">Category select</label>
                      <select class="custom-select" id="category" name="book_category">
                            <option value="">Not available</option>
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                            <option value="">Not available</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="author" class="font-weight-bold">Author select</label>
                        <select class="custom-select" id="author" name="book_author">
                            <option value="">Not available</option>
                            @if (count($authors) > 0)
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            @else
                                <option value="">Not available</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="publisher" class="font-weight-bold">Publisher select</label>
                            <select class="custom-select" id="publisher" name="book_publisher">
                                <option value="">Not available</option>
                                @if (count($publishers) > 0)
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                @else
                                    <option value="">Not available</option>
                                @endif
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="shelf" class="font-weight-bold">Shelf select</label>
                        <select class="custom-select" id="shelf" name="book_shelf">
                            <option value="">Not available</option>
                            @if (count($shelves) > 0)
                                @foreach ($shelves as $shelf)
                                    <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                                @endforeach
                            @else
                                <option value="">Not available</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="description" class="font-weight-bold">Description</label>
                      <textarea class="form-control" id="description" name="book_description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="key_word" class="font-weight-bold">Key word</label>
                        <input type="text" class="form-control" id="key_word" name="key_word" placeholder="food, place, etc...">
                      </div>

                      <a href="/books"><button  type="button" class="btn btn-custom">Back</button></a>
                      <button class="btn btn-success float-right" type="submit" name="submit">Submit</button>
                  </form>
          </div>
        </div>
    </div>
    </div>
    </div>
@endsection
