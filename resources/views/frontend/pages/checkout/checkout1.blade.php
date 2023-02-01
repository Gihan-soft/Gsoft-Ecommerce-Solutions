@extends('frontend.layouts.master')

@section('content')

<!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('userhome')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Checkout Step Area -->
    <div class="checkout_steps_area">
        
        <a class="active" href="checkout-2.html"><i class="icofont-check-circled"></i> Billing</a>
        <a href="checkout-3.html"><i class="icofont-check-circled"></i> Shipping</a>
        <a href="checkout-4.html"><i class="icofont-check-circled"></i> Payment</a>
        <a href="checkout-5.html"><i class="icofont-check-circled"></i> Review</a>
    </div>

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($errors->any())
                      <div class="alert alert-danger" id="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                 <li>{{$error}}</li>
                            @endforeach
                        </ul>
                      </div>

                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-4">Billing Details</h5>
                        <form action="{{route('checkout1.store')}}" method="post">
                            @csrf
                            <div class="row">
                                @php
                                    $name=explode(' ',$user->full_name);
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{$name[0]}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="{{$name[1]}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="{{$user->email}}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" id="phone" min="0" value="{{$user->phone}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control"  id="country"  value="{{$user->country}}" placeholder="eg.Sri Lanka">
                                   
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street_address">Street address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Street Address" value="{{$user->address}}">
                                </div>
                               
                                <div class="col-md-6 mb-3">
                                    <label for="city">Town/City</label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="Town/City" value="{{$user->city}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control" id="state" placeholder="State" value="{{$user->state}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="Postcode / Zip" value="{{$user->postcode}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" name="note" id="order-notes" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>

                            <!-- Different Shipping Address -->
                            <div class="different-address mt-50">
                                <div class="ship-different-title mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Ship to same address?</label>
                                    </div>
                                </div>
                                <div class="row shipping_input_field">
                                    <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="sfirst_name" class="form-control" id="sfirst_name" placeholder="First Name" value="{{$name[0]}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="slast_name" class="form-control" id="slast_name" placeholder="Last Name" value="{{$name[1]}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" name="semail" class="form-control" id="semail" placeholder="Email Address" value="{{$user->email}}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" name="sphone" class="form-control" id="sphone" min="0" value="{{$user->phone}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Country</label>
                                    <input type="text" name="scountry" class="form-control"  id="scountry"  value="{{$user->scountry}}" placeholder="eg.Sri Lanka">
                                   
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street_address">Street address</label>
                                    <input type="text" name="saddress" class="form-control" id="saddress" placeholder="Street Address" value="{{$user->saddress}}">
                                </div>
                               
                                <div class="col-md-6 mb-3">
                                    <label for="city">Town/City</label>
                                    <input type="text" name="scity" class="form-control" id="scity" placeholder="Town/City" value="{{$user->scity}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">State</label>
                                    <input type="text" name="sstate" class="form-control" id="sstate" placeholder="State" value="{{$user->sstate}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text"  name="spostcode" class="form-control" id="spostcode" placeholder="Postcode / Zip" value="{{$user->spostcode}}">
                                </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
                <input type="hidden" name="sub_total" value="{{(float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">
                 <input type="hidden" name="total_amount" value="{{(float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">
                <div class="col-12">
                    <div class="checkout_pagination d-flex justify-content-end mt-50">
                        <a href="{{route('cart')}}" class="btn btn-primary mt-2 ml-2">Go Back</a>
                        <button type="submit" class="btn btn-primary mt-2 ml-2">Continue</button>
                    </div>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <!-- Checkout Area -->

@endsection


@section('scripts')

<script>
    $('#customCheck1').on('change',function(e){
        e.preventDefault();
        if(this.checked){
            $('#sfirst_name').val($('#first_name').val());
            $('#slast_name').val($('#last_name').val());
            $('#semail').val($('#email').val());
            $('#sphone').val($('#phone').val());
            $('#scountry').val($('#country').val());
            $('#scity').val($('#city').val());
            $('#spostcode').val($('#postcode').val());
            $('#sstate').val($('#state').val());
            $('#saddress').val($('#address').val());

        }
        else{

            $('#sfirst_name').val("");
            $('#slast_name').val("");
            $('#semail').val("");
            $('#sphone').val("");
            $('#scountry').val("");
            $('#saddress').val("");
            $('#scity').val("");
            $('#sstate').val("");
            $('#spostcode').val("");

        }

    })
</script>

@endsection