@extends('layouts.app')
@section('content')
{{--    @dd($admins->post)--}}
    <div style="width: 100%;height: fit-content;padding:20px;display: flex;justify-content: center">
        <div class="col-md-4" style="width: 18rem;text-decoration: none;display: inline-block;margin-top: 20px;margin-right: 6px">
            <div class="content" style="padding-top: 30px">
                @foreach($admins as $admin)

                    <div class="col-md-4" style="width: 18rem;text-decoration: none;display: inline-block;margin-top: 20px;margin-right: 6px">
                        <div class="content" style="padding-top: 30px" >
                            <a href="" class="card" style="text-decoration: none">
{{--                                <div class="content-overlay"></div>--}}
                                <img src="{{asset('members')}}/{{$admin['image']}}" class="card-img-top" alt="..." style="width:fit-content;height: 126px;display: block;margin: 10px auto">
{{--                                <div class="content-details fadeIn-bottom">--}}
{{--                                    <h3 class="content-title">See Description</h3>--}}
{{--                                    <p class="content-text"><i class="fa fa-map-marker"></i> {{$post->title}}</p>--}}
{{--                                </div>--}}
                                <div class="card-body">
                                    <h5 class="card-title">{{$admin->name}}</h5>
                                    @if (isset($admin->post))

                                            <p style="height: 147px;overflow: hidden;" class="card-text">published Posts {{$admin->post->count()}}</p>
                                    @endif

{{--                                    <p>--}}
{{--                                        @foreach($post->tags as $tag)--}}
{{--                                            @foreach($tag as $item)--}}
{{--                                                <span class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"style="width: fit-content;height: fit-content">--}}
{{--                                        #{{$item}}--}}
{{--                                </span>--}}
{{--                                            @endforeach--}}
{{--                                        @endforeach--}}
{{--                                    </p>--}}

{{--                                    <p>--}}
{{--                                        <span>Published By </span>--}}
{{--                                        <span><img src="{{asset('members')}}/{{$post->admin->image}}" style="width: 50px;height: 50px;border-radius: 100%"></span>--}}
{{--                                        <span>{{$post->admin->name}}</span>--}}
{{--                                    </p>--}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
