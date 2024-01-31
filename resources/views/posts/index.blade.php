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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">LangDocs</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div style="width: fit-content;height: fit-content;padding:20px">
{{--@dd($posts)--}}
    @foreach($posts as $post)
    <div class="col-md-4" style="width: 18rem;text-decoration: none;display: inline-block;margin-top: 20px;margin-right: 6px">
        <div class="content" style="padding-top: 30px" >
            <a href="#" class="card" style="text-decoration: none">
                <div class="content-overlay"></div>
                <img src="{{asset('/prog_images/icons')}}/{{$post['post_background']}}" class="card-img-top" alt="..." style="width:fit-content;height: 126px;display: block;margin: 10px auto">
                <div class="content-details fadeIn-bottom">
                    <h3 class="content-title">See Description</h3>
                    <p class="content-text"><i class="fa fa-map-marker"></i> {{$post->title}}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p style="height: 147px;overflow: hidden;" class="card-text">{{$post->description}}</p>
                    <p>
                        <span class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                            #laravel
                        </span>
                    </p>
                </div>
            </a>
        </div>
    </div>
    @endforeach
{{--here End--}}

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
