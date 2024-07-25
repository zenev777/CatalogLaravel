<a href="product" class="text-center py-3 px-4 rounded-3 text-dark text-decoration-none d-flex product-small">
    <img src={{url('assets/img/image3.png')}} class="img-smallproduct">
    <span style="font-size:14px" class="smallproduct-title">{{$product->title}}, 4 тави
    {{$product->width}}x{{$product->height}}x{{$product->length}}–
        Дигитална еволюция {{$product->manufacturer_code}}</span>
    <span class="cena pt-4 pb-2">
        <span class="prizze2 d-flex">Цена:
            <p class="text-decoration-line-through px-1">{{$product->is_top_price}}</p>
        </span>
        <span class="prizze3">{{$product->price}}</span>
    </span>
</a>