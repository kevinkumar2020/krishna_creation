<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class masterControlle extends Controller
{
    public function dashboard()
    {
        $user_id = session()->get('user_id');
        $userData = DB::table('tbl_registration')->where('user_id',$user_id)
                    ->join('tbl_role','tbl_registration.role_id','=','tbl_role.role_id')
                    ->first();
        if($userData){
            return view('master/master_dashboard',compact('userData')); 
        }else{
            return view('login');
        }
    }

        //User Section
    
        public function createuserView()
        {
            $hwc = DB::table('categories_handwork')->where('handwork_type','!=',"")->get();
            $roles = DB::table('tbl_role')->where('role','!=','Admin')->get();
            if($hwc && $roles){
                return view('master/createuser',compact('hwc','roles')); 
            }
        }

    public function createNewUser(Request $r)
    {
        if($r->password === $r->repassword){
            $checkPhoneNumber = DB::table('tbl_registration')->where('phone',$r->phone)->first();
            if($checkPhoneNumber){
            return back()->with('error','This phone number already register');
            } else{
                if($r->hwc==""){
                    $hwc = 6;
                }else{
                    $hwc = $r->hwc;
                }
                $createUser = DB::table('tbl_registration')->insert([
                    'name'=>$r->username,
                    'role_id'=>$r->role,
                    'phone'=>$r->phone,
                    'password'=>md5($r->password),
                    'handwork_id'=>$hwc
                ]);
        
                if($createUser){
                    return redirect('/userdisplay')->with('msg','User Create Successfuly');
                }else{
                    return back()->with('error','User Not Created');
                }
            }
        }else{
            return back()->with('error','Password does not match');
        }
    }

    public function userDisplay()
    {
        $userCount = DB::table('tbl_registration')->where('status',1)->count();
        $userList = DB::table('tbl_registration')->where('status','1')
                        ->join('tbl_role','tbl_registration.role_id','=','tbl_role.role_id')
                        ->join('categories_handwork','tbl_registration.handwork_id','=','categories_handwork.handwork_id')
                        ->where('tbl_role.role','!=','Admin')
                        ->get();
        if($userList){
            return view('master/userdisplay',compact('userList','userCount')); 
        }
    }

    public function userDelete($id)
    {
        $status = 0;
        $update = DB::table('tbl_registration')->where('user_id',$id)->update(['status'=>$status]);
        if($update){
            return redirect('/userdisplay')->with('msg','Delete User Succuessfully'); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function updateUserView($id)
    {
        $update = DB::table('tbl_registration')->where('user_id',$id)->join('tbl_role','tbl_registration.role_id','=','tbl_role.role_id')
        ->join('categories_handwork','tbl_registration.handwork_id','=','categories_handwork.handwork_id')
        ->first();
        $hwc = DB::table('categories_handwork')->where('handwork_type','!=',"")->get();
        $roles = DB::table('tbl_role')->where('role','!=','Admin')->get();
        if($update && $hwc && $roles){
            return view('master/userupdate',compact('update','hwc','roles')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function userUpdate(Request $r)
    {
        $update = DB::table('tbl_registration')->where('user_id',$r->user_id)->update([
            'name'=>$r->username,
            'role_id'=>$r->role,
            'phone'=>$r->phone,
            'handwork_id'=>$r->hwc
        ]);
        if($update){
            return redirect('/userdisplay')->with('msg','Update User Succuessfully'); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function userProfile()
    {
        $user_id = session()->get('user_id');
        $profileData = DB::table('tbl_registration')->where('user_id',$user_id)
                        ->join('tbl_role','tbl_registration.role_id','=','tbl_role.role_id')
                        ->join('categories_handwork','tbl_registration.handwork_id','=','categories_handwork.handwork_id')
                        ->first();   
        if($profileData){
            return view('/master/user-profile',compact('profileData'));
        }
    }
    
    public function userPasswordUpdate(Request $r)
    {
        $user_id = session()->get('user_id');
        $oldPassCheck = DB::table('tbl_registration')->where('user_id',$user_id)->where('password',md5($r->opassword))->first();
        if($oldPassCheck){
            if($r->password === $r->cpassword){
                $update = DB::table('tbl_registration')->where('user_id',$user_id)->update([
                    'password'=>md5($r->password)
                ]);
                if($update){
                    return back()->with('msg','Password Updated..');
                }else{
                    return back()->with('error','You Enter Same As Old Password');
                }
            }else{
                return back()->with('error','Password Does Not Match');
            }
        }else{
            return back()->with('error','Old Password Does Not Match');
        }
    }

}
