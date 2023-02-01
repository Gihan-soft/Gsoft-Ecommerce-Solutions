<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductOrder;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use DB;


class IndexController extends Controller
{
    public function home()   //homepage
    {   
        $banners=Banner::where(['status'=>'active','condition'=>'banner'])
        ->orderBy('id','DESC')->limit('5')->get();   //like select 
        $promo_banners=Banner::where(['status'=>'active','condition'=>'promo'])
        ->orderBy('id','DESC')->limit('5')->first();   //like select 
         $categories=Category::where(['status'=>'active','is_parent'=>'1'])
        ->orderBy('id','DESC')->limit('3')->get();   
         $new_products=Product::where(['status'=>'active','conditions'=>'new'])
         ->orderBy('id','DESC')->limit('8')->get();
          $featured_products=Product::where(['status'=>'active','is_featured'=>1])
         ->orderBy('id','DESC')->limit('6')->get();
         $brands=Brand::where(['status'=>'active'])
         ->orderBy('id','DESC')->get();

         //best selling products
        $items=DB::table('product_orders')->select('product_id',DB::raw('COUNT(product_id) as count'))->groupBy('product_id')
                       ->orderBy("count",'desc')->get();
        $product_ids=[];
        foreach($items as $item){  //pass product ids to an array
            array_push($product_ids,$item->product_id);
        }
        $best_sellings=Product::whereIn('id',$product_ids)->get();

        //Top rated products
        $items_rated=DB::table('product_reviews')->select('product_id',DB::raw('AVG(rate) as count'))->groupBy('product_id')
                       ->orderBy("count",'desc')->get();
        
        $product_ids=[];
        foreach($items_rated as $item){  //pass product ids to an array
            array_push($product_ids,$item->product_id);
        }
        $best_rated=Product::whereIn('id',$product_ids)->get();

        

        

        return view('frontend.index',compact(['banners','categories','new_products','featured_products','promo_banners','brands','best_sellings','best_rated'
    ]));

    }

    public function aboutUs(){
        $about=AboutUs::first();
        $brands=Brand::where(['status'=>'active'])
         ->orderBy('id','DESC')->get();
        return view('frontend.pages.about_us',compact(['about','brands']));
    }

    public function contactUs(){
        return view('frontend.pages.contact_us');
    }

    public function contactSubmit(Request $request){
        
        $this->validate($request,[
               'f_name'=>'string|required',
               'l_name'=>'string|required',
               'email'=>'email|required',
               'subject'=>'min:4|string|required',
               'message'=>'string|nullable|max:255',
        ]);

        $data=$request->all();

       Mail::to('customer@gmail.com')->send(new Contact($data));
       return back()->with('success','successfully sent your inquiry');
      
    }






    public function shop(Request $request){     //shop page
        $products=Product::query();

        if(!empty($_GET['category'])){

            $slugs=explode(',',$_GET['category']);
            $cat_ids=Category::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();   //wherein use cat has multiple slugs
            $products=$products->whereIn('cat_id',$cat_ids);
           
        }

        //brand filter
        if(!empty($_GET['brand'])){

            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();   //wherein use cat has multiple slugs
            $products=$products->whereIn('brand_id',$brand_ids);
           
        }

        
         //size filter
        if(!empty($_GET['size'])){
            $products=$products->where('size',$_GET['size']);
           
        }






        if(!empty($_GET['sortBy'])){
           
             if($_GET['sortBy']=='priceAsc'){
                $products=$products->where(['status'=>'active'])
                ->orderBy('offer_price','ASC');
            }
            if($_GET['sortBy']=='priceDesc'){
                $products=$products->where(['status'=>'active'])
                ->orderBy('price','DESC');
            }
             if($_GET['sortBy']=='discAsc'){
                $products=$products->where(['status'=>'active'])
                ->orderBy('offer_price','ASC');
            }
             if($_GET['sortBy']=='discDesc'){
                $products=$products->where(['status'=>'active'])
                ->orderBy('price','DESC');
            }
             if($_GET['sortBy']=='titleAsc'){
                $products=$products->where(['status'=>'active'])
                ->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='titleDesc'){
                $products=$products->where(['status'=>'active'])
                ->orderBy('title','DESC');
            }
            
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);

            //dd($price);

            $price[0]=floor($price[0]);
            $price[1]=ceil($price[1]);
            $products=$products->whereBetween('offer_price',$price)->where('status','active')->paginate(12);

           // dd($products);
        }

