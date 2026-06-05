@extends('user.layouts.master')

@section('title', 'My Orders')

@section('main-content')

<style>
:root { --theme: #13A1F3; }

.orders-wrapper {
    padding: 10px;
}

/* Page heading */
.page-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 10px;
}
.page-heading h4 {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a2e;
    margin: 0;
}
.page-heading p {
    font-size: 13px;
    color: #9ca3af;
    margin: 0;
}

/* Card */
.orders-card {
    background: #fff;
    border: 1px solid #e8edf3;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 1px 6px rgba(0,0,0,0.05);
}

/* Table */
.orders-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}
.orders-table thead th {
    background: #f8fafc;
    color: #9ca3af;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    padding: 12px 16px;
    border-bottom: 1px solid #e8edf3;
    white-space: nowrap;
}
.orders-table tbody tr {
    border-bottom: 1px solid #f3f4f6;
    transition: background 0.12s;
}
.orders-table tbody tr:last-child {
    border-bottom: none;
}
.orders-table tbody tr:hover {
    background: #f8fafc;
}
.orders-table td {
    padding: 13px 16px;
    color: #374151;
    vertical-align: middle;
}

.order-number {
    font-weight: 600;
    color: var(--theme);
    font-size: 13px;
}
.order-name {
    font-weight: 600;
    color: #1a1a2e;
}
.order-email {
    color: #6b7280;
    font-size: 13px;
}
.order-amount {
    font-weight: 700;
    color: #1a1a2e;
}

/* Badges */
.badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}
.badge-new     { background: #dbeafe; color: #1d4ed8; }
.badge-process { background: #fef3c7; color: #92400e; }
.badge-delivered { background: #d1fae5; color: #065f46; }
.badge-cancelled { background: #fee2e2; color: #991b1b; }
.badge-secondary { background: #f3f4f6; color: #6b7280; }

/* Action buttons */
.action-cell {
    display: flex;
    align-items: center;
    gap: 6px;
}
.btn-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    border: none;
    cursor: pointer;
    transition: opacity 0.15s, transform 0.15s;
    text-decoration: none;
}
.btn-icon:hover {
    opacity: 0.85;
    transform: scale(1.05);
}
.btn-view   { background: #dbeafe; color: #1d4ed8; }
.btn-delete { background: #fee2e2; color: #dc2626; }

/* Empty state */
.empty-state {
    text-align: center;
    padding: 60px 20px;
}
.empty-state-icon {
    width: 72px;
    height: 72px;
    background: #f3f4f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 30px;
    color: #d1d5db;
}
.empty-state h5 {
    font-size: 16px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
}
.empty-state p {
    font-size: 13px;
    color: #9ca3af;
}

/* Pagination */
.pagination-wrapper {
    padding: 14px 16px;
    border-top: 1px solid #f3f4f6;
    display: flex;
    justify-content: flex-end;
}
</style>

<div class="orders-wrapper">

    @include('user.layouts.notification')

    <div class="page-heading">
        <div>
            <h4><i class="fas fa-box-open mr-2" style="color:var(--theme);"></i> My Orders</h4>
            <p>Track and manage all your orders</p>
        </div>
    </div>

    <div class="orders-card">
        @if(count($orders) > 0)
            <div style="overflow-x:auto;">
                <table class="orders-table" id="order-dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Qty</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $index => $order)
                            @php
                                $statusMap = [
                                    'new'       => ['class' => 'badge-new',       'icon' => 'fa-star',        'label' => 'New'],
                                    'process'   => ['class' => 'badge-process',   'icon' => 'fa-sync-alt',    'label' => 'Processing'],
                                    'delivered' => ['class' => 'badge-delivered', 'icon' => 'fa-check-circle','label' => 'Delivered'],
                                    'cancelled' => ['class' => 'badge-cancelled', 'icon' => 'fa-times-circle','label' => 'Cancelled'],
                                ];
                                $st = $statusMap[$order->status] ?? ['class' => 'badge-secondary', 'icon' => 'fa-circle', 'label' => ucfirst($order->status)];
                            @endphp
                            <tr>
                                <td style="color:#9ca3af; font-size:13px;">{{ $order->id }}</td>
                                <td><span class="order-number">{{ $order->order_number }}</span></td>
                                <td><span class="order-name">{{ $order->first_name }} {{ $order->last_name }}</span></td>
                                <td><span class="order-email">{{ $order->email }}</span></td>
                                <td>{{ $order->quantity }}</td>
                                <td><span class="order-amount">£{{ number_format($order->total_amount, 2) }}</span></td>
                                <td>
                                    <span class="badge {{ $st['class'] }}">
                                        <i class="fas {{ $st['icon'] }}" style="font-size:10px;"></i>
                                        {{ $st['label'] }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-cell">
                                        <a href="{{ route('user.order.show', $order->id) }}"
                                           class="btn-icon btn-view"
                                           title="View Order">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form method="POST" action="{{ route('user.order.delete', $order->id) }}" style="margin:0;">
                                            @csrf
                                            @method('delete')
                                            <button type="button"
                                                    class="btn-icon btn-delete dltBtn"
                                                    data-id="{{ $order->id }}"
                                                    title="Delete Order">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $orders->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h5>No orders yet</h5>
                <p>You haven't placed any orders. Start shopping to see them here.</p>
            </div>
        @endif
    </div>
</div>

@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
        div.dataTables_wrapper div.dataTables_paginate { display: none; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

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
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Your order is safe!");
                    }
                });
            });
        });
    </script>
@endpush