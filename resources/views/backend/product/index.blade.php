@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Product Lists</h6>
      <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($products)>0)
          <table class="table table-hover table-bordered align-middle" id="product-dataTable">

            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Part No</th>
                    <th>Model No</th>
                    <th>Manufacturer</th>
                    <th>Category</th>
                    <th>Pdf</th>
                    <th>Brand</th>
                    <!-- <th>Status</th> -->
                    <th width="120">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($products as $product)

                @php
                    $photos = json_decode($product->photo, true);
                @endphp

                <tr>
                    <td>{{ $product->id }}</td>

                    <td>{{ $product->title ?? '-' }}</td>

                    <td>{{ $product->part_number ?? '-' }}</td>

                    <td>{{ $product->model_number ?? '-' }}</td>
                    {{-- Manufacturer --}}
                        <td>
                            {{ optional($product->manufacturer)->name ?? '-' }}
                        </td>

                        {{-- Category --}}
                        <td>
                            {{ optional($product->cat_info)->title ?? '-' }}
                        </td>

                        {{-- PDF --}}
                        <td>
                            @if($product->pdf)
                                <a href="{{ asset($product->pdf->file) }}" target="_blank">
                                    {{ basename($product->pdf->file) }}
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        {{-- Brand --}}
                        <td>
                            {{ optional($product->brand)->title ?? '-' }}
                        </td>

                    

                    <td class="text-center">
                        <a href="{{route('product.edit',$product->id)}}"
                           class="btn btn-sm btn-primary">
                           <i class="fas fa-edit"></i>
                        </a>

                        <form method="POST"
                              action="{{route('product.destroy',$product->id)}}"
                              style="display:inline-block;">
                            @csrf
                            @method('delete')

                            <button class="btn btn-sm btn-danger dltBtn"
                                    data-id="{{$product->id}}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>

        </table>
        <div class="d-flex justify-content-center mt-3">
          {{ $products->links('pagination::bootstrap-4') }}
      </div>
        @else
          <h6 class="text-center">No Products found!!! Please create Product</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
     
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
      }
      .pagination {
    justify-content: center;
}

.page-item.active .page-link {
    background-color: #4e73df;
    border-color: #4e73df;
}

.page-link {
    color: #4e73df;
}
.pagination {
    justify-content: center;
    gap: 6px;
}

.page-item .page-link {
    border-radius: 8px !important;
    padding: 8px 14px;
    color: #4e73df;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.page-item .page-link:hover {
    background: #4e73df;
    color: #fff;
    border-color: #4e73df;
}

.page-item.active .page-link {
    background: linear-gradient(45deg, #4e73df, #224abe);
    border: none;
    color: #fff;
    font-weight: bold;
    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
}

.page-item.disabled .page-link {
    color: #aaa;
    background: #f8f9fc;
}
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#product-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
