@include ('includes/nav')
<div class="container">
    <div class="d-flex pt-3 t">
        <div class="d-flex w-100 position-relative mxm">
            <a href="" class="position-relative zoom-container">
                <span class="overlay position-absolute w-100 h-100 start-0 top-0"
                    style="background-color: rgba(42, 41, 100, .5);"></span>
                <img src="{{$homeboxeOne->image}}" class="img-1 zoom-object">
                <span class="title-baner">{{$homeboxeOne->title}}</span>
            </a>
            <a href="categories" class="position-absolute btn-pregledai">
                Прегледай
                <svg class="hidden ml-10 icon-right" width="8" height="10" viewBox="0 0 8 10" fill="#2a2964"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.6637 5.20322L0.0921474 9.57465L0.0921478 0.831781L7.6637 5.20322Z"></path>
                </svg>
            </a>
        </div>
        <div class="d-grid img-grid">
            @foreach ($homeboxes as $homebox)
                <a href="{{$homebox->link}}" class="position-relative zoom-container">
                    <span class="overlay position-absolute w-100 h-100 start-0 top-0"
                        style="background-color: rgba(42, 41, 100, .5);"></span>
                    <img src="{{$homebox->image}}" class="img-2 zoom-object">
                    <span class="title-smallbaner">{{$homebox->title}}</span>
                    <span class="button-banersmall"></span>
                </a>
            @endforeach
            <a href="categories" class="text-decoration-none">
                <span class="kutiika-julta">
                    Всички Продукти
                    <img src="assets/img/frame.png" class="img-3">
                </span>
            </a>
        </div>
    </div>

    <div class="container pb-5">
        <h2 class="justify-content-center pt-5 pb-5">Част от нашите клиенти</h2>

        <div class="clients-slider-1">
            @foreach ($featuredClients as $client)
                    @include('includes.client-card')
            @endforeach
        </div>
    </div>




    <div class="pt-4 pb-4">
        <div class="big-baner justify-content-center">
            <img src="assets/img/frame2.png" class="img-4">
            <div class=" d-flex text-center txt pb-5">
                Професионалното и качествено оборудване<br>
                гарантира високи резултати.
            </div>
            <!-- ask about the new path (from # to aboutus) -->
            <a href="aboutus" class="buton-poveche d-flex justify-content-center align-items-center">
                Научете повече за нас
            </a>
        </div>
    </div>

    <div class="kutiii pb-5 d-flex">
        <div class="kutiika-iconbql flex-grow-1">
            <img src="assets/img/icon.png" class="img-5">
            <span class="text-kutiq text-center">
                Над 20+ години опит<br> в сервизирането<br> на конвектомати
            </span>
        </div>
        <div class="kutiika-iconbql flex-grow-1">
            <img src="assets/img/icon1.png" class="img-5">
            <span class="text-kutiq text-center">
                Ексклузивен представител<br>
                на висок клас<br>
                производители
            </span>
        </div>
        <div class="kutiika-iconbql flex-grow-1">
            <img src="assets/img/icon2.png" class="img-5">
            <span class="text-kutiq text-center">
                Дългогодишни и доверени<br>
                партньори
            </span>
        </div>
        <div class="kutiika-iconbql flex-grow-1">
            <img src="assets/img/icon3.png" class="img-5">
            <span class="text-kutiq text-center">
                6 месеца гаранция на<br>
                рециклирани конвектомати
            </span>
        </div>
        <div class="kutiika-iconbql bql flex-grow-1 ">
            <img src="assets/img/icon4.png" class="img-5">
            <span class="text-kutiq text-center">
                Професионален собствен<br>
                сервиз на конвектомати
            </span>
        </div>
    </div>

</div>


<div class="container">
    <div class="d-flex d pb-5">
        <div class="baner-fram">
            <img src="assets/img/banerimg1.png" class="banerr2">
            <div class="overlay position-absolute w-100 h-100 start-0 top-0"
                style="background-color: rgba(42, 41, 100, .5);border-radius: 16px;"></div>
            <img src="assets/img/frame3.png" class="banerr22">
        </div>

        <div class="bqlpole-baner d-flex ">
            <div class="tekstove">
                <span class="text-godini pt-5">20+ ГОДИНИ</span>
                <span class="text-serinf pt-1">Сервизиране на <br>
                    професионално<br>
                    кухненско оборудване</span>
                <span class="smalltext pt-4 pb-4">Lorem Ipsum е елементарен примерен текст, използван в <br>печатарската
                    и типографската индустрия. Lorem Ipsum е <br>индустриален стандарт от около 1500 година</span>

            </div>
            <div class="d-flex ">
                <a href="aboutus" class="pregledai">
                    <span class="buton-poweche">
                        Научете повече
                    </span>
                </a>
            </div>
        </div>


    </div>

</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-3 new-products">
        <div class="col col-md-6">
            <div id="carouselExample" class="carousel slide">
                <span class="znachka">Препоръчан</span>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/image1.png" class="d-block slaid-img" alt="...">
                        <div class="text-carosel"> Конвектомат електроника, 4 тави 46х34см или gn 2/3 (35.5×32.5см) –
                            Дигитална еволюция b043dv6.16*

                        </div>
                        <a href="includes/product-small.php" class="buton-poveche1 pt-5">
                            <span class="buton-poveche11">
                                Научете повече
                            </span>
                        </a>
                    </div>

                    <div class="carousel-item">
                        <img src="assets/img/image1.png" class="d-block  slaid-img" alt="...">
                        <div class="text-carosel"> 2 Конвектомат електроника, 4 тави 46х34см или gn 2/3 (35.5×32.5см) –
                            Дигитална еволюция b043dv6.16*

                        </div>
                        <a href="includes/product-small.php" class="buton-poveche1 pt-5">
                            <span class="buton-poveche11">
                                Научете повече
                            </span>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/image1.png" class="d-block  slaid-img" alt="...">
                        <div class="text-carosel"> 3 Конвектомат електроника, 4 тави 46х34см или gn 2/3 (35.5×32.5см) –
                            Дигитална еволюция b043dv6.16*

                        </div>
                        <a href="includes/product-small.php" class="buton-poveche1 pt-5">
                            <span class="buton-poveche11">
                                Научете повече
                            </span>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/image1.png" class="d-block  slaid-img" alt="...">
                        <div class="text-carosel"> 4 Конвектомат електроника, 4 тави 46х34см или gn 2/3 (35.5×32.5см) –
                            Дигитална еволюция b043dv6.16*

                        </div>
                        <a href="includes/product-small.php" class="buton-poveche1 pt-5">
                            <span class="buton-poveche11">
                                Научете повече
                            </span>
                        </a>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <img src="assets/img/next.png" class="icon7">
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <img src="assets/img/next1.png" class="icon7">
                    <span class="visually-hidden">Next</span>
                </button>

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                </div>

            </div>
        </div>
        <div class="col col-md-6">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-sm-1 g-3">
                @foreach ($homepageProducts as $product)
                    <div class="col">
                        @include('includes.product-small')
                    </div>
                    @if($loop->iteration % 4 == 0) @break @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>


<div class="container pt-5 pb-5">
    <div class="d-flex pb-4 justify-content-between">
        <h2><img src="assets/img/ellipse6.png" class="me-3">Рециклирани конвектомати</h2>
        <div class="prevnext-btn">
            <a class="prev product-slider-1-prev">&#10094;</a>
            <a class="next product-slider-1-next">&#10095;</a>
            <a href="categories" class="btn-wsichki">Към всички<img src="assets/img/Polygon1.png" class="img-icon"></a>
        </div>
    </div>
    <div class="slideshow-container ">
        <div class="product-slider-1">
            @foreach ($productsConvect as $product)
                <div>
                    @include ('includes/product-small')
                </div>
            @endforeach
        </div>

    </div>
</div>

<div class="container pt-5 pb-5">
    <div class="d-flex pb-4 justify-content-between">
        <h2><img src="assets/img/ellipse6.png" class="me-3">Съдомияли машини</h2>
        <div class="prevnext-btn">
            <a class="prev product-slider-2-prev">&#10094;</a>
            <a class="next product-slider-2-next">&#10095;</a>
            <a href="categories" class="btn-wsichki">Към всички<img src="assets/img/Polygon1.png" class="img-icon"></a>
        </div>
    </div>
    <div class="slideshow-container ">
        <div class="product-slider-2">
            @foreach ($productsWash as $product)
                <div>
                    @include ('includes/product-small')
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="container">
    <div class="pb-5 d-grid baner-grid">
        <a href="categories" class="position-relative zoom-container2">
            <span class="overlayy position-absolute w-100 h-100 start-0 top-0"
                style="background-color: rgba(42, 41, 100, .5);"></span>
            <span class="texticon">
                <img src="assets/img/banericon.png" class="banericon1">
                <span class="title-texticon">Професионални<br>
                    препарати
                </span>
            </span>
            <img src="assets/img/img1.png" class="img-7 zoom-object">

        </a>
        <a href="categories" class="position-relative zoom-container2">
            <span class="overlayy position-absolute w-100 h-100 start-0 top-0"
                style="background-color: rgba(42, 41, 100, .5);"></span>
            <span class="texticon">
                <img src="assets/img/banericon2.png" class="banericon2">
                <span class="title-texticon">Препарати за<br>
                    съдомиална
                </span>
            </span>
            <img src="assets/img/img.png" class="img-7 zoom-object">

        </a>


        <a href="categories" class="position-relative zoom-container2">
            <span class="overlayy position-absolute w-100 h-100 start-0 top-0"
                style="background-color: rgba(42, 41, 100, .5);"></span>
            <span class="texticon">
                <img src="assets/img/banericon3.png" class="banericon1">
                <span class="title-texticon">Почистващи<br>
                    препарати
                </span>
            </span>
            <img src="assets/img/img2.png" class="img-7 zoom-object">

        </a>


    </div>
</div>

@include ('includes/footer')