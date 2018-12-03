@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-left">
                <div class="card-body custom-bg-color-light">
                        <h4 class="card-title custom-font-cursive">Edit Current Book</h4>
                    <form action="/books/{{ $books->id }}" method="POST">
                        @method("put")
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $books->name }}">
                        </div>

                        <div class="form-group">
                            <label for="name">ISBN</label>
                            <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $books->ISBN }}">
                        </div>
                        <!--Number of Books -->
                  
                        <div class="row pl-2">
                            <div class="col-4 form-group">
                              <label for="">Total</label>
                              <input type="number" name="total" id="id2" class="form-control" value="{{$numbers->books_total_count}}" aria-describedby="Total" readonly>
                              <small id="helpId" class="text-muted">Total count</small>
                            </div>
                            <div class="col-4 form-group">
                                <label for="">Borrowed</label>
                                <input type="number" name="borrowed" id="id3" class="form-control is-invalid" value="{{$borrowed}}" aria-describedby="Borrowed Books" readonly>
                                <small id="helpId" class="text-muted">Borrowed by Users</small>
                              </div>
                              <div class="col-4 form-group">
                                <label for="">Available</label>
                                <input type="number" name="available" id="id1" class="form-control is-valid" min="0" value="{{$numbers->books_available}}" aria-describedby="Available Books">
                                <small id="helpId" class="text-muted">Available</small>
                              </div>

                        </div>
                        <!--End -->
                        <div class="form-group">
                            <label for="category">Category select</label>
                            <select class="custom-select" id="category" name="book_category">
                                <option value="{{ $books->category_id }}">{{ $books->categories->name }}</option>
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
                            <label for="author">Author select</label>

                            <select class="custom-select" id="author" name="book_author">
                                    <option value="{{ $books->author_id }}">{{ $books->authors->name }}</option>
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
                            <label for="custom-select">Publisher select</label>
                            <select class="custom-select" id="publisher" name="book_publisher">
                                    <option value="{{ $books->publisher_id }}">{{ $books->publishers->name }}</option>
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
                            <label for="shelf">Shelf select</label>
                            <select class="custom-select" id="shelf" name="book_shelf">
                                    <option value="{{ $books->shelf_id }}">{{ $books->shelves->name }}</option>
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
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="book_description" rows="3">{{ $books->book_description }}</textarea>
                        </div>
                            <div class="form-group">
                                <label for="key_word">Key word</label>
                                <input type="text" class="form-control" id="key_word" name="key_word" value="{{ $books->key_word }}">
                            </div>
                        <a href="/books"><button type="button" class="btn btn-custom">Back</button></a>
                        <button class="btn btn-success float-right" type="submit" name="submit">Apply Changes</button>
                    </form>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
var $borrowed = $('#id3');
var $total = $('#id2');
$('#id1').on('input', function() {
    $total.val(+$(this).val() + +$borrowed.val());
});
jQuery('#id1').bind('keypress', function(e) {
    e.stopPropagation();
});
</script>

@endsection
