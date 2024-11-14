<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background: linear-gradient(45deg, #43cea2, #185a9d);
            color: #fff;
            padding: 15px 30px;
            text-align: center;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px;
        }
        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .form-container:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #007BFF;
            font-size: 24px;
            font-weight: 500;
        }
        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
            color: #555;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-container input:focus,
        .form-container textarea:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }
        .form-container button {
            padding: 14px 25px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .generate-btn {
            background: linear-gradient(45deg, #28a745, #1e7e34);
            color: #fff;
        }
        .generate-btn:hover {
            background: linear-gradient(45deg, #218838, #155d27);
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        .logout-btn {
            background: linear-gradient(45deg, #ff5f6d, #ffc371);
            color: #fff;
            margin-left: 10px;
        }
        .logout-btn:hover {
            background: linear-gradient(45deg, #ff4e50, #ffb347);
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        footer p {
            font-size: 14px;
            color: #fff;
        }
        @media screen and (max-width: 768px) {
            .container {
                padding: 20px;
            }
            .form-container {
                padding: 25px;
            }
            .logout-btn {
                margin-top: 10px;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>QR Code Generator</h1>
    </header>
    <div class="container">
        <div class="form-container">
            <h2>Generate Your QR Codes</h2>
            <form action="{{ url('generate-qr-code') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="address" placeholder="Your Address" required>
                <input type="text" name="designation" placeholder="Your Designation" required>
                <input type="url" name="website" placeholder="Your Website" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="phone" placeholder="Your Phone Number" required>
                <input type="text" name="sms" placeholder="Your SMS Number" required>
                <input type="file" name="image" accept="image/*" required>
                <div style="display: flex; justify-content: center;">
                    <button type="submit" class="generate-btn">Generate QR Codes</button>
                    <form class="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 QR Code Generator. All rights reserved.</p>
    </footer>
</body>
</html>
