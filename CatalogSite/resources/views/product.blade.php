@include ('includes/nav')
<div class="container">
    <div class="row pt-3 php">
        <div class="col-5 col-5g">
            <div class="display-n">
                <div class="fs-6">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb breadcrumb2">
                            <li class="breadcrumb-item itemtext "><a href="home"
                                    class="text-decoration-none">Начало</a></li>
                            <li class="breadcrumb-item itemtext"><a href="categories"
                                    class="text-decoration-none">Всички
                                    продукти</a></li>
                            <li class="breadcrumb-item itemtext"><a href="categories"
                                    class="text-decoration-none">Професионални
                                    конвектомати</a></li>
                            <li class="breadcrumb-item active" aria-current="page">КОНВЕКТОМАТ МЕХАНИЧЕН, 5 ТАВИ GN 2/3
                                (35.5×32.5СМ) SQ053M00</li>
                        </ol>
                    </nav>

                    <h1 class="fs-2 fw-semibold pb-2">{{$product->title}}, 5 ТАВИ
                    {{$product->width}}x{{$product->height}}x{{$product->length}}–
                    Дигитална еволюция {{$product->manufacturer_code}}</h1>
                    <div class="d-flex justify-content-start fs-6">
                        <small class="text-small">Производител: <a href="#" class="link">{{$product->manufacturer_id}}</a></small>
                        <small class="ms-4 pb-3 text-small">арт.№: 123456789</small>
                    </div>
                </div>
            </div>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-itemm active">
                        <img src={{url('assets/img/image11.png')}} class="d-block slaid-imgg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src={{url('assets/img/image11.png')}} class="d-block  slaid-img" alt="...">

                    </div>
                    <div class="carousel-item">
                        <img src={{url('assets/img/image11.png')}} class="d-block  slaid-img" alt="...">

                    </div>
                    <div class="carousel-item">
                        <img src={{url('assets/img/image11.png')}} class="d-block  slaid-img" alt="...">

                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <img src={{url('assets/img/next.png')}} class="icon7">
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <img src={{url('assets/img/next1.png')}} class="icon7">
                    <span class="visually-hidden">Next</span>
                </button>

                <div class="carousel-indicators mb-4">
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
        <div class="col-7 col-77">
            <div class="fs-6">
                <div class="display-no">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb breadcrumb2">
                            <li class="breadcrumb-item itemtext "><a href="home"
                                    class="text-decoration-none">Начало</a></li>
                            <li class="breadcrumb-item itemtext"><a href="categories"
                                    class="text-decoration-none">Всички
                                    продукти</a></li>
                            <li class="breadcrumb-item itemtext"><a href="categories"
                                    class="text-decoration-none">Професионални
                                    конвектомати</a></li>
                            <li class="breadcrumb-item active" aria-current="page">КОНВЕКТОМАТ МЕХАНИЧЕН, 5 ТАВИ GN 2/3
                                (35.5×32.5СМ) SQ053M00</li>
                        </ol>
                    </nav>

                    <h1 class="fs-2 fw-semibold pb-2">{{$product->title}} - {{$product->manufacturer_code}} - {{$product->width}}x{{$product->height}}x{{$product->length}}</h1>
                    <div class="d-flex justify-content-start fs-6">
                        <small class="text-small">Производител: <a href="#" class="link">{{$product->manufacturer_id}}</a></small>
                        <small class="ms-4 pb-3 text-small">арт.№: {{$product->sku}}</small>
                    </div>
                </div>
            </div>
            <div class="white-alert">
                <p class="text-alert">Easy, quick and practical manual control. Bi-directional reversing fan system –
                    Electronic water
                    injection regulation – Mechanical timer 0-120’ – Halogen lights</p>
            </div>
            <div class="prize">
                <div class="d-flex align-items-center pb-1">
                    <span class="prizze">Цена от:</span>
                    <button type="button" class=" overview-btn" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="Цените на оборудването са вариращи стойности зависещи от вида на монтаж, специфики на изпълнение и допълнителни технически решения, съпътстващи конфигурацията">
                        <!-- <img src="assets/img/fframe93.png" style="width: 18.5px;"> -->
                    </button>
                </div>
                <div>
                    <span class="prizenow">{{$product->price}} лв.</span>
                    <span class="dds">/без ДДС/</span>
                </div>
                <div>
                    <span class="prizeold">Стара цена:</span>
                    <span class="prizeold-dds">{{$product->old_price}} лв.</span>
                </div>
            </div>
            <div>
                <!-- Button trigger modal -->
                <div class="d-flex pt-4 pb-4 mobilna">
                    <button type="button" class="btn buton-zapitvane" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Изпрати запитване
                    </button>
                    <div class="ps-3">
                        <span class="d-flex flex-column" style="font-size:13px; color:#2a2964; font-weight: 700;"> За
                            повече информация и
                            консултация:
                            <a href="tel:+359898573708" class="phone-product"><img src={{url('assets/img/logophone.png')}}
                                    class="k">
                                +359 899 065 105</a>
                        </span>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <h1 class="modal-title  modaltitlee" id="exampleModalLabel">Изпратете запитване</h1>
                                <div class="d-flex">
                                    <div class="podtitle">
                                        за продукт
                                    </div>
                                    <a href="#" class="podtitle-link"> Kонвектомат механичен, 5 тави gn 2/3
                                        (35.5×32.5см)
                                        SQ053M00</a>
                                </div>
                            </div>
                            <div class="modal-body">

                                <form class="d-flex flex-column align-items-center">
                                    <div class="formimput">
                                        <input type="name" id="name" class="control" placeholder="Вашето име*">
                                        <input type="phone" id="phone" class="control"
                                            placeholder="Телефон за контакт*">
                                        <input type="email" id="email" class="control" placeholder="Вашият email*">
                                    </div>
                                    <div style="width: 100%;">
                                        <textarea class="form-input" id="floatingTextareaa"
                                            placeholder="Вашето съобщение" style="width: 100%;">
                                        </textarea>
                                    </div>
                                    <span class="zaduljitelnotext">Полетата обозначени със “<p style="color: red;"> *
                                        </p> ”
                                        са
                                        задължителни</span>
                                    <span class="textmodaall">След като попълните коректно формата за запитване, нашият
                                        екип
                                        ще се свърже с Вас
                                        за уточняване на детайли по запитването.</span>

                                    <button type="submit" form="nameform" class="buton-zapitvanee"
                                        value="Submit">Изпрати
                                        запитване</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Опции</h3>
                <div class="razdel-tablica">
                    <h3>Характеристики:</h3>
                    <table class=" tablica">
                        <tr class=" table-color">
                            <th class="th-table">Име:</th>
                            <td class="td-table">{{$product->title}}</td>
                        </tr>
                        <tr>
                            <th class="th-table">Впръскване</th>
                            <td class="td-table">{{$product->vpruzkvane}}</td>
                        </tr>
                        <tr class=" table-color">
                            <th class="th-table">Реверс</th>
                            <td class="td-table">{{$product->revers}}</td>
                        </tr>
                        <tr>
                            <th class="th-table">Таймер</th>
                            <td class="td-table">{{$product->taimer}}: 0-120‘.</td>
                        </tr>
                        <tr class=" table-color">
                            <th class="th-table">Осветление</th>
                            <td class="td-table">{{$product->osvetlenie}}</td>
                        </tr>
                        <tr>
                            <th class="th-table">Модел:</th>
                            <td class="td-table">{{$product->sku}}</td>
                        </tr>
                        <tr class=" table-color">
                            <th class="th-table">Външни размери:</th>
                            <td class="td-table">{{$product->width}} x {{$product->height}} x {{$product->length}}см.</td>
                        </tr>
                        <tr>
                            <th class="th-table">Разстояние м/у водачите</th>
                            <td class="td-table">{{$product->raztuqnie_mejdu_vodachite}}мм.</td>
                        </tr>
                        <tr class=" table-color">
                            <th class="th-table">Мощност: </th>
                            <td class="td-table">{{$product->power}}V</td>
                        </tr>
                        <tr>
                            <th class="th-table">Температура</th>
                            <td class="td-table">{{$product->temperatura}}С.</td>
                        </tr>
                        <tr class=" table-color">
                            <th class="th-table">Свързване</th>
                            <td class="td-table">{{$product->svurzvane}}.</td>
                        </tr>
                    </table>
                </div>






            </div>
        </div>
        <div class="d-flex pb-4 justify-content-between pt-5">
            <h4 class="d-flex align-items-center"> <img src={{url('assets/img/ellipse6.png')}} class="me-3"> Още продукти от
                категория
                “Професионални
                конвектомати”</h4>
            <div class="butoncheta">
                <a class="prev product-slider-3-prev">&#10094;</a>
                <a class="next product-slider-3-next">&#10095;</a>
                <!-- Ask for this path -->
                <a href="productova.php" class="btn-wsichki">Към всички<img src={{url('assets/img/Polygon1.png')}}
                        class="img-icon"></a>
            </div>
        </div>

        <div class="slideshow-container ">
            <div class="product-slider-3">
                @foreach (range(1, 8) as $item)
                    <div>
                        @include ('includes/product-small')
                    </div>
                @endforeach
            </div>

        </div>




    </div>

  @include ('includes/footer')
