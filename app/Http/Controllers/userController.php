<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function display()
    {
        $roles = DB::table('working_role')->get();
        $hand_work = DB::table('categories_handwork')->get();
        return view('/signup',compact('roles','hand_work')); 
    }

    public function login(Request $r)  
    {
            $check = DB::table('tbl_registration')->where('phone',$r->phone)->where('password',md5($r->password))->where('status',1)->first();
            if($check){
                session()->put('user_id',$check->user_id);
                session()->put('name',$check->name);
                session()->put('role',$check->role_id); 
                return redirect('/master_dashboard');
            }else{
                return back()->with('error','Invalid Username OR Password..!');
            }
    }

    public function logout()
    {
        session()->put('user_id',null);
        return view('login');
    }

    public function loginView()
    {
        return view('login');
    }
}
