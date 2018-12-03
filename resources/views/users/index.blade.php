@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
        <div class="card custom-bg-color-light">
            @include('layouts.tableNav')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h1 class="custom-font-cursive">Users:</h1>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="custom-tbody">
                    <?php $n = 1; ?>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $n++ }}</th>
                            <td>{{ $user->username}}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-capitalize">
                               @if ($user->user_type == 0)
                                    Standard
                               @elseif($user->user_type == 1)
                                    Librarian
                               @elseif($user->user_type == 2)
                                    Admin
                               @endif

                            </td>
                            <td>
                                @if ($user->status == 1)
                                    <p class="text-success font-weight-bold">Active</p>
                                @else
                                    <p class="text-danger font-weight-bold">Inactive</p>
                                @endif
                            </td>
                            <td>
                                <a href="users/{{ $user->id }}" class="btn btn-info"><i class="fas fa-eye"></i>View</a>
                                <a href="users/{{ $user->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
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
