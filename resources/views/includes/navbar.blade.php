<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <a class="navbar-brand mx-3" href="#">Product Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('products.index') }}">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <span class="navbar-text mx-3 text-info">
            Your trusted product management solution
        </span>
    </div>
</nav>
