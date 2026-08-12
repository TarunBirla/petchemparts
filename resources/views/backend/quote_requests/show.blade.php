@extends('backend.layouts.master')

@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-file-invoice mr-2"></i> Quote Request Details: <u>{{ $quote->quote_no }}</u>
        </h6>
        <a href="{{ route('admin.quote_requests.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left mr-1"></i> Back to Quote List</a>
    </div>

    <div class="card-body">
        @include('backend.layouts.notification')

        <div class="row mb-4">
            <!-- Customer Information Card -->
            <div class="col-md-6">
                <div class="card border-left-primary h-100 py-2">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-primary mb-3"><i class="fas fa-user-circle mr-2"></i> Customer Details</h5>
                        <p class="mb-2"><strong>Name:</strong> {{ $quote->name }}</p>
                        <p class="mb-2"><strong>Email:</strong> <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></p>
                        <p class="mb-2"><strong>Phone:</strong> <a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a></p>
                        @if($quote->company_name)
                        <p class="mb-2"><strong>Company:</strong> {{ $quote->company_name }}</p>
                        @endif
                        <p class="mb-2"><strong>Date Submitted:</strong> {{ $quote->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Status & Message Card -->
            <div class="col-md-6">
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-success mb-3"><i class="fas fa-info-circle mr-2"></i> Status & Message</h5>
                        
                        <form method="POST" action="{{ route('admin.quote_requests.status', $quote->id) }}" class="form-inline mb-3">
                            @csrf
                            <label class="mr-2 font-weight-bold">Current Status:</label>
                            <select name="status" class="form-control form-control-sm mr-2" onchange="this.form.submit()">
                                <option value="pending" {{ $quote->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="contacted" {{ $quote->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="completed" {{ $quote->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $quote->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>

                        @if($quote->message)
                        <div class="p-3 bg-light rounded border">
                            <strong>Message / Requirement:</strong>
                            <p class="mb-0 text-dark mt-1" style="white-space: pre-wrap;">{{ $quote->message }}</p>
                        </div>
                        @else
                        <p class="text-muted italic mb-0">No custom message provided.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Requested Products Table -->
        <h5 class="font-weight-bold text-dark mt-4 mb-3"><i class="fas fa-boxes mr-2"></i> Requested Products / Spare Parts ({{ $quote->items->count() }})</h5>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Product Title</th>
                        <th>Part Number</th>
                        <th>Model Number</th>
                        <th>Manufacturer</th>
                        <th>Quantity</th>
                        <th>Est. Unit Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quote->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $item->product_name }}</strong>
                        </td>
                        <td>
                            @if($item->part_number)
                                <span class="badge badge-secondary">{{ $item->part_number }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($item->model_number)
                                <span class="badge badge-light border">{{ $item->model_number }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $item->manufacturer_name ?? 'N/A' }}</td>
                        <td><strong>{{ $item->quantity }}</strong></td>
                        <td>£{{ number_format($item->unit_price, 2) }}</td>
                        <td>
                            @if($item->product)
                                <a href="{{ route('product-detail', $item->product->slug) }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fas fa-external-link-alt"></i> View Product
                                </a>
                            @else
                                <span class="text-muted">Deleted Product</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
