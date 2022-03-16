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

    public function inhouseCreate(Request $r)
    {
        $images = [];
        if($r->hasFile('dimage')){
            foreach($r->file('dimage') as $image)
            {
                $destinationPath = 'DesignImages/';
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                array_push($images, $filename);      
            }

            $insert = DB::table('tbl_jobcard')->insert([
                'challan_id'=>$r->cid,
                'jobcard_number'=>$r->jnumber,
                'design_image'=>implode(',',$images),
                'design_number'=>$r->dnumber,
                'production_type'=>$r->ptype,
                'jobwork_type'=>implode(',',$r->jw),
                'total_pieces'=>$r->pieces
            ]);
            if($insert){
                return redirect('/jobcard-create-view')->with('msg','Jobcard create succussfuly');
            }else{
                return back()->with('error','Jobcard not create.');
            }

        }else{
            $insert = DB::table('tbl_jobcard')->insert([
                'challan_id'=>$r->cid,
                'jobcard_number'=>$r->jnumber,
                'design_number'=>$r->dnumber,
                'production_type'=>$r->ptype,
                'jobwork_type'=>implode(',',$r->jw),
                'total_pieces'=>$r->pieces
            ]);
            if($insert){
                return redirect('/jobcard-create-view')->with('msg','Jobcard create succussfuly');
            }else{
                return back()->with('error','Jobcard not create.');
            }
        }
    }


    public function inhousePreview($id)
    {
        $data = DB::table('tbl_jobcard')->where('jobcard_id',$id)
                        ->where('tbl_jobcard.status',1)
                        ->join('tbl_challan','tbl_jobcard.challan_id','=','tbl_challan.challan_id')
                        ->first();
        // $images = explode(',',$data->design_image);
        if($data){
            return view('jobcard/jobcard-preview',compact('data')); 
        }
    }

    public function inhouseDelete($id)
    {
        $status = 0;
        $update = DB::table('tbl_jobcard')->where('jobcard_id',$id)->update(['status'=>$status]);
        if($update){
            return redirect('/jobcard-display')->with('msg','Delete Jobcard Succuessfully'); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function inhouseUpdateView($id) 
    {
        $challanData = DB::table('tbl_challan')->where('status',1)->get();
        $jobcardData = DB::table('tbl_jobcard')->where('jobcard_id',$id)
                                            ->join('tbl_challan','tbl_jobcard.challan_id','=','tbl_challan.challan_id')
                                            ->first();
        $jwData = DB::table('categories_jobwork')->get();
        if($jobcardData){
            return view('jobcard/jobcard-update',compact('jobcardData','challanData','jwData')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function inhouseUpdate(Request $r)
    {
        $images = [];
        if($r->hasFile('dimage')){
            foreach($r->file('dimage') as $image)
            {
                $destinationPath = 'DesignImages/';
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                array_push($images, $filename);      
            }

            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update([
                'challan_id'=>$r->cid,
                'jobcard_number'=>$r->jnumber,
                'design_image'=>implode(',',$images),
                'design_number'=>$r->dnumber,
                'production_type'=>$r->ptype,
                'jobwork_type'=>implode(',',$r->jw),
                'total_pieces'=>$r->pieces
            ]);
            if($insert){
                return redirect('/jobcard-create-view')->with('msg','Jobcard update succussfuly');
            }else{
                return back()->with('error','Jobcard not create.');
            }

        }else{
            $update = DB::table('tbl_jobcard')->where('jobcard_id',$r->jid)->update([
                'challan_id'=>$r->cid,
                'jobcard_number'=>$r->jnumber,
                'design_number'=>$r->dnumber,
                'production_type'=>$r->ptype,
                'jobwork_type'=>implode(',',$r->jw),
                'total_pieces'=>$r->pieces
            ]);
            if($insert){
                return redirect('/jobcard-create-view')->with('msg','Jobcard update succussfuly');
            }else{
                return back()->with('error','Jobcard not create.');
            }
        }        
    }
}
