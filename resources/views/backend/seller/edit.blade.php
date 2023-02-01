@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Banner</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Bannerss</li>
                            <li class="breadcrumb-item active">Edit Banners</li>
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
                            <form action="{{route('banner.update',$banner->id)}}" method="POST">
                                @csrf
                                @method('patch')
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Title<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{$banner->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">URL<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{$banner->slug}}">
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
                                      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                  </div>
                               <div id="holder" style="margin-top:15px;max-height:100px;"></div>
 
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label> 
                                        <textarea id="description" class="form-control" placeholder="Write some text" name="description">{{$banner->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12  col-sm-12">  
                                    <label for="">Condition</label>                              
                                    <select name="condition" class="form-control show-tick">
                                       
                                        <option value="banner" {{$banner->condition=='banner' ? 'selected' : ''}}>Banner</option>
                                        <option value="promo" {{$banner->condition=='promo' ? 'selected' : ''}}>Promote</option>
                                    </select>
                                </div>


                               
                            </div>
                            
                            <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Update</button>
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