@include('includes/nav')

<div class="container align-items-center flex-column  d-flex pt-3 pb-5 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item mininav "><a href="home" class="text-decoration-none">Начало</a></li>
            <li class="breadcrumb-item mininav" aria-current="page">Клиенти</li>
        </ol>
    </nav>
    <h2 class="title-partniori">Нашите клиенти</h2>
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

<div class="container pb-4">
    <div class="clienti-background">
        <div class="container text-center ">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 gap-4">
                @foreach ($clients as $client)
                    @include('includes/client-card')
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('includes/footer')