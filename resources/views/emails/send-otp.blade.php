<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OTP Registrasi Guru - CINTA</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9fafb;
        }
        .header {
            background: linear-gradient(135deg, #8B5CF6, #7C3AED);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: white;
            padding: 40px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .otp-code {
            font-size: 32px;
            font-weight: bold;
            color: #8B5CF6;
            text-align: center;
            letter-spacing: 10px;
            margin: 30px 0;
            padding: 20px;
            background: #f5f3ff;
            border-radius: 8px;
            border: 2px dashed #c4b5fd;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0;">Aplikasi CINTA</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">Complaint and Improvement Tracking Application</p>
        </div>
        
        <div class="content">
            <h2>Kode Verifikasi OTP</h2>
            <p>Halo,</p>
            <p>Anda sedang melakukan registrasi sebagai guru di aplikasi CINTA. Gunakan kode OTP berikut untuk melanjutkan:</p>
            
            <div class="otp-code">
                {{ $otpCode }}
            </div>
            
            <p><strong>Kode ini berlaku 10 menit.</strong> Jika Anda tidak melakukan permintaan ini, abaikan email ini.</p>
            
            <div class="footer">
                <p>&copy; {{ date('Y') }} CINTA - Complaint and Improvement Tracking Application</p>
                <p>Email ini dikirim secara otomatis, mohon tidak membalas.</p>
            </div>
        </div>
    </div>
</body>
</html>