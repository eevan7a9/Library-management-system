@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="card custom-bg-color-light">
        @include('layouts.tableNav')
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="custom-font-cursive">Receives
                        @can('isLibrarian', Auth::user())
                            <small>you added</small>
                        @endcan
                        :<a href="return"><button class="btn btn-success"><i class="fas fa-plus-square mr-1"></i>New</button></a></h1>
                </div>
            </div>
            <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book's Title</th>
                            <th scope="col">Borrowers Email</th>
                            <th scope="col">Date Returned</th>
                            <!-- <th scope="col">Action</th> -->
                          </tr>
                        </thead>
                        <tbody class="custom-tbody">
                    <?php $n = 1;
                    ?>
                     @foreach ($receives as $item)
                            <tr>
                                <th scope="row">{{ $n++ }}</th>
                                <td>{{ str_limit($item->books->name, 25) }}</td>
                                <td>{{ str_limit($item->users->email, 15) }}</td>
                                <td>{{ $item->created_at }}</td>
                            <!--    <td>
                                <a href="borrowers/$item->id/edit" class="btn btn-success">Return</a>
                                </td>-->
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
