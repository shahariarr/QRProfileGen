<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }
        header {
            background: linear-gradient(45deg, #43cea2, #185a9d); /* Gradient Color */
            color: #fff;
            text-align: center;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            margin: 0;
        }
        .logout-btn {
            background: linear-gradient(45deg, #ff5f6d, #ffc371);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        .logout-btn:hover {
            background: linear-gradient(45deg, #ff4e50, #ffb347);
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
        .info {
            text-align: center;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: relative;
        }
        .info:hover {
            transform: scale(1.05);
        }
        .edit-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            text-decoration: none;
            background: linear-gradient(45deg, #28a745, #1e7e34);
            color: #fff;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .edit-btn:hover {
            background: linear-gradient(45deg, #218838, #155d27);
            transform: scale(1.05);
        }
        .info img {
            max-width: 150px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        .info h2 {
            color: #43cea2;
            font-size: 24px;
            margin-bottom: 0.5rem;
        }
        .info p {
            color: #185a9d;
            font-size: 16px;
            margin: 0.5rem 0;
        }
        .qr-wrapper {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .qr-container {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }
        .qr-container:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }
        .qr-container p {
            margin: 10px 0 0;
            font-size: 16px;
            color: #333;
        }
        footer {
            padding: 1rem;
            font-size: 14px;
            color: #fff;
            background: linear-gradient(45deg, #43cea2, #185a9d); /* Footer Gradient Color */
        }
    </style>
</head>
<body>
    <header>
        <h1>Assalamu Alaikum</h1>
        <form class="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </header>
    <div class="container">
        <div class="info">
            <a href="{{ route('qr-code-edit', ['id' => $data['id']]) }}" class="edit-btn">Edit Profile</a>

            <img src="{{ asset('profile_images/' . $data['image']) }}" alt="Profile Image">
            <h2>{{ $data['name'] }}</h2>
            <p>{{ $data['address'] }}</p>
            <p>{{ $data['designation'] }}</p>
            <p>Contact me and learn more by scanning the QR codes below. Thank you!</p>
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
    </div>
    <footer>
        <p>&copy; 2023 QR Code Generator. All rights reserved.</p>
    </footer>
</body>
</html>
