@extends('user.layouts.master')

@section('title', 'Order Detail')

@section('main-content')

<style>
:root { --theme: #13A1F3; }

.detail-wrapper {
    padding: 10px;
}

/* Top bar */
.detail-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
    flex-wrap: wrap;
    gap: 12px;
}
.detail-topbar-left h4 {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a2e;
    margin: 0 0 2px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.detail-topbar-left p {
    font-size: 13px;
    color: #9ca3af;
    margin: 0;
}
.btn-pdf {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: var(--theme);
    color: #fff !important;
    text-decoration: none !important;
    padding: 9px 18px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    transition: background 0.15s;
}
.btn-pdf:hover { background: #0d7ec7; }

/* Metric cards */
.metrics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 14px;
    margin-bottom: 22px;
}
.metric-card {
    background: #fff;
    border: 1px solid #e8edf3;
    border-radius: 12px;
    padding: 16px 18px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04);
}
.metric-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #9ca3af;
    margin-bottom: 6px;
}
.metric-value {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1;
}
.metric-value.sm {
    font-size: 14px;
    font-weight: 600;
}

/* Badges */
.badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}
.badge-new      { background: #dbeafe; color: #1d4ed8; }
.badge-process  { background: #fef3c7; color: #92400e; }
.badge-delivered{ background: #d1fae5; color: #065f46; }
.badge-danger   { background: #fee2e2; color: #991b1b; }
.badge-secondary{ background: #f3f4f6; color: #6b7280; }

/* Info cards */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 22px;
}
.info-card {
    background: #fff;
    border: 1px solid #e8edf3;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04);
}
.info-card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 18px;
    border-bottom: 1px solid #f0f4f8;
    background: #f8fafc;
}
.info-card-header-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: #dbeafe;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    color: var(--theme);
    flex-shrink: 0;
}
.info-card-header-title {
    font-size: 13px;
    font-weight: 700;
    color: #1a1a2e;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.info-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}
.info-table tr td {
    padding: 11px 18px;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: top;
}
.info-table tr:last-child td {
    border-bottom: none;
}
.info-table td:first-child {
    color: #9ca3af;
    font-weight: 500;
    width: 42%;
}
.info-table td:last-child {
    color: #1a1a2e;
    font-weight: 600;
}

/* Action row */
.action-row {
    display: flex;
    align-items: center;
    gap: 10px;
}
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #f3f4f6;
    color: #374151;
    text-decoration: none !important;
    padding: 9px 18px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    transition: background 0.15s;
}
.btn-back:hover { background: #e5e7eb; }
.btn-delete {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #fee2e2;
    color: #dc2626;
    border: none;
    padding: 9px 18px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s;
}
.btn-delete:hover { background: #fecaca; }

@media (max-width: 640px) {
    .info-grid { grid-template-columns: 1fr; }
    .metrics-grid { grid-template-columns: 1fr 1fr; }
}
</style>

<div class="detail-wrapper">

    @if($order)

    {{-- Top bar --}}
    <div class="detail-topbar">
        <div class="detail-topbar-left">
            <h4>
                <i class="fas fa-receipt" style="color:var(--theme);"></i>
                Order Detail
                <span style="font-size:14px; font-weight:500; color:#9ca3af;">#{{ $order->order_number }}</span>
            </h4>
            <p>Placed on {{ $order->created_at->format('D, d M Y') }} at {{ $order->created_at->format('g:i a') }}</p>
        </div>
        <a href="{{ route('order.pdf', $order->id) }}" class="btn-pdf">
            <i class="fas fa-download"></i> Download PDF
        </a>
    </div>

    {{-- Metric Cards --}}
    <div class="metrics-grid">
        <div class="metric-card">
            <div class="metric-label">Order Number</div>
            <div class="metric-value sm">{{ $order->order_number }}</div>
        </div>
        <div class="metric-card">
            <div class="metric-label">Total Amount</div>
            <div class="metric-value">£{{ number_format($order->total_amount, 2) }}</div>
        </div>
        <div class="metric-card">
            <div class="metric-label">Quantity</div>
            <div class="metric-value">{{ $order->quantity }}</div>
        </div>
        <div class="metric-card">
            <div class="metric-label">Status</div>
            <div style="margin-top:6px;">
                @if($order->status == 'new')
                    <span class="badge badge-new"><i class="fas fa-star" style="font-size:10px;"></i> New</span>
                @elseif($order->status == 'process')
                    <span class="badge badge-process"><i class="fas fa-sync-alt" style="font-size:10px;"></i> Processing</span>
                @elseif($order->status == 'delivered')
                    <span class="badge badge-delivered"><i class="fas fa-check-circle" style="font-size:10px;"></i> Delivered</span>
                @else
                    <span class="badge badge-danger"><i class="fas fa-times-circle" style="font-size:10px;"></i> {{ ucfirst($order->status) }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Info Cards --}}
    <div class="info-grid">
        {{-- Order Info --}}
        <div class="info-card">
            <div class="info-card-header">
                <div class="info-card-header-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <span class="info-card-header-title">Order Information</span>
            </div>
            <table class="info-table">
                <tr>
                    <td>Order Number</td>
                    <td>{{ $order->order_number }}</td>
                </tr>
                <tr>
                    <td>Order Date</td>
                    <td>{{ $order->created_at->format('D d M, Y') }} at {{ $order->created_at->format('g:i a') }}</td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>{{ $order->quantity }} items</td>
                </tr>
                <tr>
                    <td>Order Status</td>
                    <td>
                        @if($order->status == 'new')
                            <span class="badge badge-new">New</span>
                        @elseif($order->status == 'process')
                            <span class="badge badge-process">Processing</span>
                        @elseif($order->status == 'delivered')
                            <span class="badge badge-delivered">Delivered</span>
                        @else
                            <span class="badge badge-danger">{{ ucfirst($order->status) }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td style="color:#13A1F3;">£{{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </table>
        </div>

        {{-- User Info --}}
        <div class="info-card">
            <div class="info-card-header">
                <div class="info-card-header-icon">
                    <i class="fas fa-user"></i>
                </div>
                <span class="info-card-header-title">User Information</span>
            </div>
            <table class="info-table">
                <tr>
                    <td>Full Name</td>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $order->address1 }}@if($order->address2), {{ $order->address2 }}@endif</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{ $order->country }}</td>
                </tr>
                <tr>
                    <td>Post Code</td>
                    <td>{{ $order->post_code }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="action-row">
        <a href="{{ route('user.order.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>
        <form method="POST" action="{{ route('order.destroy', [$order->id]) }}" style="margin:0;">
            @csrf
            @method('delete')
            <button type="button" class="btn-delete dltBtn" data-id="{{ $order->id }}">
                <i class="fas fa-trash-alt"></i> Delete Order
            </button>
        </form>
    </div>

    @endif
</div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dltBtn').click(function (e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this order!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) { form.submit(); }
                    else { swal("Your order is safe!"); }
                });
            });
        });
    </script>
@endpush