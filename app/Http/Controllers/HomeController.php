<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->get();
        return view('home',compact('tasks'));
    }

    public function chpass(Request $request)
    {
        $conf = 0;
        if(Hash::check($request->input('old_password'),Auth::user()->password)){
            $pwd = $request->input('new_password');
            $pwd_c = $request->input('confirm_password');

            if($pwd == $pwd_c){
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($pwd);
                $user->Save();
                $conf = 1;
            }
        }

        if($conf == 0 ){
            $this->validate($request,["pwd"=>"required"]);
            // dd($validator);
            return back();
        }
        else{
            return back();
        }
    }
}
