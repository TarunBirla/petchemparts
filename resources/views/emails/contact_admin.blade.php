<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #F6F3EB; margin: 0; padding: 20px; color: #14150F; }
        .email-container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #E3DFCF; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #0E3D2A 0%, #1D6146 100%); padding: 24px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 22px; font-weight: 600; font-family: 'Fraunces', Georgia, serif; }
        .header p { margin: 6px 0 0; font-size: 13px; color: #E0B15E; }
        .content { padding: 28px; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 10px 0; border-bottom: 1px dashed #E3DFCF; font-size: 14px; }
        .info-label { font-weight: bold; color: #83887B; width: 130px; }
        .info-val { color: #14150F; }
        .message-box { background: #FAF8F5; border-left: 4px solid #AD8036; padding: 16px; font-size: 14.5px; line-height: 1.6; color: #334155; border-radius: 0 6px 6px 0; margin-top: 10px; }
        .footer { background: #F8FAFC; padding: 16px; text-align: center; font-size: 12px; color: #64748B; border-top: 1px solid #E2E8F0; }
        .btn-reply { display: inline-block; background: #0E3D2A; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; margin-top: 15px; font-size: 13px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Petchem Parts</h1>
            <p>New Website Contact Form Enquiry Received</p>
        </div>
        <div class="content">
            <h3 style="margin-top:0; color:#0E3D2A;">Contact Details</h3>
            <table class="info-table">
                <tr>
                    <td class="info-label">Customer Name:</td>
                    <td class="info-val"><strong>{{ $messageData->name }}</strong></td>
                </tr>
                <tr>
                    <td class="info-label">Email Address:</td>
                    <td class="info-val"><a href="mailto:{{ $messageData->email }}" style="color:#0E3D2A;">{{ $messageData->email }}</a></td>
                </tr>
                <tr>
                    <td class="info-label">Phone Number:</td>
                    <td class="info-val">{{ $messageData->phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="info-label">Subject:</td>
                    <td class="info-val"><strong>{{ $messageData->subject }}</strong></td>
                </tr>
                <tr>
                    <td class="info-label">Received At:</td>
                    <td class="info-val">{{ optional($messageData->created_at)->format('F d, Y - h:i A') ?? date('F d, Y - h:i A') }}</td>
                </tr>
            </table>

            <h4 style="margin: 20px 0 6px; color:#0E3D2A;">Message Content:</h4>
            <div class="message-box">
                {!! nl2br(e($messageData->message)) !!}
            </div>

            <div style="text-align: center; margin-top: 24px;">
                <a href="mailto:{{ $messageData->email }}?subject=RE: {{ urlencode($messageData->subject) }}" class="btn-reply">Reply to Customer Directly</a>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Petchem Parts Administration. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
