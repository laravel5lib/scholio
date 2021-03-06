<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Scholio\Scholio;
use App\Jobs\Algolia;

class VerifyController extends Controller
{
    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        if($user){
            $user->status = 'verified';
            $user->email_token = '';
            $user->save();

            dispatch(new Algolia($user->info));

            session()->flash('verify', 'Your email have been verified');

            auth()->login($user);

            return redirect('/panel/dashboard');
        }

        abort('404');
    }
}
