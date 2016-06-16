<?php

namespace App\Http\Controllers;

use App\Editor;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

class LoginController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $params = [
                    'login'            => $request->login,
                    'password'          => $request->password,
                    'remember_token'    => $request->_token
                  ];

        $user = new User();
        $user = $user->checkUser($params);

        $editor = new Editor();
        $editors = $editor->listEditors();

        if(isset($user)){
            if(Hash::check($params['password'], $user->password)){
                if (Auth::loginUsingId($user->id))
                    return Redirect::intended(route('book'))->with([ 'user' => $user, 'editors' => $editors ]);
            }
        }
        return view('auth.login')->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
