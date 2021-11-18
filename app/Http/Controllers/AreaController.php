<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function constituency(){
        $constituency = \App\Models\Constituency::orderBy('id','DESC')->paginate();
        $states = \App\Models\State::where('country_id',101)->get();
        return view('area.constituency',  compact('constituency','states'));
    }
    
    public function constituency_store(Request $request){
        $this->validate($request, [
            'constituency_name' => 'required',
            'state_id' => 'required',
        ]);
        $constituency = new \App\Models\Constituency();
        $constituency->constituency_name = $request->constituency_name;
        $constituency->state_id = $request->state_id;
        $constituency->remarks = $request->remarks;
        if($constituency->save()){
            return redirect()->back()->with('success','Successfully saved');
        }
    }
    public function constituency_update(Request $request,$id){
        $this->validate($request, [
            'constituency_name' => 'required',
            'state_id' => 'required',
        ]);
        $constituency =  \App\Models\Constituency::find($id);
        if(!$constituency){
            abort(404);
        }
        $constituency->constituency_name = $request->constituency_name;
        $constituency->state_id = $request->state_id;
        $constituency->remarks = $request->remarks;
        if($constituency->save()){
            return redirect()->back()->with('success','Successfully saved');
        }
    }
    public function constituency_delete($id){
        $constituency =  \App\Models\Constituency::find($id);
        if(!$constituency){
            abort(404);
        }
        $constituency->delete();
        return redirect()->back()->with('success','Successfully deleted');
    }
    public function ward(){
        $wards = \App\Models\WardInfo::orderBy('id','DESC')->paginate();
        $constituency = \App\Models\Constituency::orderBy('id','DESC')->get();
        
        return view('area.ward',  compact('constituency','wards'));
    }
    
    public function ward_store(Request $request){
        $this->validate($request, [
            'ward_gp_name' => 'required',
            'constituency_id' => 'required',
        ]);
        $ward = new \App\Models\WardInfo();
        $ward->ward_gp_name = $request->ward_gp_name;
        $ward->constituency_id = $request->constituency_id;
        $ward->remarks = $request->remarks;
        if($ward->save()){
            return redirect()->back()->with('success','Successfully saved');
        }
    }
    public function ward_update(Request $request,$id){
        $this->validate($request, [
            'ward_gp_name' => 'required',
            'constituency_id' => 'required',
        ]);
        $ward = \App\Models\WardInfo::find($id);
        if(!$ward){
            abort(404);
        }
         $ward->ward_gp_name = $request->ward_gp_name;
        $ward->constituency_id = $request->constituency_id;
        $ward->remarks = $request->remarks;
        if($ward->save()){
            return redirect()->back()->with('success','Successfully saved');
        }
    }
    public function ward_delete($id){
        $ward = \App\Models\WardInfo::find($id);
        if(!$ward){
            abort(404);
        }
        $ward->delete();
        return redirect()->back()->with('success','Successfully deleted');
    }
}
