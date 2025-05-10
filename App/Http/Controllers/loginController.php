<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    

    //新規作成ページ

    public function newCreatePage(){
        //セッションがあるかの処理
        if(Auth::check()){
            return redirect('/');
        }
        return view('logins.newCreate');
     }


    //新規登録

    public function loginNewcreate(Request $request){
        $request->validate([
            'user'=>'required|email|string|max:255|unique:logins,user',
            'password'=>'required|string|min:6',
        ]);

        Login::create([
            'user'=>$request->user,
            'password'=>Hash::make($request->password),
        ]);
        echo 'ハロー';
       return redirect('/login');
    }


    //ログインページ

    public function loginPage(){
        //セッションがあるかの処理
        if(Auth::check()){
            return redirect('/');
        }
        return view('logins.login');
     }


    //ログイン

    public function login(Request $request){
        
        $credentials = $request->only('user','password');
        if(Auth::attempt($credentials)){
            return redirect('/');
        }else{
            return back()->withErrors([
                'login'=>'ユーザ名またはパスワードが違います',
            ]);
        }
    }

    
}
