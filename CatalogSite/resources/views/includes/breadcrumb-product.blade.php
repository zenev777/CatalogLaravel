<nav aria-label="breadcrumb ">
    <ol class="breadcrumb breadcrumb2">
        <li class="breadcrumb-item itemtext "><a href={{ route('home') }} class="text-decoration-none">Начало</a>
        </li>
        <li class="breadcrumb-item itemtext"><a href={{ route('allcategories')}} class="text-decoration-none">Всички
                продукти</a></li>
        <li class="breadcrumb-item itemtext"><a href="categories" class="text-decoration-none">{{$category->title}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
    </ol>
</nav>
