<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inhouseController extends Controller
{

    public function inhouseDisplay()
    {
        $inhouseCount = DB::table('tbl_jobcard')->where('status',1)->where('production_type','In-House')->count();
        $inhouseList = DB::table('tbl_jobcard')
                        ->where('status',1)
                        ->where('production_type','In-House')
                        ->get();
        if($inhouseList){
            return view('inhouse/inhouse-display',compact('inhouseList','inhouseCount')); 
        }
    }

    public function inhouseInsertView($id)
    {
        $check = DB::table('tbl_inhouse')->where('jobcard_id',$id)->count();
        if($check > 0){
            return back()->with('error','Job is already seleted');
        }else{
            return view('/inhouse/inhouse-create',compact('id'));
        }
    }

    public function inhouseInsert(Request $r)
    {
        $insert = DB::table('tbl_inhouse')->insert([
            'jobcard_id'=>$r->jid,
            'estimated_time'=>$r->edate
        ]);
        if($insert){
            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['inhouse_status'=>2]);
            if($update){
                return redirect('/inhouse-display')->with('msg','Job Started..');
            }
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function inhouseUpdateView($id) 
    {
        $data = DB::table('tbl_inhouse')->where('jobcard_id',$id)->first();
        if($data){
            return view('inhouse/inhouse-update',compact('data')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function inhouseUpdate(Request $r)
    {
        $update = DB::table('tbl_inhouse')->where('jobcard_id',$r->jid)->update(['estimated_time'=>$r->edate]);
        if($update){
            return redirect('/inhouse-display')->with('msg','Detail update succussfuly');
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function inhouseDone($id)
    {
        $update = DB::table('tbl_jobcard')->where('jobcard_id',$id)->update(['inhouse_status'=>1]);
        if($update){
            return redirect('/inhouse-display')->with('msg','Job Done..');
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

}
