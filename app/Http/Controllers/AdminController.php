<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function update(){
            \request()->validate([
                'name'=>['min:4'],
                'email'=>['email:rfc,dns']
            ]);

        $image = \request()->file('image');
        if($image){
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = time().".".$imageExtension;
            \request()->image->move(public_path('/members'),$imageName);
        }else {
            $imageName = \request()->image;
        }


        if (session('isAdmin')==1){
            Admin::where('email',session('loginedEmail'))->update([
                'name'=>\request()->name,
                'email'=>\request()->email,
                'image'=>$imageName
            ]);
        }else {
            User::where('email',session('loginedEmail'))->update([
                'name'=>\request()->name,
                'email'=>\request()->email,
                'image'=>$imageName
            ]);
        }
        return to_route('profile.index');
    }
}
