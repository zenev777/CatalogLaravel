<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .email-container { padding: 20px; border: 1px solid #ddd; }
        .email-header { font-size: 18px; font-weight: bold; }
        .email-body { margin-top: 10px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-body">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $comentar }}</p>
        </div>
    </div>
</body>
</html>