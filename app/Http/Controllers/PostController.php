<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Helper\ImageManager;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        if (session('isAdmin')==1){
            $userData = Admin::where('email',session('loginedEmail'))->first();
        }else {
            $userData = User::where('email',session('loginedEmail'))->first();
        }
        $postData = Post::paginate(5);

        if ($postData){
            foreach ($postData as $post){
                $post->tags=json_decode($post->tags);
//                dd($post->tags);
            }
        }
        return view('posts.index',['posts'=>$postData,'memberData'=>$userData]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        request()->validate([
            'title'=>['required','min:3','unique:posts,title'],
            'description'=>['required','min:30','max:180'],
            'history'=>['required','min:300','max:5000'],
            'postImage'=>['required','extensions:jpg,png,svg,jpeg'],
            'link'=>['required']
        ]);
        $image = request()->file('postImage');
        $extensionOfImage = $image->getClientOriginalExtension();
//        dd($extensionOfImage);
        $nameOfImage = time().".".$extensionOfImage;
//        $path = storage_path('prog_images/icons');
////        dd($path);
////        move_uploaded_file($image,'prog_images/icons'.$nameOfImage);
////        Storage::disk('public')->put('prog_images/icons' . $nameOfImage, File::get($image));
         $request->postImage->move(public_path('prog_images/icons'),$nameOfImage);

        $tags = explode(',',request()->tags);
//        dd(json_encode($tags));
        $tagJson = [
            'tags'=>$tags
        ];

        Post::create([
            'title'=>request()->title,
            'description'=>request()->description,
            'history'=>request()->history,
            'post_background'=>$nameOfImage,
            'tags'=>json_encode($tagJson),
            'admin_id'=>Admin::where('email',session('loginedEmail'))->get()->value('id'),
            'docs_link'=>\request()->link
        ]);
        return to_route('posts.index');
    }

    public function show($postId){
        $postData = Post::findOrFail($postId);
        $postData->tags = json_decode($postData->tags);
        return view('posts.show',['postData'=>$postData]);
    }

    public function search(){
        $posts = Post::where('title',request()->search_tag)->paginate(5);
        foreach ($posts as $post){
            $post->tags=json_decode($post->tags);
        }
        return view('posts.index',['posts'=>$posts,'searchTage'=>\request()->search_tag]);
    }

    public function edit($postId){
        $post = Post::where('id',$postId)->get();
            foreach ($post as $item){
                $item->tags=json_decode($item->tags);
            }

        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request){
        $image = request()->file('postImage');
        $nameOfImage=\request()->image;

        if ($image){
            $extensionOfImage = $image->getClientOriginalExtension();
            $nameOfImage = time().".".$extensionOfImage;
            $request->postImage->move(public_path('prog_images/icons'),$nameOfImage);
        }

        $tags = explode(',',request()->tags);
        $tagJson = [
            'tags'=>$tags
        ];

        Post::where ('id', request()->id)->update([
            'title'=>request()->title,
            'description'=>request()->description,
            'history'=>request()->history,
            'post_background'=>$nameOfImage,
            'tags'=>json_encode($tagJson),
            'docs_link'=>\request()->link
        ]);

        return to_route('profile.index');
    }

    public  function  destroy($postId){
        Post::where('id',$postId)->delete();
        return to_route('profile.index');
    }
}
