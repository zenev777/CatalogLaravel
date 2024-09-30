@include ('includes/nav')

<div class="container align-items-center flex-column  d-flex pt-3 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item mininav "><a href="home" class="text-decoration-none">Начало</a></li>
            <li class="breadcrumb-item mininav" aria-current="page">Категории</li>
        </ol>
    </nav>
    <h2 class="title-partniori ">Всички категории</h2>
</div>

<div class="container pt-5 pb-5 align-items-center flex-column d-flex gap-3">

    <div class="row vsichki-produkti">
        @foreach ($allcategory as $category)
            <div class="col">
                <li style="list-style-type: none;"><a class="dropdown-item" href={{ url('categories/' . $category->id . '/products') }}>{{$category->title}}</a></li>
            </div> @if($loop->iteration % 3 == 0) </div><div class="row vsichki-produkti"> @endif
        @endforeach
    </div>

</div>

@include ('includes/footer')