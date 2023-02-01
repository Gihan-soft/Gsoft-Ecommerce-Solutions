@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Settings</h2>
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
                            <form action="{{route('settings.update')}}" method="POST">
                                @method('put')
                                @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12">
                             @include('backend.layouts.notification')
                            </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Project Title<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$settings->title}}">
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Meta Keywords</label> 
                                        <input type="text" class="form-control" placeholder="Meta Keywords" name="meta_keywords" value="{{$settings->meta_keywords}}">
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Footer</label> 
                                        <input type="text" class="form-control" placeholder="Footer" name="footer" value="{{$settings->footer}}">
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Meta Description</label> 
                                        <textarea class="form-control" rows="5" placeholder="Write some text" name="meta_description">{{$settings->meta_description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Logo</label> 
                                        <div class="input-group">

                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                     </span>
                                      <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$settings->logo}}">
                                  </div>
                               <div id="holder" style="margin-top:15px;max-height:100px;"></div>
 
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Favicon</label> 
                                        <div class="input-group">

                                <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                     </span>
                                      <input id="thumbnail1" class="form-control" type="text" name="favicon" value="{{$settings->favicon}}">
                                  </div>
                               <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
 
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Email Address<span class="text-danger">*</span></label> 
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{$settings->email}}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label> 
                                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{$settings->address}}">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Phone No<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Phone No" name="phone" value="{{$settings->phone}}">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Fax<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Fax" name="fax" value="{{$settings->fax}}">
                                    </div>
                                </div>

                                <!-------------------->

                                 <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Facebook URL<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Facebook URL" name="facebook_url" value="{{$settings->facebook_url}}">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Twitter URL</label> 
                                        <input type="text" class="form-control" placeholder="twitter_url" name="twitter_url" value="{{$settings->twitter_url}}">
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Linkedin URL</label> 
                                        <input type="text" class="form-control" placeholder="Linkedin URL" name="linkedin_url" value="{{$settings->linkedin_url}}">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Pinterest URL</label> 
                                        <input type="text" class="form-control" placeholder="Pinterest URL" name="pinterest" value="{{$settings->pinterest_url}}">
                                    </div>
                                </div>

                              </div>

                              <div class="col-md-12"></div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
        </form>
    </div>

@endsection


@section('scripts')

  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
   <script>
   $('#lfm').filemanager('image');
   $('#lfm1').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>

@endsection