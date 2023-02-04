<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SellerAuth;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers=Seller::orderBy('id','DESC')->get();
        return view('backend.seller.index',compact('sellers'));
    }

     public function sellerStatus(Request $request)
    {
        if($request->mode=='true')
        {
            DB::table('sellers')->where('id',$request->id)->update(['status'=>'active']);
        }

        else
        {
            DB::table('sellers')->where('id',$request->id)->update(['status'=>'inactive']);
        }

        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
        
    }


    public function sellerVerified(Request $request)
    {
        if($request->mode=='true')
        {
            DB::table('sellers')->where('id',$request->id)->update(['is_verified'=>1]);
        }

        else
        {
            DB::table('sellers')->where('id',$request->id)->update(['is_verified'=>0]);
        }

        return response()->json(['msg'=>'Successfully updated ','status'=>true]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name'=> 'required|string',
            'address'=> 'nullable|string',
            'email' => 'email|required|unique:sellers,email',
            'password' => 'required|min:3',
            'photo'=>'required',
            'is_verified'=>'nullable|in:1,0',
            'status'=>'nullable|in:active,inactive',
            

        ]);
        $data= $request->all();
        $status=Seller::create($data);
        if($status){
            return redirect()->route('seller.index')->with('success','Seller successfully added');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $seller=Seller::find($id);
       if($seller)
       {
        return view('backend.seller.edit',compact('seller'));
       }
       else
       {
        return back()->with('error','Data not found');
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=Seller::find($id);
        if($user){
            $this->validate($request,[
            'full_name'=>'string|required',
            'username'=>'string|nullable',
            'email'=>'email|required|exists:sellers,email',
            'phone'=>'string|nullable',
            'photo'=>'required',
            'address'=>'string|nullable',
            'is_verified'=>'nullable|in:1,0',
            'status'=>'required|in:active,inactive'
            ]);

            $data=$request->all();

            $status=$user->fill($data)->save();
            if($status){
                return redirect()->route('seller.index')->with('success','seller successfully updated');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','User not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $seller=Seller::find($id);
       if($seller)
       {
        $status= $seller->delete();
           if($status)
           {
              return redirect()->route('seller.index')->with('success','Seller successfully deleted');
           }

           else
           {
             return back()->with('error','Something went wrong');
           }

       }
       else
       {
        return back()->with('error','Data not found');
       }
    }
}
