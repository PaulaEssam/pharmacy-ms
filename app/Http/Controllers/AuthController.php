<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make('123456'));
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->is_admin == '1') {
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error','You are not authorized to access this page!');
            }
        }
        else{
            return redirect()->back()->with('error','Please enter correct email and password!');
        }
    }

    public function forgot_password()
    {
        return view('auth.forgot_password');
    }

    public function forgot_post(Request $request)
    {
        $count = User::where('email', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success','Password has been reset. Please check your SPAM or junk mail folder.') ;
        }
        else{
            return redirect()->back()->withInput()->with('error','Email Not Found !!') ;
        }
    }

    public function get_reset($token)
    {
        if(Auth::check()){
            return redirect('admin/dashboard');
        }
        $user = User::where('remember_token', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;
        return view('auth.reset',$data);
    }

    public function post_reset(Request $request , $token)
    {
        $validated = $request->validate([
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6|same:password',
        ]);
        $user = User::where('remember_token', $token);
        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();
        return redirect('/')->with('success','Password has been reset successfully');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
