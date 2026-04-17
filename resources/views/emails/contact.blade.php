<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f5f7; font-family: 'Segoe UI', Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f5f7; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    
                    {{-- Header --}}
                    <tr>
                        <td style="background-color: #F47C21; padding: 30px 40px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">
                                ArtaOtto — New Contact Message
                            </h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding: 40px;">
                            <p style="color: #6b7280; font-size: 14px; margin: 0 0 24px 0;">
                                You have received a new message from the contact form on your website.
                            </p>

                            {{-- Sender Details --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9fafb; border-radius: 8px; padding: 24px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 12px 24px; border-bottom: 1px solid #e5e7eb;">
                                        <strong style="color: #374151; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">Name</strong>
                                        <p style="color: #111827; font-size: 16px; margin: 4px 0 0 0;">{{ $senderName }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 24px; border-bottom: 1px solid #e5e7eb;">
                                        <strong style="color: #374151; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">Email</strong>
                                        <p style="color: #111827; font-size: 16px; margin: 4px 0 0 0;">{{ $senderEmail }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 24px;">
                                        <strong style="color: #374151; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">Message</strong>
                                        <p style="color: #111827; font-size: 16px; margin: 4px 0 0 0; line-height: 1.6; white-space: pre-line;">{{ $senderMessage }}</p>
                                    </td>
                                </tr>
                            </table>

                            <p style="color: #9ca3af; font-size: 12px; margin: 0;">
                                You can reply directly to this email to respond to the sender.
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color: #1e1b4b; padding: 20px 40px; text-align: center;">
                            <p style="color: #818cf8; margin: 0; font-size: 12px;">
                                &copy; {{ date('Y') }} ArtaOtto. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
