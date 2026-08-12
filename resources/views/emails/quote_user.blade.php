<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quote Request Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 650px; background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin: 0 auto; }
        .header { background: #0E3D2A; color: #ffffff; padding: 20px; text-align: center; border-radius: 6px 6px 0 0; }
        .header h2 { margin: 0; font-size: 22px; }
        .info-box { background: #F6F3EB; padding: 15px; border-radius: 6px; margin: 20px 0; border-left: 4px solid #0E3D2A; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table th, table td { padding: 10px 12px; border: 1px solid #ddd; text-align: left; font-size: 14px; }
        table th { background: #0E3D2A; color: #fff; }
        .footer { font-size: 12px; color: #777; margin-top: 25px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Petchem Parts — Quote Request Confirmation</h2>
        </div>
        <p>Dear <strong>{{ $quoteRequest->name }}</strong>,</p>
        <p>Thank you for reaching out to <strong>Petchem Parts</strong>. We have received your quote request and our technical sales team will review your requirements and get back to you shortly.</p>
        
        <div class="info-box">
            <p><strong>Quote Reference:</strong> {{ $quoteRequest->quote_no }}</p>
            <p><strong>Phone:</strong> {{ $quoteRequest->phone }}</p>
            <p><strong>Email:</strong> {{ $quoteRequest->email }}</p>
        </div>

        <h3>Items in Your Request</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Part No.</th>
                    <th>Model No.</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quoteRequest->items as $item)
                <tr>
                    <td><strong>{{ $item->product_name }}</strong></td>
                    <td>{{ $item->part_number ?? 'N/A' }}</td>
                    <td>{{ $item->model_number ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 20px;">If you have any urgent queries, please contact our team directly at <strong>+44 7879 175585</strong> or reply to this email.</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Petchem Parts. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
