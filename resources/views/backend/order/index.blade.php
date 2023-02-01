@extends('backend.layouts.master')

@section('content')

 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Orders
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="/admin"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Order</li>
                        </ul>
                        <p class="float-right">Total Orders: {{\App\Models\Order::count()}}</p>
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
                            <h2><strong>Order</strong> List</h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;">S.N.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Payment Method</th>
                                            <th>Order Status</th>                                    
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $item)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->first_name}}&nbsp;&nbsp;{{$item->last_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->payment_method=="cod" ? "Cash on delivery": $item->payment_method}}</td>
                                            <td>{{ucfirst($item->payment_status)}}</td>
                                            <td>{{number_format($item->total_amount)}}</td>
                                            <td><span class="badge 
                                            @if($item->condition=='pending')
                                                   badge-info
                                            @elseif($item->condition=='processing')
                                                   badge-primary
                                            @elseif($item->condition=='delivered')
                                                   badge-success
                                            @else
                                                   badge-danger
                                            @endif
                                            ">{{$item->condition}}</span></td>
                                            <td>
                                                <a href="{{route('order.show',$item->id)}}" class="float-left btn btn-sm btn-outline-warning" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                        <form class="float-left ml-1" action="{{route('order.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                       <a href="" class="dltBtn btn btn-sm btn-outline-danger" data-toggle="tooltip" title="delete" data-id="{{$item->id}}"  data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                    
                                        </form>
                                    </td>
                                            </tr>
                                        
                                        @empty
                                            <tr>
                                                <td>No Orders</td>
                                            </tr>
                                        @endforelse
                                        

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

<!--export js-->
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<!-------------------->

<script>
    $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
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
            url:"{{route('coupon.status')}}",
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