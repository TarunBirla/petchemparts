@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-invoice-dollar mr-2"></i>Quote Requests Management</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($quotes) > 0)
        <table class="table table-bordered table-hover" id="quote-dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th>S.N.</th>
              <th>Quote Ref</th>
              <th>Customer Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Total Items</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($quotes as $quote)   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $quote->quote_no }}</strong></td>
                    <td>{{ $quote->name }}</td>
                    <td><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></td>
                    <td><a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a></td>
                    <td>
                        <span class="badge badge-info">{{ $quote->items->count() }} Item(s)</span>
                    </td>
                    <td>
                        @if($quote->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($quote->status == 'contacted')
                            <span class="badge badge-primary">Contacted</span>
                        @elseif($quote->status == 'completed')
                            <span class="badge badge-success">Completed</span>
                        @else
                            <span class="badge badge-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('admin.quote_requests.show', $quote->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px; border-radius:50%" data-toggle="tooltip" title="View Quote Details" data-placement="bottom">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.quote_requests.destroy', $quote->id) }}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id="{{ $quote->id }}" style="height:30px; width:30px; border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete Quote"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        <div class="float-right mt-3">
            {{ $quotes->links() }}
        </div>
        @else
          <h6 class="text-center text-muted">No Quote Requests found.</h6>
        @endif
      </div>
    </div>
</div>
@endsection
