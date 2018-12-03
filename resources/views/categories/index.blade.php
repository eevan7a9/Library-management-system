@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="card custom-bg-color-light">
        @include('layouts.tableNav')
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="custom-font-cursive">Categories
                        @can('isLibrarian', Auth::user())
                            <small>you added</small>
                        @endcan
                        :<a href="categories/create"><button class="btn btn-success"><i class="fas fa-plus-square mr-1"></i>New</button></a></h1>
                </div>
            </div>
        <div class="table-responsive">
        <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Added by</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="custom-tbody">
        <?php $n = 1; ?>
        @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $n++ }}</th>
                    <td>{{ $category->name }}</td>
                    @if ($category->status == 1)
                        <td class="font-weight-bold text-success">Available</td>
                    @else
                        <td class="font-weight-bold text-danger">Not Available</td>
                    @endif
                    <td>{{ $category->user->username }}</td>
                    <td><a href="categories/{{ $category->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a></td>
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
