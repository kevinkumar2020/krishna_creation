<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class stitchingController extends Controller
{
    public function stitchingDisplay()
    {
        $dataCount = DB::table('tbl_jobcard')->where('status',1)->where('outhouse_status',1)->orwhere('threadcutting_status',1)->count();
        $data = DB::table('tbl_jobcard')->where('status',1)->where('outhouse_status',1)->orwhere('threadcutting_status',1)->get();
        if($data){
            return view('stitching/stitching-display',compact('data','dataCount')); 
        }
    }

    public function stitchingInsertView($id)
    {
        $check = DB::table('tbl_stitching')->where('jobcard_id',$id)->count();
        if($check > 0){
            return back()->with('error','Job is already seleted');
        }else{
            return view('/stitching/stitching-create',compact('id'));
        }
    }

    public function stitchingInsert(Request $r)
    {
        $insert = DB::table('tbl_stitching')->insert([
            'jobcard_id'=>$r->jid,
            'estimated_time'=>$r->edate
        ]);
        if($insert){
            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['stitching_status'=>2]);
            if($update){
                return redirect('/stitching-display')->with('msg','Job Started..');
            }
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function stitchingUpdateView($id) 
    {
        $data = DB::table('tbl_stitching')->where('jobcard_id',$id)->first();
        if($data){
            return view('stitching/stitching-update',compact('data')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function stitchingUpdate(Request $r)
    {
        $image = "";
        if($r->hasFile('simage')){
            $file=$r->file('simage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/Stitching/');
            $file->move($dest, $image);

            $update = DB::table('tbl_stitching')->where('jobcard_id',$r->jid)->update([
                'estimated_time'=>$r->edate,
                'stitching_image'=>$image
            ]);
            if($update){
                 return redirect('/stitching-display')->with('msg','Stitching Image Upload');  
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }else{
            $update = DB::table('tbl_stitching')->where('jobcard_id',$r->jid)->update([
                'estimated_time'=>$r->edate
            ]);
            if($update){
                 return redirect('/stitching-display')->with('msg','Stitching Image Upload');  
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }
    }

    public function stitchingDoneView($id)
    {
        if($id){
            return view('/stitching/stitching-done',compact('id'));
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function stitchingDone(Request $r)
    {
        $image = "";
        if($r->hasFile('simage')){
            $file=$r->file('simage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/Stitching/');
            $file->move($dest, $image);

            $update = DB::table('tbl_stitching')->where('jobcard_id',$r->jid)->update([
                'stitching_image'=>$image
            ]);
            if($update){
                $statusUpdate = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['stitching_status'=>1]);
                if($statusUpdate){
                 return redirect('/stitching-display')->with('msg','Stitching Image Upload');
                }else{
                    return back()->with('error','Somthing want to wrong');
                }   
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }else{
            return back()->with('error','File not selected');
        }
    } 
}
