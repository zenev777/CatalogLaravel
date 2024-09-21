<h1>Запитване за продукт: {{ $product->title }}</h1>

<p><strong>От:</strong> {{ $name }}</p>
<p><strong>Имейл:</strong> {{ $email }}</p>
<p><strong>Съобщение:</strong></p>
<p>{{ $messageContent }}</p>

<p><strong>Продукт:</strong> <a href="{{ url('/product/' . $product->id)}}">{{ $product->title }}</a></p>