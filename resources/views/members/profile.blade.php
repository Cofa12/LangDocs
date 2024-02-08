<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{asset('/css/card.css')}}" rel="stylesheet">
</head>
<body>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('posts.index')}}">LangDocs</a>
    </div>
</nav>
<div class = "container" style="width: 100%;padding: 20px;height: fit-content;display: flex;justify-content: center">
    <div class="image_profile" style="width: 40%;height: fit-content;margin-right: 20px">
        @if(!$memberData->type)
            <img src="{{asset('/members')}}/{{$memberData['image']}}" style="width: 270px">
        @else
            <img src="{{$memberData['image']}}" style="width: 270px">
        @endif
    </div>
    <div style="width: 60%;height: fit-content">
        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name = "name" class="form-control" id="exampleFormControlInput1" placeholder="{{$memberData->name}}" value="{{$memberData->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" name = "email" class="form-control" id="exampleFormControlInput1" placeholder="{{$memberData->email}}" value="{{$memberData->email}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post's image</label>
                {{--                <input type="hidden" name="adminId" value="{{$admin->id}}">--}}
                <input type="file" alt="" name="image" class="form-control" value = "{{$memberData->image}}">
                <input type="hidden" name="image" value="{{$memberData->image}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
            </div>
        </form>
    </div>
    <div style="float: left; margin-left: 80px;width: 20%;height: fit-content;padding-top: 60px">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

@if(session('isAdmin')==1)

    <h1 style="width: 100%;text-align: center"><a href="{{route('posts.create')}}" class="btn btn-success mb-3">Create a Post</a></h1>

    <h1 style="width: 100%;text-align: center">Posts I published</h1>
    <div style="width: fit-content;height: fit-content;padding:20px;display: flex;justify-content: center">
        @foreach($posts as $post)
            <div class="col-md-4" style="width: 18rem;text-decoration: none;display: inline-block;margin-top: 20px;margin-right: 6px">
                <div class="content" style="padding-top: 30px" >
                    <a href="{{route('posts.edit',$post->id)}}" class="card" style="text-decoration: none">
                        <div class="content-overlay"></div>
                        <img src="{{asset('/prog_images/icons')}}/{{$post['post_background']}}" class="card-img-top" alt="..." style="width:fit-content;height: 126px;display: block;margin: 10px auto">
                        <div class="content-details fadeIn-bottom">
                            <h3 class="content-title">Edit The post</h3>
                            <p class="content-text"><i class="fa fa-map-marker"></i> Click here</p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p style="height: 147px;overflow: hidden;" class="card-text">{{$post->description}}</p>
                            <p>
                                @foreach($post->tags as $tag)
                                    @foreach($tag as $item)
                                        <span class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"style="width: fit-content;height: fit-content">
                                        #{{$item}}
                                </span>
                                    @endforeach
                                @endforeach

                            </p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

    </div>
@endif

</body>
</html>
