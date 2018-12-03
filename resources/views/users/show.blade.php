@extends( (Auth::user()->user_type == 2) ? 'layouts.admin' : 'layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 custom-bg-color-light">
                <div class="card-header custom-red">
                User's Info
                </div>

                <div class="row card-body">
                    <div class="col-4">
                        <p class="font-weight-bold  float-right custom-font-cursive text-uppercase">name:</p>
                    </div>
                    <div class="col-8 bg-secondary">
                        <p class="custom-font-cursive font-ghost text-capitalize">{{ $users->first_name.' '.$users->last_name }}</p>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-4">
                        <p class="font-weight-bold  float-right custom-font-cursive text-uppercase">email:</p>
                    </div>
                    <div class="col-8 bg-secondary">
                        <p class="custom-font-cursive font-ghost text-capitalize">{{ $users->email }}</p>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-4">
                        <p class="font-weight-bold  float-right custom-font-cursive text-uppercase">username:</p>
                    </div>
                    <div class="col-8 bg-secondary">
                        <p class="custom-font-cursive font-ghost text-capitalize">{{ $users->username }}</p>
                    </div>
                </div>
                 <div class="row card-body">
                    <div class="col-4">
                        <p class="font-weight-bold  float-right custom-font-cursive text-uppercase">user type:</p>
                    </div>
                    <div class="col-8 bg-secondary">
                        <p class="custom-font-cursive font-ghost text-capitalize">
                            @if ($users->user_type == 0)
                                standard
                            @elseif($users->user_type == 1)
                                librarian
                            @elseif($users->user_type == 2)
                                admin
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-6">
                        <p class="font-weight-italic  float-right custom-font-cursive text-uppercase">current borrowed books:</p>
                    </div>
                    <div class="col-6 bg-secondary">
                        <p class="custom-font-cursive font-ghost text-capitalize">{{ count($borrowed) }}</p>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-6">
                        <p class="font-weight-italic  float-right custom-font-cursive text-uppercase">total borrowed books:</p>
                    </div>
                    <div class="col-6 bg-secondary">
                        <p class="custom-font-cursive font-ghost text-capitalize">{{ count($total_borrowed) }}</p>
                    </div>
                </div>
                <hr>
                <a href="/users"><button class="btn btn-custom mb-3 ml-3" type="button">Return</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
