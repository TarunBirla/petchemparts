@extends('frontend.layouts.master')
@section('main-content')

    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: "Segoe UI", sans-serif;
        }

        .card {
            border-radius: 14px;
            border: none;
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            padding: 18px 25px;
        }

        .card-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            height: 45px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
        }

        .summary-box {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e2e2e2;
        }

        .summary-item {
            margin-bottom: 12px;
            font-size: 15px;
        }

        .summary-item strong {
            color: #333;
        }

        .summary-item span {
            float: right;
            font-weight: bold;
            color: #444;
        }

        h4 span {
            color: #007bff;
            font-weight: bold;
        }

        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            font-size: 15px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .summary-item span {
                float: none;
                display: block;
                margin-top: 4px;
            }
        }
    </style>


<section class="py-5">
    <div class="container">

        <div class="card shadow">
            <div class="card-header">
                <h4>Renew Order – {{ $order->order_number }}</h4>
            </div>

            <div class="card-body">

                @include('frontend.layouts.notification')

                <form action="{{ route('user.order.renew.update', $order->id) }}" method="POST" id="renewForm">
                    @csrf

                    <div class="row">

                        <!-- LEFT SECTION -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order No.</label>
                                <input type="text" class="form-control" value="{{ $order->order_number }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="{{ $order->first_name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="{{ $order->last_name }}" readonly>
                            </div>

                            <!--<div class="form-group">-->
                            <!--    <label>Start Date</label>-->
                            <!--    <input type="date" id="start_date" class="form-control"-->
                            <!--           value="{{ \Carbon\Carbon::parse($order->start_date)->toDateString() }}" readonly>-->
                            <!--</div>-->
                             <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" id="start_date" 
                                   class="form-control"
                                   value="{{ \Carbon\Carbon::parse($order->start_date)->toDateString() }}"
                                   readonly>
                        </div>

                            <!--<div class="form-group">-->
                            <!--    <label>End Date <span class="text-danger">(select to renew)</span></label>-->
                            <!--    <input type="date" name="end_date" id="end_date" class="form-control"-->
                            <!--           value="{{ \Carbon\Carbon::parse($order->end_date)->toDateString() }}" required>-->
                            <!--    @error('end_date')-->
                            <!--    <span class="text-danger">{{ $message }}</span>-->
                            <!--    @enderror-->
                            <!--</div>-->
                            
                             <div class="form-group">
                            <label>End Date <span class="text-danger">(week-wise only)</span></label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>

                        <!-- RIGHT SECTION (SUMMARY) -->
                        <div class="col-md-6">
                            <div class="summary-box shadow-sm">

                                <h5 class="mb-3 font-weight-bold">Renew Summary</h5>

                                <div class="summary-item">
                                    <strong>Per Week price:</strong>
                                    <span id="per_day">£{{ number_format($per_week_price, 2) }}</span>
                                </div>

                                <div class="summary-item">
                                    <strong>Current Rental Weeks:</strong>
                                    <span> {{ intval($order->rental_days / 7) }}</span>
                                </div>

                                <div class="summary-item">
                                    <strong>New Rental Weeks:</strong>
                                    <span id="new_days">-</span>
                                </div>

                                <div class="summary-item">
                                    <strong>New Subtotal:</strong>
                                    <span id="new_subtotal">£{{ number_format($order->sub_total, 2) }}</span>
                                </div>



                                <hr>
 <div class="summary-item">
                                <h4>Total:
                                    <span id="new_total">
                                        £{{ number_format($order->total_amount, 2) }}
                                    </span>
                                </h4>

                                 </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sync"></i> Renew Order
                                    </button>
                                    <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>
</section>

@endsection
<!-- JS -->
@section('scripts')
<script>
$(document).ready(function () {

    const $start = $("#start_date");
    const $end = $("#end_date");
    const $total = $("#total_price");
    const $subtotal = $("#subtotal_price");

    const weeklyPrice = parseFloat("{{ Helper::totalCartPrice() }}");

    let allowedDates = [];   // week-wise valid dates

    // Disable end until start selected
    $end.prop("disabled", true);

    // ON START DATE CHANGE
    $start.on("change", function () {
        createAllowedWeeks();
        $end.prop("disabled", false);
        $end.val("");
        resetPrice();
    });

    // ON END DATE CHANGE
    $end.on("change", function () {
        const val = $(this).val();

        if (!allowedDates.includes(val)) {
            alert("❌ Invalid date!\nPlease select only these dates:\n\n" + allowedDates.join("\n"));
            $(this).val("");   // reset wrong date
            resetPrice();
            return;
        }

        calculateWeekPrice();
    });

    // -----------------------
    //  Generate weekly dates
    // -----------------------
    function createAllowedWeeks() {
        const startVal = $start.val();
        if (!startVal) return;

        allowedDates = [];

        const start = new Date(startVal);

        for (let i = 1; i <= 12; i++) {  
            const next = addDays(start, i * 7);
            allowedDates.push(format(next));
        }

        // end date min & max lock
        $end.attr("min", allowedDates[0]);
        $end.attr("max", allowedDates[allowedDates.length - 1]);
    }

    // -----------------------
    //  PRICE CALCULATOR
    // -----------------------
    function calculateWeekPrice() {
        const s = new Date($start.val());
        const e = new Date($end.val());

        const diffDays = Math.floor((e - s) / 86400000);
        const weeks = diffDays / 7;

        const total = weeks * weeklyPrice;

        $subtotal.text("£" + total.toFixed(2));
        $total.text("£" + total.toFixed(2));
    }

    // -----------------------
    // Helper functions
    // -----------------------
    function addDays(d, days) {
        const newD = new Date(d);
        newD.setDate(newD.getDate() + days);
        return newD;
    }

    function format(d) {
        return d.toISOString().split("T")[0];
    }

    function resetPrice() {
        $subtotal.text("£0.00");
        $total.text("£0.00");
    }

});
</script>





@endsection