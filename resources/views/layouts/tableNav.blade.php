@can('isLibrarian')
<nav class="navbar navbar-expand-md navbar-light custom-red">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('borrowers') ? 'active_link' : '' }}" href="{{ url('borrowers') }}">Borrowers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('receives') ? 'active_link' : '' }}" href="{{ url('receives') }}">Received</a>
            </li>
             <li class="nav-item">
                <a class="nav-link {{ Request::is('books') ? 'active_link' : '' }}" href="{{ url('books') }}">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('authors') ? 'active_link' : '' }}" href="{{ url('authors') }}">Authors</a>
            </li>
             <li class="nav-item">
                <a class="nav-link {{ Request::is('categories') ? 'active_link' : '' }}" href="{{ url('categories') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('shelves') ? 'active_link' : '' }}" href="{{ url('shelves') }}">Shelves</a>
            </li>
        </ul>
    </div>
</nav>
@endcan
