<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class outhouseController extends Controller
{
    public function outhouseDisplay()
    {
        $outhouseCount = DB::table('tbl_jobcard')->where('status',1)->where('production_type','Out-House')->count();
        $outhouseList = DB::table('tbl_jobcard')
                        ->where('status',1)
                        ->where('production_type','Out-House')
                        ->get();
        if($outhouseList){
            return view('outhouse/outhouse-display',compact('outhouseList','outhouseCount')); 
        }
    }

    public function outhouseInsertView($id)
    {
        $check = DB::table('tbl_outhouse')->where('jobcard_id',$id)->count();
        if($check > 0){
            return back()->with('error','Job is already seleted');
        }else{
            return view('/outhouse/outhouse-create',compact('id'));
        }
    }

    public function outhouseInsert(Request $r)
    {
        $insert = DB::table('tbl_outhouse')->insert([
            'jobcard_id'=>$r->jid,
            'estimated_time'=>$r->edate
        ]);
        if($insert){
            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['outhouse_status'=>2]);
            if($update){
                return redirect('/outhouse-display')->with('msg','Job Started..');
            }
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function outhouseUpdateView($id) 
    {
        $data = DB::table('tbl_outhouse')->where('jobcard_id',$id)->first();
        if($data){
            return view('outhouse/outhouse-update',compact('data')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function outhouseUpdate(Request $r)
    {
        $update = DB::table('tbl_outhouse')->where('jobcard_id',$r->jid)->update(['estimated_time'=>$r->edate]);
        if($update){
            return redirect('/outhouse-display')->with('msg','Detail update succussfuly');
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function outhouseDone($id)
    {
        $update = DB::table('tbl_jobcard')->where('jobcard_id',$id)->update(['outhouse_status'=>1]);
        if($update){
            return redirect('/outhouse-display')->with('msg','Job Done..');
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }
}
