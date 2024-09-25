@include ('includes/nav')

<div class="container align-items-center flex-column  d-flex pt-3 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item mininav "><a href="home" class="text-decoration-none">Начало</a></li>
            <li class="breadcrumb-item mininav" aria-current="page">Партньори</li>
        </ol>
    </nav>
    <h2 class="title-partniori ">Доверени партньори</h2>
    <p class="ptext">Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската
        индустрия.
        Lorem
        Ipsum е
        индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги
        разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е
        навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те
        години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във
        софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.</p>

</div>
<div class="container pt-5 pb-5 align-items-center flex-column d-flex gap-3">

    @foreach ($partners as $partner)
    <div class="cart-partnior">
        <div class="row m1">
            <div class="col-4 imgcart col-44">
                <img src="assets/img/rectangle.png" class="regularcart-col">
            </div>
            <div class="col-8 z">
                <div>
                    <h2 class="titlecart-partnior ">{{$partner->title}}</h2>
                    <p class="textcart-partnior">{{$partner->description}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@include ('includes/footer')