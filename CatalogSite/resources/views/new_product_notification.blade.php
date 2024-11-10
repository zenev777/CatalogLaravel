<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нов продукт добавен!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .email-header {
            font-size: 18px;
            font-weight: bold;
        }

        .email-body {
            margin-top: 10px;
        }

        h1 {
            color: #333;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        p {
            color: #333;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-body">
            <h1>{{ $title }}</h1>
            @if($imagePath)
                <img class="product-image" src="{{ asset($imagePath) }}" alt="Product Image">
            @endif
            <p>Цена: {{ $price }} лв.</p>
            @if($promo_end_date)
                <p>Промоция до: {{ $promo_end_date }}</p>
            @endif
            <a href="{{ $url }}" class="btn">Преглед на продукта</a>
        </div>
    </div>
</body>

</html>