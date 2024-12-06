<h1>Products Without Images</h1>
<p>The following products do not have images:</p>
<ul>
    @foreach ($products as $product)
        <li>{{ $product->title }} (ID: {{ $product->id }})</li>
    @endforeach
</ul>