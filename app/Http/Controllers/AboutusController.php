<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutusController extends Controller
{
    public function index(){
        $about=AboutUs::first();
        return view('backend.about.index',compact('about'));
    }
    
     public function aboutUpdate(Request $request){
        $about=AboutUs::first();

        $status=$about->update([
            'hedding'=>$request->hedding,
            'content'=>$request->input('content'),
            'experiance'=>$request->experiance,
            'happy_client'=>$request->happy_client,
            'team_advisor'=>$request->team_advisor,
            'return_customer'=>$request->return_customer,
            'image'=>$request->image,  
        ]);
        if($status){

        return redirect()->back()->with('success','successfully updated content');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }

}
