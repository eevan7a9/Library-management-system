@extends((!isset(Auth::user()->id))? 'layouts.app': ((Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app'))
@section('content')
<div class="container custom-bg-color-light pt-5 pb-5">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="searched" method="GET">
                    @csrf
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control pb-2" name='books' id="mySearchBar" onkeyup="filterTable()" placeholder="Search for Books.." title="Type in a Book's Title">
                            <div class="input-group-append">
                                <button class="btn btn-success" id="btn_find">Find</button>
                            </div>
                        </div>
                    </form>
                    <small class="text-secondary">Book's: Title, ISBN, key words</small>
                </div>
            </div>
        </div>
    </div>
    @if (isset($searching))
    <div class="mt-5">
       <div class="">
           <div class="row">
               @foreach ($books as $item)
                    <div class="col-md-4 mt-3">
                        <div class="card center">
                          <div class="card-body">
                            <a href="books/{{ $item->id }}"><h4 class="card-title">{{ $item->name }}<i class="fas fa-info-circle ml-1"></i></h4></a>
                            <p class="text-weight-800">{{ $item->ISBN }}</p>
                            <p class="text-weight-800">{{ $item->authors->name }}</p>
                            <p class="card-text">{{ str_limit($item->book_description, 80) }}</p>
                          </div>
                        </div>
                    </div>
               @endforeach
           </div>
       </div>
    </div>
    @endif
    @if (isset($searching) && count($books) == 0)
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body text-center">
               <h1>Sorry Could'nt Find Any. . .</h1>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    @endif
</div>
@endsection
