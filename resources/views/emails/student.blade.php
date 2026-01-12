<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Diterima - CINTA BK</title>
</head>
<body style="margin:0; padding:0; background-color:#f9fafb; font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f9fafb; padding:20px;">
    <tr>
      <td align="center">
        <!-- Main Card -->
        <table role="presentation" width="100%" max-width="600" cellspacing="0" cellpadding="0" style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:24px; overflow:hidden; box-shadow:0 10px 25px -5px rgba(0,0,0,0.1);">
          <!-- Header -->
          <tr>
            <td style="background:linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%); padding:40px 24px; text-align:center;">
              <div style="font-size:48px; line-height:1; margin-bottom:16px;">✨</div>
              <h1 style="color:white; font-weight:800; font-size:28px; margin:0; line-height:1.3;">
                Hai, {{ $student_name }}!
              </h1>
              <p style="color:rgba(255,255,255,0.9); font-size:18px; margin-top:8px; font-weight:500;">
                Ceritamu sudah kami terima 💬
              </p>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="padding:32px 24px;">
              <p style="color:#374151; font-size:16px; line-height:1.6; margin:0 0 24px;">
                Tim BK akan segera menindaklanjuti laporanmu. Untuk kasus darurat, kami prioritaskan dalam <strong>1–6 jam</strong>.
              </p>

              <!-- Code Box -->
              <div style="background:#f0f9ff; border:2px dashed #3b82f6; border-radius:16px; padding:20px; text-align:center; margin:24px 0;">
                <p style="color:#374151; font-size:14px; margin:0 0 8px; font-weight:600;">🔑 Kode Rahasia Laporanmu</p>
                <p style="font-size:26px; font-weight:800; color:#1d4ed8; font-family:monospace; margin:0; letter-spacing:1px;">
                  {{ $unique_code }}
                </p>
              </div>

              <p style="color:#374151; font-size:16px; line-height:1.6; margin:0 0 24px;">
                <strong>Jangan lupa simpan kode ini!</strong> Kamu butuh saat ingin cek status laporan.
              </p>

              <!-- Button -->
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center">
                    <a href="{{ $tracking_url }}" target="_blank"
                      style="display:inline-block; background:linear-gradient(135deg, #8b5cf6, #ec4899); color:white; text-decoration:none; font-weight:700; font-size:16px; padding:14px 32px; border-radius:14px; box-shadow:0 4px 12px rgba(139, 92, 246, 0.3);">
                      🔍 Cek Status Laporan
                    </a>
                  </td>
                </tr>
              </table>

              <!-- Privacy Badge -->
              <div style="background:#f0fdf4; border-left:4px solid #10b981; border-radius:12px; padding:16px; margin-top:28px;">
                <p style="color:#065f46; font-weight:700; margin:0 0 6px; display:flex; align-items:center; gap:6px;">
                  <span>🔒</span> Privasi 100% Terjamin
                </p>
                <p style="color:#065f46; font-size:14px; margin:0;">
                  Ceritamu hanya dibaca oleh tim BK yang terpercaya. Kami jaga kerahasiaanmu sepenuhnya.
                </p>
              </div>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:24px; text-align:center; border-top:1px solid #e5e7eb; color:#6b7280; font-size:13px;">
              <p style="margin:0;">
                © {{ date('Y') }} CINTA Counseling • Layanan BK Sekolah
              </p>
              <p style="margin:8px 0 0;">
                Email ini dikirim otomatis. Mohon tidak dibalas.
              </p>
            </td>
          </tr>
        </table>

        <!-- Spacer -->
        <div style="height:40px;"></div>
      </td>
    </tr>
  </table>
</body>
</html>