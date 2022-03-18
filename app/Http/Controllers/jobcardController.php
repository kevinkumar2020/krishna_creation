<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jobcardController extends Controller
{
    public function jobcardCreateView()
    {
        $challanData = DB::table('tbl_challan')->where('status',1)->get();
        $jwData = DB::table('categories_jobwork')->get();
        if($challanData){
            return view('/jobcard/jobcard-create',compact('challanData','jwData'));
        }
    }

    public function jobcardCreate(Request $r)
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

    public function jobcardDisplay()
    {
        $jobcardCount = DB::table('tbl_jobcard')->where('status',1)->count();
        $jobcardList = DB::table('tbl_jobcard')
                        ->where('tbl_jobcard.status',1)
                        ->join('tbl_challan','tbl_jobcard.challan_id','=','tbl_challan.challan_id')
                        ->get();

        if($jobcardList){
            return view('jobcard/jobcard-display',compact('jobcardList','jobcardCount')); 
        }
    }

    public function jobcardPreview($id)
    {
        $data = DB::table('tbl_jobcard')->where('jobcard_id',$id)
                        ->where('tbl_jobcard.status',1)
                        ->join('tbl_challan','tbl_jobcard.challan_id','=','tbl_challan.challan_id')
                        ->first();
        $partyData = DB::table('tbl_party')->where('status',1)
                                            ->where('party_id',$data->party_id)
                                            ->first();
        $inhouseData = DB::table('tbl_inhouse')->where('jobcard_id',$id)->first();
        $outhouseData = DB::table('tbl_outhouse')->where('jobcard_id',$id)->first();
        $threadcuttingData = DB::table('tbl_threadcutting')->where('jobcard_id',$id)->first();
        $stitchingData = DB::table('tbl_stitching')->where('jobcard_id',$id)->first();
        $handworkData = DB::table('tbl_handwork')->where('jobcard_id',$id)->first();
        if($data){
            return view('jobcard/jobcard-preview',compact('data','partyData','inhouseData','outhouseData','threadcuttingData','stitchingData','handworkData')); 
        }
    }

    public function jobcardDelete($id)
    {
        $status = 0;
        $update = DB::table('tbl_jobcard')->where('jobcard_id',$id)->update(['status'=>$status]);
        if($update){
            return redirect('/jobcard-display')->with('msg','Delete Jobcard Succuessfully'); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function jobcardUpdateView($id) 
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

    public function jobcardUpdate(Request $r)
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
        // $image = "";
        // if($r->hasFile('cimage')){
        //     $file=$r->file('cimage');
        //     $fname=$file->getClientOriginalName();
        //     $ext=$file->getClientOriginalExtension();
        //     $image=$fname;
        //     $dest=public_path('/ChallanImage/');
        //     $file->move($dest, $image);

        //     $update = DB::table('tbl_challan')->where('challan_id',$r->cid)->update([
        //         'party_id'=>$r->pid,
        //         'challan_name'=>$r->cname,
        //         'challan_date'=>$r->cdate,
        //         'challan_image'=>$image
        //     ]);
        //     if($update){
        //         return redirect('/challan-display')->with('msg','Challan update succussfuly');
        //     }else{
        //         return back()->with('error','Challan not create.');
        //     }
        // }else{
        //     $update = DB::table('tbl_challan')->where('challan_id',$r->cid)->update([
        //         'party_id'=>$r->pid,
        //         'challan_name'=>$r->cname,
        //         'challan_date'=>$r->cdate
        //     ]);
        //     if($update){
        //         return redirect('/challan-display')->with('msg','Challan update succussfuly');
        //     }else{
        //         return back()->with('error','Challan not create.');
        //     }
        // }
                
    }
}
