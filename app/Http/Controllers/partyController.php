<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class partyController extends Controller
{
    public function partyCreateView()
    {
        return view('/party/party-create');
    }

    public function partyCreate(Request $r)
    {
            $isExists = DB::table('tbl_party')->where('party_gst',$r->gst)->first();
            if($isExists){
            return back()->with('error','GST number already exists');
            } else{
                $create = DB::table('tbl_party')->insert([
                    'party_name'=>$r->name,
                    'party_address'=>$r->address,
                    'party_gst'=>$r->gst
                ]);
        
                if($create){
                    return redirect('/party-display')->with('msg','Party Create Successfuly');
                }else{
                    return back()->with('error','Party Not Created');
                }
            }
    }

    public function partyDisplay()
    {
        $partyCount = DB::table('tbl_party')->where('status',1)->count();
        $partyList = DB::table('tbl_party')->where('status','1')
                        ->get();
        if($partyList){
            return view('party/party-display',compact('partyList','partyCount')); 
        }
    }

    public function partyDelete($id)
    {
        $status = 0;
        $update = DB::table('tbl_party')->where('party_id',$id)->update(['status'=>$status]);
        if($update){
            return redirect('/party-display')->with('msg','Delete Party Succuessfully'); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function partyUpdateView($id)
    {
        $data = DB::table('tbl_party')->where('party_id',$id)->first();
        if($data){
            return view('party/party-update',compact('data')); 
        }else{
            return back()->with('error','Somthing Want To Wrong');
        }
    }

    public function partyUpdate(Request $r)
    {
        $isExists = DB::table('tbl_party')->where('party_gst',$r->gst)->first();
            if($isExists){
            return back()->with('error','GST number already exists');
            } else{
                $update = DB::table('tbl_party')->where('party_id',$r->party_id)->update([
                    'party_name'=>$r->name,
                    'party_address'=>$r->address,
                    'party_gst'=>$r->gst
                ]);
                if($update){
                    return redirect('/party-display')->with('msg','Update Party Succuessfully'); 
                }else{
                    return back()->with('error','Somthing Want To Wrong');
                }
            }
    }

}
