@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Shipping</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Shipping Methods</li>
                            <li class="breadcrumb-item active">Add Shippings</li>
                        </ul>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                       @endforeach
                   </ul>
                   </div>
                    @endif
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{route('shipping.store')}}" method="POST">
                                @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label for="">Shipping Address<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Shipping address" name="shipping_address" value="{{old('shipping_address')}}">
                                    </div>
                                </div>

                                    <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Delivery Time<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Delivery Time" name="delivery_time" value="{{old('delivery_time')}}">
                                    </div>

                                </div>
                              

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Delivery Charge</label> 
                                        <input type="number" id="delivery_charge" class="form-control" placeholder="Delivery Charge" name="delivery_charge" value="{{old('delivery_charge')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12  col-sm-12">
                                    <label for="status">Status</label>                                  
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Status --</option>
                                        <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                </div>
        </div>
        </form>
    </div>

@endsection


@section('scripts')

  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
   <script>$('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>

@endsection