@extends('backend.layouts.master')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Products Attributes
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="/admin"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Products </li>
                        </ul>
                    </div>            
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                       @endforeach
                   </ul>
                   </div>
                    @endif
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">

                    <div class="card">
                        <div class="header">
                            <h2><strong>{{ucfirst($product->title)}}</strong> </h2>
                            <div class="row">
                                <div class="col-md-7">
                                    <form action="{{route('product.attribute',$product->id)}}" method="post">
                                        @csrf
                <div id="product_attribute" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
	<div class="row">
		<div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary btn-sm my-2"><i class="fas fa-plus-circle"></i></button></div>
	</div>
	<div class="row group">
		<div class="col-md-2">
        <label for="">Size</label>
			<input class="form-control form-control-sm" name="size[]" placeholder="eg.S" type="text">
		</div>
		<div class="col-md-3">
            <label for="">Original Price</label>
			<input class="form-control form-control-sm" name="original_price[]" step="any" placeholder="eg.2000" type="number">
		</div>
        <div class="col-md-3">
            <label for="">Offer Price</label>
			<input class="form-control form-control-sm" name="offer_price[]" step="any" placeholder="eg.2000" type="number">
		</div>
        <div class="col-md-2">
            <label for="">Stock</label>
			<input class="form-control form-control-sm" name="stock[]"  placeholder="eg.20" type="number">
		</div>
		
		<div class="col-md-2">
			<button type="button" class="btn btn-danger btnRemove btn-sm mt-3"> <i class="fas fa-trash"></i></button>
		</div>
       
    </div>
   
</div>
 <button type="submit" class="btn btn-info btn-sm">Submit</button>

  </form>
                                </div>

                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Original Price</th>
                                            <th>Offer Price</th>
                                            <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>  

                                    <tbody>
                                         @if(count($productattr)>0)
                                            @foreach($productattr as $item)
                                                <tr>
                                                <td>{{$item->size}}</td>
                                                <td>$ {{number_format($item->original_price,2)}}</td>
                                                <td>$ {{number_format($item->offer_price,2)}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>
                                            <form class="float-left ml-1" action="{{route('product.attribute.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="" class="dltBtn btn btn-sm btn-outline-danger" data-toggle="tooltip" title="delete" data-id="{{$item->id}}"  data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                    
                                        </form>
                                                </td>
                                                </tr>
                                            @endforeach
                                         @endif
                                    </tbody>
                                   
                                </table>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="body">
                            
                        </div>
                    </div>                   
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('backend/assets/js/jquery.multifield.min.js')}}"></script>

<script>
$('#product_attribute').multifield();
</script>



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
            url:"{{route('product.status')}}",
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