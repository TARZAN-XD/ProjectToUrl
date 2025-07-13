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
      background-color: #000;
      color: #0f0;
      font-family: 'Courier New', monospace;
      text-align: center;
      padding-top: 100px;
    }
    h1 {
      color: red;
      font-size: 2.5em;
      text-shadow: 0 0 10px red, 0 0 20px red;
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
      font-size: 0.9em;
      color: #555;
    }
    @keyframes flicker {
      from { opacity: 1; }
      to { opacity: 0.4; }
    }
  </style>
</head>
<body>
  <h1>🚫 تم رفض الوصول</h1>
  <p>هذا النظام محمي 🔒 بواسطة <strong>طرزان الواقدي</strong><br>تم تسجيل محاولتك وسيتم تتبعها فورًا!</p>
  <div class="footer">© 2025 Tarzan Alwaqdi - All Rights Reserved</div>
</body>
</html>
