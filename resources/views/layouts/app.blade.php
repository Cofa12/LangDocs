<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{asset('/css/card.css')}}" rel="stylesheet">

</head>
<body>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('posts.index')}}">LangDocs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('publishers.show')}}">Publishers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.logout')}}">
                        <img src="{{asset('prog_images/icons/logout.svg')}}">
                    </a>
{{--                    <form action="{{route('profile.logout')}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <button style="background:none;border: none;outline: none" type="submit"><img src="{{asset('prog_images/icons/logout.svg')}}"></button>--}}
{{--                    </form>--}}
                </li>
                <li class="nav-item">
                    <form class="d-flex" role="search" method="POST" action="{{route('posts.search')}}">
                        @csrf
                        <input class="form-control me-2" name= "search_tag" type="search" placeholder="Search By Name" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('profile.index')}}">
                       @yield('profileImage')
                    </a>
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                    </ul>--}}
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



