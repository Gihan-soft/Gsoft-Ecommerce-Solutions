@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Aboutus</h2>
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
                            <form action="{{route('about.update')}}" method="POST">
                                @method('put')
                                @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12">
                             @include('backend.layouts.notification')
                            </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Headding<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="hedding" name="hedding" value="{{$about->hedding}}">
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Content</label> 
                                        <textarea class="form-control" rows="5" placeholder="Write some text" name="content">{{$about->content}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Image</label> 
                                        <div class="input-group">

                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                     </span>
                                      <input id="thumbnail" class="form-control" type="text" name="image" value="{{asset($about->image)}}">
                                  </div>
                               <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                              
                                  <img src="{{asset($about->image)}}" alt="image" style="max-width:100px;border:1px solid #ddd;padding:4px 8px;">
                              
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Year's of Experiance</label> 
                                        <input type="number" class="form-control" placeholder="experiance" name="experiance" value="{{$about->experiance}}">
                                    </div>
                                </div>


                               <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Happy Customer</label> 
                                        <input type="number" class="form-control" placeholder="happy_customer" name="happy_customer" value="{{$about->happy_customer}}">
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Team Advisor</label> 
                                        <input type="number" class="form-control" placeholder="team_advisor" name="team_advisor" value="{{$about->team_advisor}}">
                                    </div>
                                </div>


                               <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Return Customer</label> 
                                        <input type="number" class="form-control" placeholder="return_customer" name="return_customer" value="{{$about->return_customer}}">
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