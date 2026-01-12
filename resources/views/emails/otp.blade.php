<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kode OTP - CINTA</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
        <div style="background: linear-gradient(135deg, #8b5cf6, #ec4899); padding: 32px; text-align: center;">
            <h1 style="color: white; font-size: 24px; margin: 0;">Sistem CINTA</h1>
            <p style="color: rgba(255,255,255,0.9); margin-top: 8px;">Complaint and Improvement Tracking Application</p>
        </div>
        
        <div style="padding: 32px;">
            <h2 style="color: #1f2937; font-size: 20px; margin-top: 0;">Kode Verifikasi Anda</h2>
            <p style="color: #4b5563; font-size: 16px;">
                Gunakan kode berikut untuk menyelesaikan registrasi akun guru Anda:
            </p>
            
            <div style="text-align: center; margin: 24px 0;">
                <div style="display: inline-block; background: #f3f4f6; border-radius: 12px; padding: 16px 32px;">
                    <span style="font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #1f2937;">
                        {{ $otp }}
                    </span>
                </div>
            </div>
            
            <p style="color: #6b7280; font-size: 14px; margin-top: 24px;">
                Kode ini berlaku selama <strong>3 menit</strong>. Jika Anda tidak meminta kode ini, abaikan email ini.
            </p>
        </div>
        
        <div style="background: #f9fafb; padding: 20px 32px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="color: #6b7280; font-size: 12px;">
                © {{ date('Y') }} Sistem CINTA - Hanya untuk penggunaan internal sekolah
            </p>
        </div>
    </div>
</body>
</html>