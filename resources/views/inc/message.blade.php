@if (count($errors) > 0)
    @foreach ($errors->all() as $item)
        <div class="alert alert-danger">
            <p class="font-weight-bold">{{ $item }}</p>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger font-weight-bold">{{ session('error') }}</div>
@endif
