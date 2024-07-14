<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Mail\CreatePasswordEmail;
use App\Models\Admin;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function showLoginForm()
    {
        return view('Auth.login');
    }
    function login(AdminLoginRequest $request)
    {
        $user = Admin::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->Session()->put('loginId', $user->id);
            $id = $user->id;
            Auth::login(Admin::find($id));
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'wrong email or password');
    }
    function createPassword(Request $request)
    {
        $id = $request->id;
        if (!$request->hasValidSignature()) {
            return view('authors.resend', compact('id'));
        }
        return view('authors.password', compact('id'));
    }
    function logout()
    {
        Session::pull('loginId');
        Auth::logout();
        return redirect()->route('auth.login.form');
    }

    function storePassword(Request $request)
    {
        $request->validate([
            'password' => ['min:8', 'required', 'max:225'],
            'id' => 'required'
        ]);
        $author = Author::find($request->id);
        $author->password = Hash::make($request->password);
        $author->status = 'active';
        $author->save();
        return 'password created successfully';
    }
    function resendLink(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $author = Author::find($request->id);
        $url = URL::temporarySignedRoute('password.create', now()->addMinutes(30), ['id' => $author->id]);
        Mail::to($author->email)->send(new CreatePasswordEmail($url));
        return 'mail sent successfully';
    }
}