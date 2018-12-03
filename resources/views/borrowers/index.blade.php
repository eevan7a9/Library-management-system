@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="card custom-bg-color-light">
        @include('layouts.tableNav')
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="custom-font-cursive">Borrowers
                        @can('isLibrarian', Auth::user())
                            <small>you added</small>
                        @endcan
                        :<a href="borrowers/create"><button class="btn btn-success"><i class="fas fa-plus-square mr-1"></i>New</button></a></h1>
                </div>
                {{-- <div class="col-12 col-sm-6 float-right">
                    <input class="form-control" type="text" id="mySearchBar" onkeyup="filterTable()" placeholder="Search for names.." title="Type in a name">
                </div> --}}
            </div>
            <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book's Title</th>
                            <th scope="col">Borrowers Email</th>
                            <th scope="col"> Date to Return</th>
                            <th scope="col"> Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="custom-tbody">
                    <?php $n = 1;
                    ?>
                     @foreach ($borrowers as $item)
                            <tr>
                                <th scope="row">{{ $n++ }}</th>
                                <td>{{ str_limit($item->books->name, 25) }}</td>
                                <td>{{ str_limit($item->users->email, 15) }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>
                                    @if ($item->status > 0)
                                        <p class="text-danger">Not Returned</p>
                                    @elseif($item->status == 0)
                                        <p class="text-success">Returned</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status > 0)
                                        <a href="borrowers/{{ $item->id }}/edit" class="btn btn-success">Return<i class="fas fa-check-circle"></i></a>
                                    @elseif($item->status == 0)
                                        <a href="#" class="cursor_null"><button type="button" class="btn btn-secondary cursor_null" disabled>Return</button></a>
                                    @endif
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
<script>


      </script>
@endsection
