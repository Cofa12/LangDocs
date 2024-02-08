@extends('layouts.app')
@section('content')
    <div style ="width: 60%;height: fit-content;padding: 30px;float: left">
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title of the post</label>
                <input type="text" name = "title" class="form-control" id="exampleFormControlInput1" placeholder="ex: laravel" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name = "description" id="exampleFormControlTextarea1" rows="3" placeholder="Type the description appeared in the post's card...">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">History</label>
                <textarea class="form-control" name = "history" id="exampleFormControlTextarea1" rows="3" placeholder="Type the history appeared in the post's section..">{{old('history')}}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tags</label>
                <textarea class="form-control" name = "tags" id="exampleFormControlTextarea1" rows="3" placeholder="Type tags separated by comma ' , ' like (laravel, BackEnd)">{{old('tags')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post's image</label>
{{--                <input type="hidden" name="adminId" value="{{$admin->id}}">--}}
                <input type="file" alt="" name="postImage" class="form-control" value="{{old('postImage')}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Link of Docs</label>
                <input type="text" name = "link" class="form-control" id="exampleFormControlInput1" placeholder="Type Link of Docs" value="{{old('link')}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Publish Post</button>
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

@endsection
