
{{--@dd(session('loginedEmail'))--}}
@extends('layouts.app')
@section('profileImage')
    @if (isset($memberData))
        @if(!$memberData->type)
            <img src="{{asset('/members')}}/{{$memberData['image']}}" style="width: 50px">
        @else
            <img src="{{$memberData['image']}}" style="width: 50px">
        @endif
    @endif
@endsection
@section('content')

<div style="width: fit-content;height: fit-content;padding:20px;display: flex;justify-content: center">
    <h1 style="width: 100%;height: 30px;text-align: center">
        @if(isset($searchTage))
            {{$searchTage}}
        @endif
    </h1>
@foreach($posts as $post)
    <div class="col-md-4" style="width: 18rem;text-decoration: none;display: inline-block;margin-top: 20px;margin-right: 6px">
        <div class="content" style="padding-top: 30px" >
            <a href="{{route('posts.show',$post->id)}}" class="card" style="text-decoration: none">
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
                            @foreach($post->tags as $tag)
                                @foreach($tag as $item)
                                <span class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"style="width: fit-content;height: fit-content">
                                        #{{$item}}
                                </span>
                            @endforeach
                            @endforeach
                    </p>

                    <p>
                        <span>Published By </span>
                        <span><img src="{{asset('members')}}/{{$post->admin->image}}" style="width: 50px;height: 50px;border-radius: 100%"></span>
                        <span>{{$post->admin->name}}</span>
                    </p>
                </div>
            </a>
        </div>
    </div>
    @endforeach
{{--here End--}}

</div>

    <div class="pagination" style="width: 100%;height: fit-content;text-align: center">
            {{$posts->links()}}
    </div>


@endsection


