@extends('frontend.layouts.master')

@section('content')

@if(count($banners)>0)

    <!-- Welcome Slides Area -->
    
     
          <section class="welcome_area">
               <div class="welcome_slides owl-carousel">
                @foreach ($banners as $banner)
            <!-- Single Slide -->
               <div class="single_slide bg-img" style="background-image: url({{$banner->photo}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-7 col-md-8">
                            <div class="welcome_slide_text">
                                <h2 data-animation="fadeInUp" data-delay="300ms">{{$banner->title}}</h2>
                                <h4 data-animation="fadeInUp" data-delay="600ms">{!! html_entity_decode($banner->description)!!}</h4>
                                <a href="{{$banner->slug}}" class="btn btn-primary" data-animation="fadeInUp" data-delay="1s">Shop
                                    Now</a> 
                            </div>
                        </div>
                        <div class="col-5 col-md-4">
                            <div class="welcome_slide_image">
                                <img src="{{asset('frontend/img/bg-img/slide-1.png')}}" alt="" data-animation="bounceInUp" data-delay="500ms">
                                <div class="discount_badge" data-animation="bounceInDown" data-delay="1.2s">
                                    <span>30%<br>OFF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
                @endforeach
              </div>
          </section>
   
     @endif
    <!-- Welcome Slides Area -->
@if(count($categories)>0)
    <!-- Top Catagory Area -->
    <div class="top_catagory_area mt-50 clearfix">
        <div class="container">
            <div class="row">

                @foreach ($categories as $category)
                
                <!-- Single Catagory -->
                <div class="col-12 col-md-4">
                    <div class="single_catagory_area mt-50">
                        <a href="{{route('product.category',$category->slug)}}">
                            <img src="{{$category->photo}}" alt="{{$category->title}}">
                        </a>
                    </div>
                </div>

                @endforeach
@endif
            </div> 
        </div>
    </div>
    <!-- Top Catagory Area -->

    
    
    @php
    $new_products=\App\Models\Product::where(['status'=>'active','conditions'=>'new'])->orderBy('id','DESC')->limit('8')->get();
    
    @endphp

    @if(count($new_products)>0)
    <!-- New Arrivals Area -->
    <section class="new_arrivals_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>New Arrivals</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                 
               
                        <!-- Single Product -->

@foreach ($new_products as $nproduct)

     @include('frontend.layouts._single-product',['product'=>$nproduct])

    <!-- New Arrivals Area -->





                 
            

@endforeach

   
@endif

