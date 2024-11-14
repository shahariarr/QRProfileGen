<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit QR Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-container button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .form-container img {
            max-width: 100px;
            max-height: 100px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit QR Code Details</h1>
    </header>
    <div class="container">
        <div class="form-container">
            <h2>Edit Your QR Code Information</h2>
            <form action="{{ url('update-qr-code/' . $data['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="name" value="{{ $data['name'] }}" placeholder="Your Name" required>
                <input type="text" name="address" value="{{ $data['address'] }}" placeholder="Your Address" required>
                <input type="text" name="designation" value="{{ $data['designation'] }}" placeholder="Your Designation" required>
                <input type="url" name="website" value="{{ $data['website'] }}" placeholder="Your Website" required>
                <input type="email" name="email" value="{{ $data['email'] }}" placeholder="Your Email" required>
                <input type="text" name="phone" value="{{ $data['phone'] }}" placeholder="Your Phone Number" required>
                <input type="text" name="sms" value="{{ $data['sms'] }}" placeholder="Your SMS Number" required>

                <!-- Optional file input for a new image -->
                <input type="file" name="image" accept="image/*">

                <!-- Display the existing image -->
                @if($data['image'])
                    <div class="form-group">
                        <img src="{{ asset('profile_images/' . $data['image']) }}" class="img-fluid mt-2">
                    </div>
                @endif

                <button type="submit">Update QR Code</button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 QR Code Generator. All rights reserved.</p>
    </footer>
</body>
</html>
