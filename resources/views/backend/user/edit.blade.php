@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit User</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                            <form action="{{route('user.update',$user->id)}}" method="POST">
                                @csrf
                                @method('patch')
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Full Name<span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" placeholder="Full name" name="full_name" value="{{$user->full_name}}">
                                    </div>
                                </div>

                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Userame</label> 
                                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{$user->username}}">
                                    </div>
                                </div>

                                    <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label> 
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                              
                                 
                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Contact No</label> 
                                        <input type="text" class="form-control" placeholder="Contact No" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label> 
                                        <textarea class="form-control" placeholder="Address" name="address">{{$user->address}}</textarea>
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
                                      <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
                                  </div>
                               <div id="holder" style="margin-top:15px;max-height:100px;"></div>
 
                                    </div>
                                </div>

                                 <div class="col-lg-12  col-sm-12"> 
                                <label for="status">Role</label>                               
                                    <select name="role" class="form-control show-tick">
                                        <option value="">-- Role --</option>
                                        <option value="admin"   {{$user->role=='admin' ? 'selected':''}}>Admin</option>
                                        <option value="customer" {{$user->role=='customer' ? 'selected':''}}>Customer</option>
                                        <option value="vendor" {{$user->role=='vendor' ? 'selected':''}}>Vendor</option>
                                    </select>
                                </div>
                              


                                 
                            <div class="col-lg-12  col-sm-12"> 
                                <label for="status">Status</label>                               
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Status --</option>
                                        <option value="active" {{$user->role=='active' ? 'selected' : ''}}>Active</option>
                                         <option value="inactive" {{$user->role=='inactive' ? 'selected' : ''}}>Inactive</option> 
                                    </select>
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

  <script>
      $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        //alert(is_checked);
        if(is_checked)
        {
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val('');
        }
        else
        {
            $('#parent_cat_div').removeClass('d-none');
        }

      })
  </script>

@endsection