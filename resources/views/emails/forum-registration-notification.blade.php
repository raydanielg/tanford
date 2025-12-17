<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Forum Registration</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #059669; color: white; padding: 20px; text-align: center; }
        .content { background-color: #f9f9f9; padding: 20px; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
        .details { background-color: white; padding: 15px; margin: 15px 0; border-left: 4px solid #059669; }
        .details p { margin: 8px 0; }
        .label { font-weight: bold; color: #059669; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Forum Registration</h1>
        </div>
        <div class="content">
            <p>A new forum registration has been submitted:</p>
            
            <div class="details">
                <p><span class="label">Forum:</span> {{ $registration->forum_name }}</p>
                <p><span class="label">Name:</span> {{ $registration->name }}</p>
                <p><span class="label">Email:</span> {{ $registration->email }}</p>
                <p><span class="label">Phone:</span> {{ $registration->phone }}</p>
                <p><span class="label">Organization:</span> {{ $registration->organization }}</p>
                <p><span class="label">Attendee Type:</span> {{ $registration->attendee_type }}</p>
                @if($registration->booth)
                    <p><span class="label">Booth:</span> {{ $registration->booth }}</p>
                @endif
                @if($registration->sponsorship_package)
                    <p><span class="label">Sponsorship Package:</span> {{ $registration->sponsorship_package }}</p>
                @endif
                <p><span class="label">Status:</span> {{ ucfirst($registration->status) }}</p>
                <p><span class="label">Submitted:</span> {{ $registration->created_at->format('d M Y, H:i') }}</p>
            </div>
            
            <p>Please review and approve/reject this registration in the admin panel.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Tanford UAE. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
