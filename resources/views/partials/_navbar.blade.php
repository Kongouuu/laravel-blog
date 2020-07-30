<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <!-- Add active state for current page -->
            <li class="nav-item {{ Request::is('/')?"active":"" }}">
                <a class="nav-link" href="/">Home </a>
            </li>
            <li class="nav-item {{ Request::is('about')?"active":"" }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact')?"active":"" }}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            <!-- for testing only -->
            <li class="nav-item {{ Request::is('posts')?"active":"" }}">     
                <a class="nav-link" href="/posts">Posts</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>