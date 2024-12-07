<h1>Promo Products</h1>
<p>Here is the list of current promo products:</p>
<ul>
    @foreach ($products as $product)
        <li>
            <h3>{{ $product['title'] }}</h3>
            <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" width="100">
            <p>Price: {{ $product['old_price'] }} @if ($product['price']) (Promo: {{ $product['price'] }}) @endif</p>
            <p>Ends in: {{ $product['days_remaining'] }} days</p>
        </li>
    @endforeach
</ul>