<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$postData->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('posts.index')}}">LangDocs</a>
    </div>
</nav>
<div class = "container" style="width: 100%;padding: 20px;height: fit-content;display: flex;justify-content: center">
    <div class="image_profile" style="width: 40%;padding-left:40px;height: 500px;margin-right: 20px;display: flex;align-items: center">
            <img src="{{asset('/prog_images/icons')}}/{{$postData['post_background']}}" style="width: 270px">
    </div>
    <div style="width: 60%;height: fit-content">
        <p>{{$postData->history}}</p>
        <div style="width: 100%;text-align: center;margin-bottom: 10px">
            <a href="{{$postData->docs_link}}" style="width: 161px;
    display: block;
    margin: auto;
    height: fit-content;
    background: #cf0056;
    padding: 13px;
    text-decoration: none;
    color: #FFF;
    border-radius: 20px;">Docs</a>
            <p style="width: 100%;
    margin-top: 28px;
">
                @foreach($postData->tags as $tag)
                    @foreach($tag as $item)
                        <span class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"style="width: fit-content;height: fit-content">
                                        #{{$item}}
                                </span>
                    @endforeach
                @endforeach

            </p>
            <p>
                <span>Published By </span>
                <span><img src="{{asset('members')}}/{{$postData->admin->image}}" style="width: 50px;height: 50px;border-radius: 100%"></span>
                <span>{{$postData->admin->name}}</span>
            </p>
        </div>

    </div>
</div>
</body>
</html>
