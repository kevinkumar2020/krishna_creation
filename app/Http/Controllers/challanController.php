<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class challanController extends Controller
{
    public function challanCreateView()
    {
        $partyData = DB::table('tbl_party')->where('status',1)->get();
        if($partyData){
            return view('/challan/challan-create',compact('partyData'));
        }
    }

    public function challanCreate(Request $r)
    {
        $image = "";
        if($r->hasFile('cimage')){
            $file=$r->file('cimage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/ChallanImage/');
            $file->move($dest, $image);

            $insert = DB::table('tbl_challan')->insert([
                'party_id'=>$r->pid,
                'challan_name'=>$r->cname,
                'challan_date'=>$r->cdate,
                'challan_image'=>$image
            ]);
            if($insert){
                return redirect('/challan-create-view')->with('msg','Challan create succussfuly');
            }else{
                return back()->with('error','Challan not create.');
            }

        }else{
            return back()->with('error','Somthing want to worng');
        }
    }

    public function challanDisplay()
    {
        $challanCount = DB::table('tbl_challan')->where('status',1)->count();
        $challanList = DB::table('tbl_challan')
                        ->where('tbl_challan.status',1)
                        ->join('tbl_party','tbl_challan.party_id','=','tbl_party.party_id')
                        ->get();

        if($challanList){
            return view('challan/challan-display',compact('challanList','challanCount')); 
        }
    }

    public function challanDelete($id)
    {
        $status = 0;
        $update = DB::table('tbl_challan')->where('challan_id',$id)->update(['status'=>$status]);
        if($update){
            return redirect('/challan-display')->with('msg','Delete Challan Succuessfully'); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function challanUpdateView($id)
    {
        $partyData = DB::table('tbl_party')->where('status',1)->get();
        $challanData = DB::table('tbl_challan')->where('challan_id',$id)
                                            ->join('tbl_party','tbl_challan.party_id','=','tbl_party.party_id')
                                            ->first();
        if($challanData){
            return view('challan/challan-update',compact('challanData','partyData')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function challanUpdate(Request $r)
    {
        $image = "";
        if($r->hasFile('cimage')){
            $file=$r->file('cimage');
            $fname=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $image=$fname;
            $dest=public_path('/ChallanImage/');
            $file->move($dest, $image);

            $update = DB::table('tbl_challan')->where('challan_id',$r->cid)->update([
                'party_id'=>$r->pid,
                'challan_name'=>$r->cname,
                'challan_date'=>$r->cdate,
                'challan_image'=>$image
            ]);
            if($update){
                return redirect('/challan-display')->with('msg','Challan update succussfuly');
            }else{
                return back()->with('error','Challan not create.');
            }
        }else{
            $update = DB::table('tbl_challan')->where('challan_id',$r->cid)->update([
                'party_id'=>$r->pid,
                'challan_name'=>$r->cname,
                'challan_date'=>$r->cdate
            ]);
            if($update){
                return redirect('/challan-display')->with('msg','Challan update succussfuly');
            }else{
                return back()->with('error','Challan not create.');
            }
        }
                
    }
}
