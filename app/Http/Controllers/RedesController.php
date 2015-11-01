<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RedesController extends Controller
{
    public function getLoginfb(){
        return \OAuth::authorize('facebook');
    }
    public function getFacebook(){
        OAuth::login('facebook', function($user, $details) {
           $user->name = $details->full_name;
           $user->email = $details->email;
           $user->save();
        });
        dd(
            Auth::user(),
            $details
        );
    }
}
