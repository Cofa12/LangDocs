<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;

//use Faker\Core\File;
use App\Notifications\VerifyEmail;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

//use App\Notifications\VerifyEmail;


class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auths.login');
    }

    public function login(){
        \request()->validate([
            'email'=>['required'],
            'password'=>['required']
        ]);
        $memberEmail = request()->email;
        $memberPassword= request()->password;
        $userData =Admin::where('email', $memberEmail)->first();
        if ($userData){
            session(['isAdmin'=>1]);
        }else {
            $userData =User::where('email', $memberEmail)->first();
            if ($userData){
                session(['isAdmin'=>0]);
            }
        }

        if($userData->email && Hash::check($memberPassword,$userData->password)){
            if (!$userData->email_verified_at){
                return to_route('login.form',['verified'=>1]);
            }else {
                session(['loginedEmail'=>$userData->email]);
                return to_route('posts.index');
            }
        } else {
            return to_route('login.form',['loginError'=>1]);
        }
    }
    public function store(Request $request){
        \request()->validate([
            'name'=>['required','min:4'],
            'password'=>array('required','min:7','max:20','regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()[\]{}]))/u'),
            'email'=>['required'],
        ],[
            'regex'=>"Your password must contain at least one uppercase, lowercase characters, special characters like [!@#$%^&*()[]{}] and size must be between [7-15] "
        ]);

        $image = \request()->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        $imageName = time() . "." . $imageExtension;
        $request->image->move(public_path('/members'),$imageName);


        $user = User::create([
            'name'=>\request()->name,
            'email'=>\request()->email,
            'password'=>Hash::make(\request()->password),
            'image'=>$imageName,
            'confirmation_token'=>Str::random(60),
        ]);
        $user->notify(new VerifyEmail());
        return to_route('login.form',['verifySignedUp'=>1]);

    }

    public function socialitedLogin($user){
        session(['loginedEmail'=>$user->email]);
        $userData = Admin::find($user->email);
        $isAdmin = 1;
        if(!$userData){
//            $userData = User::where('email',$user->email)->first();
            $isAdmin = 0;
        }
        session(['isAdmin'=>$isAdmin]);
        return to_route('posts.index');
    }


    // google

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function redirectGoogleData(){
          $user = Socialite::driver('google')->user();
            $userEmail = $user->email;
            $dbUser = User::where('email',$userEmail)->first();
            if ($dbUser){
                $this->socialitedLogin($user);
                return to_route('posts.index');
            }

            User::create([
                'email'=>$user->email,
                'name'=>$user->name,
                'type'=>'external',
                'password'=>Hash::make("external"),
                'image'=>$user->avatar
            ]);
            session(['loginedEmail'=>$user->email,'isAdmin'=>0]);
            return to_route('posts.index');
    }



    // gitHub
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function redirectGithubData(){
        $user = Socialite::driver('github')->user();// here is the error of code
        $userEmail = $user->email;
        $dbUser = User::where('email',$userEmail)->first();
        if ($dbUser){
            $this->socialitedLogin($user);
            return to_route('posts.index');
        }

        User::create([
            'email'=>$user->email,
            'name'=>$user->name,
            'type'=>'external',
            'password'=>Hash::make("external"),
            'image'=>$user->avatar
        ]);
        session(['loginedEmail'=>$user->email,'isAdmin'=>0]);
        return to_route('posts.index');
    }



    // twitter
    public function redirectTolinkedin(){
        return Socialite::driver('linkedin')->redirect();
    }

    public function redirectlinkedinData(){
        $user = Socialite::driver('linkedin')->user();// here is the error of code
        $userEmail = $user->email;
        dd($user);
        $dbUser = User::where('email',$userEmail)->first();
        if ($dbUser){
            $this->socialitedLogin($user);
        }

        $userData = User::create([
            'email'=>$user->email,
            'name'=>$user->name,
            'type'=>'external',
            'password'=>Hash::make("external")
        ]);
        session(['loginedEmail'=>$user->email]);
        return to_route('posts.index',['memberData'=>$userData,'isAdmin'=>0]);
    }
}
