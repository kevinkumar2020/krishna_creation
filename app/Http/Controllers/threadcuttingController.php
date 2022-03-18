<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class threadcuttingController extends Controller
{
    public function threadcuttingDisplay()
    {
        $dataCount = DB::table('tbl_jobcard')->where('status',1)->where('inhouse_status',1)->count();
        $data = DB::table('tbl_jobcard')->where('status',1)->where('inhouse_status',1)->get();
        if($data){
            return view('threadcutting/threadcutting-display',compact('data','dataCount')); 
        }
    }

    public function threadcuttingInsertView($id)
    {
        $check = DB::table('tbl_threadcutting')->where('jobcard_id',$id)->count();
        if($check > 0){
            return back()->with('error','Job is already seleted');
        }else{
            return view('/threadcutting/threadcutting-create',compact('id'));
        }
    }

    public function threadcuttingInsert(Request $r)
    {
        $insert = DB::table('tbl_threadcutting')->insert([
            'jobcard_id'=>$r->jid,
            'estimated_time'=>$r->edate
        ]);
        if($insert){
            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['threadcutting_status'=>2]);
            if($update){
                return redirect('/threadcutting-display')->with('msg','Job Started..');
            }
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function threadcuttingUpdateView($id) 
    {
        $data = DB::table('tbl_threadcutting')->where('jobcard_id',$id)->first();
        if($data){
            return view('threadcutting/threadcutting-update',compact('data')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function threadcuttingUpdate(Request $r)
    {
        $image = "";
        if($r->hasFile('timage')){
            $file=$r->file('timage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/ThreadCutting/');
            $file->move($dest, $image);

            $update = DB::table('tbl_threadcutting')->where('jobcard_id',$r->jid)->update([
                'estimated_time'=>$r->edate,
                'threadcutting_image'=>$image
            ]);
            if($update){
                 return redirect('/threadcutting-display')->with('msg','ThreadCutting Image Upload');  
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }else{
            $update = DB::table('tbl_threadcutting')->where('jobcard_id',$r->jid)->update([
                'estimated_time'=>$r->edate
            ]);
            if($update){
                 return redirect('/threadcutting-display')->with('msg','ThreadCutting Image Upload');  
            }else{
                return back()->with('error','Somthing want to wrong');
            }
        }
    }

    public function threadcuttingDoneView($id)
    {
        if($id){
            return view('/threadcutting/threadcutting-done',compact('id'));
        }else{
            return back()->with('error','Somthing want to wrong');
        }
    }

    public function threadcuttingDone(Request $r)
    {
        $image = "";
        if($r->hasFile('timage')){
            $file=$r->file('timage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/ThreadCutting/');
            $file->move($dest, $image);

            $update = DB::table('tbl_threadcutting')->where('jobcard_id',$r->jid)->update([
                'threadcutting_image'=>$image
            ]);
            if($update){
                $statusUpdate = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update(['threadcutting_status'=>1]);
                if($statusUpdate){
                 return redirect('/threadcutting-display')->with('msg','ThreadCutting Image Upload');
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
