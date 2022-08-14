<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function check_login(Request $req)
    {
        // return $req->input();
    // return Login::where(['email'=>$req->email])->first();
    $dbdata = Login::where(['email'=>$req->email])->first();
    if(!$dbdata || !Hash::check($req->password,$dbdata->password))
    {
        return "UserEmail or Password not matched.";
    }else{
        $req->session()->put('dbdata',$dbdata);
        return redirect('/');
    }

    }

    public function create()
    {
        //
    }

    public function register(Request $req)
    {
        // return $req->input();
    $user = new Login;
    $user->name=$req->name;
    $user->email=$req->email;
    $user->password=Hash::make($req->password);
    $user->save();
    return redirect('/login');
    }

   
}
