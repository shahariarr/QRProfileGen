<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Codes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .info {
            text-align: center;
            margin-bottom: 20px;
        }

        .qr-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .qr-container {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .qr-container p {
            margin: 10px 0 0;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="info">
        <h1>Assalamu Alaikum</h1>
        @if (isset($data['image']))
        <img src="{{ asset('storage/images/' .  $data['image']) }}" alt="User Image" class="img-fluid mt-2" style="max-width: 150px; border-radius: 50%;">
        @endif
        <h2 style="color: #4a4c4f;">{{ $data['name'] }}</h2>
        <p>{{ $data['address'] }}</p>
        <p>{{ $data['designation'] }}</p>

        <p>If you are contacting me and want to know more information, please scan the QR codes below. Thank you!</p>
    </div>
    <div class="qr-wrapper">
        <div class="qr-container">
            {!! QrCode::size(200)->generate($data['website']) !!}
            <p>Visit My Website</p>
        </div>

        <div class="qr-container">
            {!! QrCode::size(200)->email($data['email']) !!}
            <p>Send me an Email</p>
        </div>

        <div class="qr-container">
            {!! QrCode::size(200)->phoneNumber($data['phone']) !!}
            <p>Call me</p>
        </div>

        <div class="qr-container">
            {!! QrCode::size(200)->SMS($data['sms']) !!}
            <p>Send SMS</p>
        </div>
    </div>
</body>

</html>
