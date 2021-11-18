<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu_item = array(
            'parent_menu'=>'dashboard',
            'child'=>''
        );
        return view('home',compact('menu_item'));
    }
    
    public function node_setting_delete($id){
        $node_setting = \App\Models\NodeSetting::find($id);
        $node_setting->delete();
        return redirect()->back()->with('success','Successfully deleted');
    }
    
    public function node_setting(){
        $menu_item = array(
            'parent_menu'=>'node_setting',
            'child'=>''
        );
        $settings = \App\Models\NodeSetting::latest()->paginate(20);
        return view('node_setting.index',compact('settings','menu_item'));
    }
    public function node_setting_store(Request $request){
        $this->validate($request, [
            'domain' => 'required',
            'node' => 'required',
        ]);
        $node_setting = new \App\Models\NodeSetting();
        $node_setting->domain =$request->domain;
        $node_setting->node =$request->node;
        $node_setting->save();
        return redirect()->back()->with('success','Successfully Saved');
    }
    public function node_setting_update(Request $request,$id){
        $this->validate($request, [
            'domain' => 'required',
            'node' => 'required',
        ]);
        $node_setting =  \App\Models\NodeSetting::find($id);
        $node_setting->domain =$request->domain;
        $node_setting->node =$request->node;
        $node_setting->save();
        return redirect()->back()->with('success','Successfully Saved');
    }
    
    
}
