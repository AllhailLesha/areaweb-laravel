<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Ларка</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.page.store') }}">Add Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.page.get') }}">create User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('addBook') }}">add Book</a>
                </li>
                @if(auth()->guard('manager')->guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manager-register.form') }}">Register manager</a>
                </li>
                @else
                    <form action="{{ route('manager-logout.action') }}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                @endif
            </ul>
            @if(auth()->guest())
            <div class="d-flex gap-2">
                <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                <a class="nav-link" href="{{ route('register.form') }}">Register</a>
            </div>
            @else
                <div class="d-flex gap-2">
                    <form action="{{ route('logout.action') }}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</nav>

