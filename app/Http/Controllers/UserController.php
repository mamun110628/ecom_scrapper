<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $menu_item = array(
            'parent_menu'=>'user',
            'child'=>''
        );
        $users = \App\Models\User::orderBy('id','desc')->paginate(20);
        return view('user.index',  compact('users','menu_item'));
    }
    
    public function create(){
        $menu_item = array(
            'parent_menu'=>'user',
            'child'=>'user_create'
        );
//        $users = \App\Models\User::orderBy('id','desc')->paginate(20);
        return view('user.create',  compact('menu_item'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password'
        ]);
        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();
        return redirect()->route('user')->with('success', 'Successfully saved');
    }
    
     public function edit($id){
        $menu_item = array(
            'parent_menu'=>'user',
            'child'=>'user_create'
        );
        $user = \App\Models\User::find($id);
        return view('user.edit',  compact('menu_item','user'));
    }
    
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'confirm_password' => 'same:password'
        ]);
        $user = \App\Models\User::find($id);
        $user->name = $request->name;
        if($request->password && $request->password == $request->confirm_password){
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        
        $user->save();
        return redirect()->back()->with('success', 'Successfully saved');
    }


    public function profile(){
        $menu_item = array(
            'parent_menu'=>'profile',
            'child'=>''
        );
        $user = \App\Models\User::find(\Auth::user()->id);
        return view('auth.profile',  compact('user','menu_item'));
    }
    
    public function store_profile(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'confirm_password' => 'same:password'
        ]);
        $user = \App\Models\User::find(\Auth::user()->id);
        $user->name = $request->name;
        if($request->password && $request->password == $request->confirm_password){
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        
        $user->save();
        return redirect()->back()->with('success', 'Successfully saved');
    }
}
