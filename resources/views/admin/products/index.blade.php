 <!-- start page content wrapper-->
<div class="page-content-wrapper">
  <!-- start page content-->
  <div class="page-content">
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Tables</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
            </li>
            @if(Request::segment(3) && Request::segment(4) )
            <li class="breadcrumb-item"><a href="{{url('/')}}/admin/category">Main Categories</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{Request::segment(3)}} Categories</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Main Categories</li>
            @endif
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addProductModal" onclick="editCategory(this)" >Add</button>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">{{Request::segment(3)}} Categories list</h6>
      @if (session('success'))
       <div class="alert alert-dismissible fade show py-2 bg-success">
          <div class="d-flex align-items-center">
            <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
            </div>
            <div class="ms-3">
              <div class="text-white">{{session('success')}}</div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif
    <hr/>
    <div class="card">

      <div class="card-body">
        <div class="table-responsive">
        <table id="DataTable" class="table table-striped table-bordered data-table" style="width:100%">
          <thead class="table-light">
            <tr>
              <th>S.no</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
       
      </div>
      </div>
    </div>
  </div>
  <!-- end page content-->
</div>
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="{{url('/')}}/admin/products/store" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="headerTitle">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          <input class="form-control mb-3" type="hidden" name="product_id" id="product_id">
          <input class="form-control mb-3" type="hidden" value="{{Request::segment(3)}}" name="parent_slug" id="parent_slug">
          <input class="form-control mb-3" type="hidden" value="{{base64_decode(Request::segment(4))}}" name="parent_id" id="parent_id">

          <div class="row">
            <div class="col-md-12">
              <label class="form-label">Product Name</label>
              <input class="form-control mb-3" type="text" name="product_name" id="product_name" placeholder="Product name" >
              <div class="invalid-feedback" id="err_product_name"></div>
            </div>
             <div class="col-md-12">
              <label class="form-label">Product Price</label>
              <input class="form-control mb-3" type="text" name="product_price" id="product_price" placeholder="Product Price" >
              <div class="invalid-feedback" id="err_product_price"></div>
            </div>
            <div class="col-md-12">
              <label class="form-label">Product Description</label>
              <textarea class="form-control mb-3"  name="product_desccription" id="product_desccription" placeholder="Product description"></textarea>
              <div class="invalid-feedback" id="err_product_desccription"></div>
            </div>
            <div class="col-md-12">
              <div class="wrapper">
                <div class="drop">
                  <div class="cont">
                    <i class="fa fa-cloud-upload"></i>
                    <div class="tit">
                      Drag & Drop
                    </div>
                    <div class="desc">
                      your files to Assets, or 
                    </div>
                    <div class="browse">
                      click here to browse
                    </div>
                  </div>
                  <output id="list"></output>
                  <input id="files" multiple="true" name="files[]" id="files" type="file" />
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="{{url('/')}}/admin/products/update">
        <div class="modal-header">
          <h5 class="modal-title" id="headerTitle">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          <input class="form-control mb-3" type="hidden" name="product_id" id="product_id">
          <div class="row">
            <div class="col-md-12">
              <label class="form-label">Product Name</label>
              <input class="form-control mb-3" type="text" name="product_name" id="product_name" placeholder="Product name" >
              <div class="invalid-feedback" id="err_product_name"></div>
            </div>
             <div class="col-md-12">
              <label class="form-label">Product Price</label>
              <input class="form-control mb-3" type="text" name="product_price" id="product_price" placeholder="Product Price" >
              <div class="invalid-feedback" id="err_product_price"></div>
            </div>
            <div class="col-md-12">
              <label class="form-label">Product Description</label>
              <textarea class="form-control mb-3"  name="product_desccription" id="product_desccription" placeholder="Product description"></textarea>
              <div class="invalid-feedback" id="err_product_desccription"></div>
            </div>
            <div class="col-md-12">
              <div class="wrapper">
                <div class="drop">
                  <div class="cont">
                    <i class="fa fa-cloud-upload"></i>
                    <div class="tit">
                      Drag & Drop
                    </div>
                    <div class="desc">
                      your files to Assets, or 
                    </div>
                    <div class="browse">
                      click here to browse
                    </div>
                  </div>
                  <output id="list"></output>
                  <input id="files" multiple="true" name="files[]" id="files" type="file" />
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div> -->
  <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
  <link href="{{ url('/') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <script src="{{ url('/') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="{{ url('/') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

<script>
    
    var keyword   = $('#keyword').val();
    var temp_url    = '<?php echo url("/");?>/admin/products/get_records';
    table_module    = $('#DataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "searching":true,
        "ordering": true,
        "destroy": true,
        ajax: 
        {
          'url'   : temp_url,
          type: 'post',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          'data' : {'keyword':keyword}
        },
       "columnDefs": [
          { orderable: false, targets: [ 0,2] }
        ]     
    });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 /* function submitForm(ref) {
    var form_data = new FormData();
    var id = $('#product_id').val();
     // Read selected files
     var totalfiles = document.getElementById('files').files.length;
     for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('files').files[index]);
     }
     form_data.append('product_name',$('#product_name').val());
     form_data.append('product_price',$('#product_price').val());
     form_data.append('product_price',$('#product_price').val());
     form_data.append('product_desccription',$('#product_desccription').val());
     form_data.append('product_id',$('#product_id').val());
     form_data.append('_token',"{{ csrf_token() }}");

    var url = "{{ url('/') }}" + "/admin/products/store";
    if (id && id!= undefined && id != '') 
      url = "{{ url('/') }}" + "/admin/products/update/" + id;

    $.ajax({ url: url,
      type: "POST",
      data: {form_data:form_data},
      dataType: 'json',
      cache : false,
      processData: false,
      success: function (data) {
        window.location.reload(true);
      },
      error: function (error) {
         var data = $.parseJSON(error.responseText);
        $.each(data.errors, function (key, value) {
          $('#err_' + key).html(value);
        });
      }
  });
}
*/

function editProduct(ref) {
    event.preventDefault();
    var id = $(ref).attr('data-id');
    if (id && id!= undefined) 
    {
      $.get("{{ url('/') }}" +'/admin/products/edit/' + id ,function (resp) 
      {
          console.log(resp.name)
           $('#headerTitle').html("Edit product");
           $('#product_id').val(resp.id);
           $('#product_name').val(resp.product_name);
           $('#product_price').val(resp.product_price);
           $('#product_desccription').val(resp.product_desccription);
       })
    }
    else
    {
      $('#headerTitle').html("Add product");
      $('#product_id').val('');
      $('#product_name').val('');
      $('#product_price').val('');
      $('#product_desccription').val('');
    }
}


</script>