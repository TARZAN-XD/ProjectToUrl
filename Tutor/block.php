<?php
http_response_code(403);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>🚫 وصول مرفوض - طرزان الواقدي</title>
  <style>
    body {
      background: #000;
      color: #00ff00;
      font-family: 'Courier New', monospace;
      text-align: center;
      padding-top: 100px;
    }

    h1 {
      font-size: 2.8em;
      color: red;
      text-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000;
      animation: flicker 1.5s infinite alternate;
    }

    p {
      font-size: 1.2em;
      margin-top: 20px;
    }

    .footer {
      position: fixed;
      bottom: 10px;
      width: 100%;
      color: #666;
      font-size: 0.9em;
    }

    @keyframes flicker {
      from { opacity: 1; }
      to { opacity: 0.4; }
    }
  </style>
</head>
<body>
  <h1>🚫 وصول مرفوض</h1>
  <p>هذا المسار محمي بواسطة <strong>طرزان الواقدي</strong><br>
  تم تسجيل محاولتك، لا تعبث هنا ⚠️</p>

  <div class="footer">© 2025 طرزان الواقدي • جميع الحقوق محفوظة</div>
</body>
</html>