</div>
        </div>    
        
    </section>

                


    <!-- Featured Products Area -->
    <section class="featured_product_area">
        <div class="container">
            <div class="row">
                <!-- Featured Offer Area -->
                <div class="col-12 col-lg-6">
                    <div class="featured_offer_area d-flex align-items-center"
                        style="background-image: url({{asset($promo_banners->photo)}});">
                        <div class="featured_offer_text">
                            <h2>{!! nl2br($promo_banners->description) !!}</h2>
                            <h4>{{ucfirst($promo_banners->title)}}</h4>
                            <a href="{{$promo_banners->slug}}" class="btn btn-primary btn-sm mt-3">Shop Now</a>
                        </div>
                    </div>
                </div>

                <!-- Featured Product Area -->
                <div class="col-12 col-lg-6">
                    <div class="section_heading featured">
                        <h5>Featured Products</h5>
                    </div>

                    <!-- Featured Product Slides -->
                    <div class="featured_product_slides owl-carousel">
                        <!-- Single Product -->
                        @foreach ($featured_products as $fproduct)
                            @include('frontend.layouts._single-product',['product'=>$fproduct])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Area -->

    <!-- Best Rated/Onsale/Top Sale Product Area -->
    <section class="best_rated_onsale_top_sellares section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs_area">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-tab">
                            <li class="nav-item active">
                                <a href="#top-sellers" class="nav-link" data-toggle="tab" role="tab">Top Selling Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#best-rated" class="nav-link" data-toggle="tab" role="tab">Best Rated</a>
                            </li>
                            
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="top-sellers">
                                <div class="top_sellers_area">
                                    <div class="row">
                            @foreach ($best_sellings as $product)
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">

                                                    @php
                                                      $photo=explode(',',$product->photo);
                                                    @endphp

                                                    <img src="{{asset($photo[0])}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>{{ucfirst($product->title)}}</h5>
                                                    <h6>${{$product->offer_price}}<span>${{$product->price}}</span></h6>
                                                    <div class="top_seller_product_rating">
                                               
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="javascript:void(0);" data-quantity="1" data-product-id="{{$product->id}}" class="add_to_cart" id="add_to_cart{{$product->id}}"><i class="icofont-shopping-cart"></i>
                                                               </a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                           <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}" id="add_to_wishlist_{{$product->id}}"><i
                                                                    class="icofont-heart"></i></a>
                                                        </div>

                                                       

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview{{$product->id}}"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            @endforeach
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="best-rated">
                                <div class="best_rated_area">
                                    <div class="row">
                                        @foreach ($best_rated as $product)
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">

                                                    @php
                                                      $photo=explode(',',$product->photo);
                                                    @endphp

                                                    <img src="{{asset($photo[0])}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>{{ucfirst($product->title)}}</h5>
                                                    <h6>${{$product->offer_price}}<span>${{$product->price}}</span></h6>
                                                    <div class="top_seller_product_rating">
                                               
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div
                                                        class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="javascript:void(0);" data-quantity="1" data-product-id="{{$product->id}}" class="add_to_cart" id="add_to_cart{{$product->id}}"><i class="icofont-shopping-cart"></i>
                                                               </a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                           <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}" id="add_to_wishlist_{{$product->id}}"><i
                                                                    class="icofont-heart"></i></a>
                                                        </div>

                                                       

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview{{$product->id}}"><i
                                                                    class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Rated/Onsale/Top Sale Product Area -->

    <!-- Offer Area -->
    <section class="offer_area">
        <div class="container">
            <div class="row">
                <!-- Beach Offer -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="beach_offer_area mb-4 mb-md-0">
                        <img src="{{asset('frontend/img/product-img/beach.png')}}" alt="beach-offer">
                        <div class="beach_offer_info">
                            <p>Upto 70% OFF</p>
                            <h3>Beach Item</h3>
                            <a href="#" class="btn btn-primary btn-sm mt-15">SHOP NOW</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Apparels Offer -->
                    <div class="apparels_offer_area">
                        <img src="{{asset('frontend/img/product-img/apparels.jpg')}}" alt="Beach-Offer">
                        <div class="apparels_offer_info d-flex align-items-center">
                            <div class="apparels-offer-content">
                                <h4>Apparel &amp; <br><span>Garments</span></h4>
                                <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Deals of the Week -->
                    <div class="weekly_deals_area mt-30">
                        <img src="{{asset('frontend/img/product-img/weekly-offer.jpg')}}" alt="weekly-deals">
                        <div class="weekly_deals_info">
                            <h4>Deals of the Week</h4>
                            <div class="deals_timer">
                                <ul data-countdown="2021/02/14 14:21:38">
                                    <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                    <li><span class="days">00</span>days</li>
                                    <li><span class="hours">00</span>hours</li>
                                    <li class="d-block blank-timer"></li>
                                    <li><span class="minutes">00</span>min</li>
                                    <li><span class="seconds">00</span>sec</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <!-- Elect Offer -->
                            <div class="elect_offer_area mt-30 mt-lg-0">
                                <img src="{{asset('frontend/img/product-img/elect.jpg')}}" alt="Elect-Offer">
                                <div class="elect_offer_info d-flex align-items-center">
                                    <div class="elect-offer-content">
                                        <h4>Electronics</h4>
                                        <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <!-- Backpack Offer -->
                            <div class="backpack_offer_area mt-30">
                                <img src="{{asset('frontend/img/product-img/backpack.jpg')}}" alt="Backpack-Offer">
                                <div class="backpack_offer_info">
                                    <h4>Backpacks</h4>
                                    <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Area End -->
    
    @if(count($brands)>0)
    <!-- Popular Brands Area -->
    <section class="popular_brands_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular_section_heading mb-50">
                        <h5>Popular Brands</h5>
                    </div>
                </div>
                <div class="col-12">
                    <div class="popular_brands_slide owl-carousel">
                @foreach ($brands as $item)
                        <div class="single_brands">
                            <img src="{{asset($item->photo)}}" alt="{{$item->title}}">
                        </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Popular Brands Area -->

    <!-- Special Featured Area -->
    <section class="special_feature_area pt-5">
        <div class="container">
            <div class="row">
                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_feature_area mb-5 d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-ship"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>Free Shipping</h6>
                            <p>For orders above $100</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_feature_area mb-5 d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-box"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>Happy Returns</h6>
                            <p>7 Days free Returns</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_feature_area mb-5 d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-money"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>100% Money Back</h6>
                            <p>If product is damaged</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_feature_area mb-5 d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-live-support"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>Dedicated Support</h6>
                            <p>We provide support 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Featured Area -->

