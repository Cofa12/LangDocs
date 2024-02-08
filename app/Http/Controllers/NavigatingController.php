<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
//use MongoDB\Driver\Session;
use Illuminate\Support\Facades\Session;


class NavigatingController extends Controller
{
    //
    public function profile(){
        if (session('isAdmin')==1){
            $userData = Admin::where('email',session('loginedEmail'))->first();
        }else {
            $userData = User::where('email',session('loginedEmail'))->first();
        }
        $adminArrayTags =[];
        $posts = Post::where('admin_id',$userData->id)->get();
        foreach ($posts as $post){
            $post->tags=json_decode($post->tags);
        }
        return view('members.profile',['memberData'=>$userData,'posts'=>$posts,'counter'=>0]);
    }

    public function show(){
        $adminInfo = Admin::all();
        return view('members.visitedPublishers',['admins'=>$adminInfo]);
    }

    public function logout(){
       $value = Session::pull('isAdmin');
       $value2 = Session::pull('loginedEmail');

        return to_route('login.form');
    }
}