        else{
        $products=$products->where('status','active')->paginate(12);
        }
    
        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $cats=Category::where(['status'=>'active','is_parent'=>'1'])->with('products')->orderBy('title','ASC')->get();
        
        return view('frontend.pages.product.shop',compact('products','cats','brands'));

    }

   public function shopFilter(Request $request){   //select cat check box
         $data=$request->all();
         
         //Category filter

         $catUrl='';
         if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catUrl)){   //selected cat
                    $catUrl.='&category='.$category;
                }

                else{                   //has previous cat
                    $catUrl .=','.$category;
                }
            }

         }
            //Sort  filter
            $sortByUrl="";
            if(!empty($data['sortBy'])){
                $sortByUrl .='&sortBy='.$data['sortBy'];
            }

            //Price filter
            $price_range_url="";
            if(!empty($data['price_range'])){
                $price_range_url .= '&price='.$data['price_range'];
            }

            //brand filter
            $brandUrl="";
            if(!empty($data['brand'])){
                
            foreach($data['brand'] as $brand){
                if(empty($brandUrl)){   //selected brand
                    $brandUrl.='&brand='.$brand;
                }

                else{                   //has previous brand
                    $brandUrl .=','.$brand;
                }
            }
            }

             //Size filter
              $sizeUrl="";
              if(!empty($data['size'])){
                 $sizeUrl .='&size='.$data['size'];
               

              }

         return \redirect()->route('shop',$catUrl.$sortByUrl.$price_range_url.$brandUrl.$sizeUrl);
   }


    public function productCategory(Request $request,$slug)
    {
         //dd($slug);
         $categories=Category::with('products')->where('slug',$slug)->first();
         //return $categories;

         $sort='';
//sort option in product
                         
         if($request->sort != null)
         {
            $sort=$request->sort;
         }
         if($categories==null)
         {
            return view('errors.404');
         }
         else
         {
            if($sort=='priceAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->orderBy('offer_price','ASC')->paginate(12);
            }
            elseif($sort=='priceDesc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->orderBy('price','DESC')->paginate(12);
            }
             elseif($sort=='discAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->orderBy('offer_price','ASC')->paginate(12);
            }
             elseif($sort=='discDesc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->orderBy('price','DESC')->paginate(12);
            }
             elseif($sort=='titleAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->orderBy('title','ASC')->paginate(12);
            }
            elseif($sort=='titleDesc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->orderBy('title','DESC')->paginate(12);
            }
            else
            {
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])
                ->paginate(12);
            }

         }
         $route='product-category';
        if($request->ajax()){
            $view=view('frontend.layouts._single-product',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }



         return view('frontend.pages.product.product-category',compact(['categories','route','products']));
    }
    
    //autosearch
     public function autoSearch(Request $request){
        $query=$request->get('term','');
       // dd($query);
        $products=Product::where('title','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach($products as $product){
            $data[]=array('value'=>$product->title,'id'=>$product->id);
        }
        if(count($data)){
            return $data;
        }
        else{
            return ['value'=>"No Result Found",'id'=>''];
        }
        
    }

    //search product
    public function search(Request $request){
        $query=$request->input('query');
        $products=Product::where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(12);

        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $cats=Category::where(['status'=>'active','is_parent'=>'1'])->with('products')->orderBy('title','ASC')->get();
        return view('frontend.pages.product.shop',compact('products','cats','brands'));
    }
   

    //product details
     public function productDetail($slug)
    {
        //dd($slug);
         $product=Product::with('rel_prods')->where('slug',$slug)->first();
         //return $product;
         if($product){
         return view('frontend.pages.product.product-detail',compact(['product']));
         }
         else
         {
            return 'product details not found';
         }
    }


    //user auth
    public function userAuth()
    {   
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.auth');

    }

    public function loginSubmit(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'email'=>'email|required|exists:users,email',
            'password'=>'required|min:3',
        ]);

        if(Auth::attempt(['email' =>$request->email, 'password' =>$request->password,'status'=>'active']))

        {
           Session::put('user',$request->email);

           if(Session::get('url.intended'))
           {
             return Redirect::to(Session::get('url.intended'));
           }

           else{

            return redirect()->route('userhome')->with('success','Successfully Login');
        }
    }
        else
        {
            return back()->with('error','Invalid email & password');
        }

    }

    public function registerSubmit(Request $request)
    {
        
        $this->validate($request,[
            'username'=>'nullable|string',
            'full_name'=> 'nullable|string',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        $data=$request->all();
        $check=$this->create($data);
        Session::put('user',$data['email']);
        Auth::login($check);
        if($check){
            return redirect()->route('userhome')->with('success','Successfully Registered');
        }
        else
        {
            return back()->with('error',['Please check your credentials']);
        }
        
    }

    private function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' =>Hash::make($data['password']),
        ]);
    }

    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect('/')->with('success','successfully logout');

}

    public function userDashboard()
    {   
        $user=Auth::user();
        //dd($user);
        return view('frontend.user.dashboard',compact('user'));
    }


    public function userOrder()
    {   
        $user=Auth::user();
        return view('frontend.user.order',compact('user'));
    }


    public function userAddress()
    {   
        $user=Auth::user();
        return view('frontend.user.address',compact('user'));
    }


    public function userAccount()
    {   
        $user=Auth::user();
        return view('frontend.user.account',compact('user'));
    }


     public function billingAddress(Request $request,$id)
     {
        $user=User::where('id',$id)->update(
            ['country'=>$request->country,
            'city'=>$request->city,
            'postcode'=>$request->postcode,
            'address'=>$request->address,
            'state'=>$request->state
        ]);

        if($user){

            return back()->with('success','Billing Address Successfully Updated');
        }
        else{
              return back()->with('error','Something went wrong');
        }

    }

         public function shippingAddress(Request $request,$id)
     {
        $user=User::where('id',$id)->update(
            ['scountry'=>$request->scountry,
            'scity'=>$request->scity,
            'spostcode'=>$request->spostcode,
            'saddress'=>$request->saddress,
            'sstate'=>$request->sstate
        ]);

        if($user){

            return back()->with('success','Shipping Address Successfully Updated');
        }
        else{
              return back()->with('error','Something went wrong');
        }

     }


     public function updateAccount(Request $request,$id){

        $this->validate($request,[
            'newpassword'=>'nullable|min:3',
            'oldpassword'=>'nullable|min:3',
            'full_name'=>'required|string',
            'username'=>'nullable|string',
            'phone'=>'nullable|min:8',
            

        ]);

     
        $hashpassword=Auth::user()->password;
        if($request->oldpassword==null && $request->newpassword==null)
        {
            User::where(['full_name'=>$request->full_name,'username'=>$request->username,
                        'phone'=>$request->phone]);
        }
        else
        {
            if(\Hash::check($request->oldpassword,$hashpassword)){
                if(!\Hash::check($request->newpassword,$hashpassword)){
                     User::where(['full_name'=>$request->full_name,'username'=>$request->username,
                        'phone'=>$request->phone,'password'=>Hash::make($request->newpassword)]);
                           return back()->with('success','Account successfully updated');  //old pw != new pw update account
                     
                } else{
                       return back()->with('error','New password and old password can not be same');
                }
            }

            else{
                return back()->with('error','old password does not match');
            }
        }
     }

   


}