@endsection




@section('scripts')

<!---add to cart---->
<script>
    $(document).on('click','.add_to_cart',function(e){
        e.preventDefault();
        var product_id=$(this).data('product-id');
        var product_qty=$(this).data('quantity');
      

        var token="{{csrf_token()}}";
        var path="{{route('cart.store')}}"; 

        $.ajax({
               url:path,
               type:"POST",
               dataType:"JSON",
               data:{        //data value in ins->network
                   product_id:product_id,
                   product_qty:product_qty,
                   _token:token,
               },
               beforeSend:function(){
                $('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading....');
               },

                complete:function(){
                $('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus fa-spin"></i> Add to Cart');
               },

               success:function(data){
                 console.log(data);
                 if(data['status']){
                     $('body #header-ajax').html(data['header']);
                     $('body #cart_counter').html(data['cart_count']);
                    swal({
                          title: "Good job!",
                          text: data['message'],
                          icon: "success",
                          button:"Ok!",
                        });
                 }

                },

                 error:function(err){
                    console.log(err);
                }


        });
        

    });
</script>

<!--add to wishlist---->

<script>
    $(document).on('click','.add_to_wishlist',function(e){
        e.preventDefault();
        var product_id=$(this).data('id');
        var product_qty=$(this).data('quantity');
      

        var token="{{csrf_token()}}";
        var path="{{route('wishlist.store')}}"; 

        $.ajax({
               url:path,
               type:"POST",
               dataType:"JSON",
               data:{        //data value in ins->network
                   product_id:product_id,
                   product_qty:product_qty,
                   _token:token,
               },
               beforeSend:function(){
                $('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner fa-spin"></i>');
               },

                complete:function(){
                $('#add_to_wishlist_'+product_id).html('<i class="fas fa-heart"></i>');
               },

               success:function(data){
               console.log(data);
                 
                 if(data['status']){
                     $('body #header-ajax').html(data['header']);
                     $('body #wishlist_counter').html(data['wishlist_count']);
                    swal({
                          title: "Good job!",
                          text: data['message'],
                          icon: "success",
                          button:"Ok!",
                        });
                 }
                else if(data['present']){
                     $('body #header-ajax').html(data['header']);
                     $('body #wishlist_counter').html(data['wishlist_count']);
                       swal({
                          title: "Opps!",
                          text: data['message'],
                          icon: "warning",
                          button:"Ok!",
                        });
                }
                else{
                     swal({
                          title: "Sorry",
                          text: "You can't add product",
                          icon: "error",
                          button:"Ok!",
                        });
                }
                },

                 error:function(err){
                    console.log(err);
                }


        });
        

    });
</script>

@endsection