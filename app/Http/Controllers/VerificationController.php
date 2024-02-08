<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    //
    public function verifyEmail($token){
        $user = User::where('confirmation_token', $token)->first();
        $user->confirmation_token=null;
        $user->email_verified_at = now();
        $user->save();

        return to_route('verified_successfully');
    }
}
