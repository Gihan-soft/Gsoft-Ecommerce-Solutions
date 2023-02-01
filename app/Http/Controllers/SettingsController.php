<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function settings(){

        $settings=Settings::first();
        return view('backend.settings.settings',compact('settings'));
    }

    public function settingsUpdate(Request $request){
       // dd($request->all());
        $settings=Settings::first();
        $status=$settings->update([
            'title'=>$request->title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'favicon'=>$request->favicon,
            'logo'=>$request->logo,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'fax'=>$request->fax,
            'footer'=>$request->footer,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'pinterest_url'=>$request->pinterest_url,


        ]);
        if($status){
            return back()->with('success','Settings successfully updated');
        }
        else{
            return back()->with('error','Some thing went wrong');
        }

    }
}
