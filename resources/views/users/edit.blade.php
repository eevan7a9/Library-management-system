@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 custom-bg-color-light">
            <form action=" {{ url('users/'.$users->id) }} " method="POST">
                <div class="card-header custom-red">
                User's Info
                </div>

            <div class="row card-body">
                <div class="col-sm-6">
                    <dt>First name:</dt>
                    <input type="text" class="form-control" name="first_name" id="input_FirstName" value="{{ $users->first_name }}" readonly>
                </div>
                <div class="col-sm-6">
                    <dt>Last name:</dt>
                    <input type="text" class="form-control" name="last_name" id="input_LastName" value="{{ $users->last_name }}" readonly>
                </div>
            </div>
            <hr>
            <div class="row card-body">
                <div class="col-sm-6">
                    <dt>Usersname:</dt>
                    <input type="text" class="form-control" name="username" id="input_username" value="{{ $users->username }}" readonly>
                </div>
                <div class="col-md-6">
                    <dt>Email:</dt>
                    <input type="text" class="form-control" name="email" id="input_email" value="{{ $users->email }}" readonly>
                </div>

            </div>
            <div class="col-md-6">
                <dt>Created at:</dt>
                <dd class="text-capitalize">{{ $users->created_at }}</dd>
            </div>
            <hr>

            <div class="row card-body">
                @method('put')
                @csrf
                <div class="col-md-6">
                    <dt>Status:</dt>
                    <label for="status_active">Active</label>
                    <input type="radio" name="user_status" id="status_active" value="1" {{ $checked = ($users->status == 1) ? "checked" : "" }}><br>

                    <label for="status_inactive">Inactive</label>
                    <input type="radio" name="user_status" id="status_inactive" value="0" {{ $checked = ($users->status == 0) ? "checked" : "" }}><br>
                </div>
                <div class="col-md-6">
                    <dt>Role:</dt>
                    <label for="role_standard">Standard</label>
                    <input type="radio" name="user_type" id="role_standard" value="0" {{ $checked = ($users->user_type == 0) ? "checked" : "" }}><br>

                    <label for="role_librarian">Librarian</label>
                    <input type="radio" name="user_type" id="role_librarian" value="1" {{ $checked = ($users->user_type == 1) ? "checked" : "" }}><br>

                    <label for="role_admin">Admin</label>
                    <input type="radio" name="user_type" id="role_admin" value="2" {{ $checked = ($users->user_type == 2) ? "checked" : "" }}>
                </div>
            </div>
            <hr>
                <a href="/users"><button class="btn btn-custom mb-3 ml-3" type="button">Return</button></a>
                <button type="submit" class="btn btn-success mb-3 mr-3 float-right">Apply Changes</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
