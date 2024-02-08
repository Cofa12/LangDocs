@extends('layouts.app')
@section('content')
    <div style ="width: 60%;height: fit-content;padding: 30px;float: left">
        @foreach($post as $item)
            <form action="{{route('posts.update')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title of the post</label>
                <input type="text" name = "title" class="form-control" id="exampleFormControlInput1" placeholder="ex: laravel" value="{{$item->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name = "description" id="exampleFormControlTextarea1" rows="3" placeholder="Type the description appeared in the post's card...">{{$item->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">History</label>
                <textarea class="form-control" name="history" id="exampleFormControlTextarea1" rows="3" placeholder="Type the history appeared in the post's section..">{{$item->history}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tags</label>
                <textarea class="form-control" name = "tags" id="exampleFormControlTextarea1" rows="3" placeholder="Type tags separated by comma ' , ' like (laravel, BackEnd)">@foreach($item->tags as $tag)@foreach($tag as $tt){{$tt}},@endforeach @endforeach</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post's image</label>
                <input type="file" alt="" name="postImage" class="form-control" value="{{old('postImage')}}">
                <input type="hidden" name="image" value="{{$item->post_background}}">
                <input type="hidden" name="id" value="{{$item->id}}">


            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Link of Docs</label>
                <input type="text" name = "link" class="form-control" id="exampleFormControlInput1" placeholder="Type Link of Docs" value="{{$item->docs_link}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
            </div>
        </form>
            <button class="btn btn-danger mb-3">Delete</button>
        <form action="{{route('posts.destroy',$item->id)}}" method="POST" style="display: none">
            @csrf
            @method('DELETE')
            <div class="mb-3" style="display: inline-block">
                <button type="submit" class="btn btn-danger mb-3">Delete</button>
            </div>
        </form>
            @endforeach
    </div>

@endsection
