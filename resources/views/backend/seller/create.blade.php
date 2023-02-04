@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Banner</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Banners</li>
                            <li class="breadcrumb-item active">Add Banners</li>
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
                            <form action="{{route('seller.store')}}" method="POST">
                                @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label for=""> Full Name<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Title" name="full_name" value="{{old('full_name')}}">
                                    </div>
                                </div>
                      
                                    <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Email<span class="text-danger">*</span></label> 
                                        <input type="email" class="form-control" placeholder="email" name="email" value="{{old('email')}}">
                                    </div>
                              
                                    </div>
                                    <div class="col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label for="">Password<span class="text-danger">*</span></label> 
                                        <input type="password" class="form-control" placeholder="password" name="password" value="{{old('password')}}">
                                    </div>
                                </div>

                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Photo</label> 
                                        <div class="input-group">

                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                     </span>
                                      <input id="thumbnail" class="form-control" type="text" name="photo">
                                  </div>
                               <div id="holder" style="margin-top:15px;max-height:100px;"></div>
 
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Contact No<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="phone" name="phone" value="{{old('phone')}}">
                                    </div>

                                </div>

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label> 
                                        <textarea id="address" class="form-control" placeholder="Write some text" name="address">{{old('address')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12  col-sm-12">  
                                    <label for="">Is Verified</label>                              
                                    <select name="is_verfied" class="form-control show-tick">
                                        <option value="1" {{old('is_verfied')=='1' ? 'selected' : ''}}>Verify</option>
                                        <option value="0" {{old('is_verfied')=='0' ? 'selected' : ''}}>Not Verify</option>
                                    </select>
                                </div>


                                <div class="col-lg-12  col-sm-12">
                                    <label for="status">Status</label>                                  
                                    <select name="status" class="form-control show-tick">
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