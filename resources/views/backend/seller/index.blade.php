@extends('backend.layouts.master')

@section('content')

 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Sellers
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('seller.create')}}"><i class="icon-plus"></i>Add Seller</a></h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="/admin"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Seller</li>
                        </ul>
                        <p class="float-right">Total Sellers: {{$sellers->count()}}</p>
                    </div>            
                </div>
            </div>
            

        
            <div class="row clearfix">
                  <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Category::where('status','active')->count()}} <i class="fas fa-sitemap float-right"></i></h3>
                            <span>Total Categories</span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\Product::where('status','active')->count()}} <i class="fas fa-suitcase float-right"></i></h3>
                            <span>Total Products</span>        
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                            <div class="progress-bar" data-transitiongoal="68"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{\App\Models\User::where('status','active')->count()}}<i class="fas fa-user-plus float-right"></i></h3>
                            <span>New Customers</span>                    
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                            <div class="progress-bar" data-transitiongoal="67"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>2,318 <i class="fas fa-money-bill-alt float-right"></i></h3>
                            <span>Net Profit</span>       
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                            <div class="progress-bar" data-transitiongoal="89"></div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Seller</strong> List</h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Is verified</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                            
                                    <tbody>
                                       @foreach($sellers as $item)
                                       <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td><img src="{{$item->photo ==null ? Helper::userDefaultImage() : asset($item->photo)}}"alt="Profile" style="max-height:90px;max-width:90px;"></td>
                                     <td>{{$item->full_name}}</td>
                                     <td>{{$item->username}}</td>
                                     <td>{{$item->email}}</td>
                                     <td>{{$item->address}}</td>
                                     <td>{{$item->phone}}</td>
                                      <td>
                                        <input type="checkbox" name="verified" value="{{$item->id}}" data-toggle="switchbutton" {{$item->is_verified ? 'checked' : ''}} data-onlabel="Yes" data-offlabel="No" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                     </td>

                                     <td>
                                        <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                     </td>

                                     <td>
                                        <a href="{{route('seller.edit',$item->id)}}" class="float-left btn btn-sm btn-outline-warning" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                        <form class="float-left ml-1" action="{{route('seller.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                       <a href="" class="dltBtn btn btn-sm btn-outline-danger" data-toggle="tooltip" title="delete" data-id="{{$item->id}}"  data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                    
                                        </form>
                                          </td>
                                    


                                       </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.dltBtn').click(function(e){
    var form=$(this).closest('form');
    var dataID=$(this).data('id');
    e.preventDefault();

    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    form.submit();
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});

});
</script>

<script>
    $('input[name=toogle]').change(function(){
           var mode=$(this).prop('checked');
           var id=$(this).val();
           //alert(id);
           $.ajax({
            url:"{{route('seller.status')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function (response) {
                if(response.status)
                {
                    alert(response.msg);
                }
                else
                {
                    alert('please try again');
                }
            }
           })
    });

</script>

<script>
    $('input[name=verified]').change(function(){
           var mode=$(this).prop('checked');
           var id=$(this).val();
           //alert(id);
           $.ajax({
            url:"{{route('seller.verified')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function (response) {
                if(response.status)
                {
                    alert(response.msg);
                }
                else
                {
                    alert('please try again');
                }
            }
           })
    });

</script>

@endsection