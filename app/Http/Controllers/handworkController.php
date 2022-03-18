<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class handworkController extends Controller
{
    public function handworkDisplay()
    {
        $dataCount = DB::table('tbl_jobcard')->where('status',1)->where('stitching_status',1)->count();
        $data = DB::table('tbl_jobcard')->where('status',1)->where('stitching_status',1)->get();
        if($data){
            return view('handwork/handwork-display',compact('data','dataCount')); 
        }
    }

    public function handworkInsertView($id)
    {
        $check = DB::table('tbl_handwork')->where('jobcard_id',$id)->count();
        if($check > 0){
            return back()->with('error','Job is already seleted');
        }else{
            return view('/handwork/handwork-create',compact('id'));
        }
    }

    public function handworkInsert(Request $r)
    {
        $insert = DB::table('tbl_handwork')->insert([
            'jobcard_id'=>$r->jid,
            'estimated_time'=>$r->edate
        ]);
        if($insert){
            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['handwork_status'=>2]);
            if($update){
                return redirect('/handwork-display')->with('msg','Job Started..');
            }
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function handworkUpdateView($id) 
    {
        $data = DB::table('tbl_handwork')->where('jobcard_id',$id)->first();
        if($data){
            return view('handwork/handwork-update',compact('data')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function handworkUpdate(Request $r)
    {
        $image = "";
        if($r->hasFile('himage')){
            $file=$r->file('himage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/HandWork/');
            $file->move($dest, $image);

            $update = DB::table('tbl_handwork')->where('jobcard_id',$r->jid)->update([
                'estimated_time'=>$r->edate,
                'handwork_image'=>$image
            ]);
            if($update){
                 return redirect('/handwork-display')->with('msg','Wandwork Image Upload');  
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }else{
            $update = DB::table('tbl_handwork')->where('jobcard_id',$r->jid)->update([
                'estimated_time'=>$r->edate
            ]);
            if($update){
                 return redirect('/handwork-display')->with('msg','Handwork Image Upload');  
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }
    }

    public function handworkDoneView($id)
    {
        if($id){
            return view('/handwork/handwork-done',compact('id'));
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function handworkDone(Request $r)
    {
        $image = "";
        if($r->hasFile('himage')){
            $file=$r->file('himage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/HandWork/');
            $file->move($dest, $image);

            $update = DB::table('tbl_handwork')->where('jobcard_id',$r->jid)->update([
                'handwork_image'=>$image
            ]);
            if($update){
                $statusUpdate = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['handwork_status'=>1]);
                if($statusUpdate){
                 return redirect('/handwork-display')->with('msg','Handwork Image Upload');
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
