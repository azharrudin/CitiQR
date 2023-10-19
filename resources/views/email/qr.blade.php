<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .header {
            background-color: #000080;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .qr-code {
            float: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Registering</h1>
            <p>Citi Indonesia Consumer Bank Appreciation Night “Greater Things to Come”</p>
        </div>
        <div class="content justify">
            <p>Dear {{ $fullname }},</p>
            <p>We are delighted to inform you that your registration for “Citi Indonesia Consumer Bank Appreciation Night – Greater Things to Come” is now complete. Your presence means a lot to us, and we can't wait to welcome you on November 10th, 2023. Get ready for an unforgettable experience filled with teams.</p>
            <p>Citi Indonesia Consumer Bank Appreciation Night – Greater Things to Come, will be held on:</p>
            <ul>
                <li>Date: Friday, November 10th 2023</li>
                <li>Time: 18.00 – 22.00</li>
                <li>Venue: Mulia Hotel Jakarta</li>
                <li>Dress Code: Cocktail Attire</li>
            </ul>
            <p>*please show your QR Code at the registration booth</p>
        </div>
        <div class="qr-code">
            <img src="{{ asset('qrcode/')}}/{{$uuid.'.png'}}">
        </div>
    </div>
</body>
</html>
