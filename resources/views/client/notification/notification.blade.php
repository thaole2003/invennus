<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .greeting {
            font-size: 24px;
        }
        .message {
            font-size: 18px;
        }
        .sender-info {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <img class="logo" src="{{ asset('img/logo.jpg') }}" alt="Logo">
        <h2>
            {{ $content['title'] }}
        </h2>
        <p>{{ $content['message'] }}</p>
        <p>Vui lòng truy cập website để xem thông tin : <a href="http://localhost:8000">Bấm ở đây!</a></p>
        <div class="sender-info">
            <p>Gửi từ: Công ty Invennus</p>
            <p>Số điện thoại: 0332132912</p>
            <p>Email: Nghiemthai.nxt46@gmail.com</p>
        </div>
    </div>
</body>
</html>
