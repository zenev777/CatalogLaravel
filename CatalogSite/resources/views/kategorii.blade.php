@include ('includes/nav')

<div class="container">

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb2">
            <li class="breadcrumb-item itemtext "><a href={{ route('home') }} class="text-decoration-none">Начало</a>
            </li>
            <!-- ask for this links path -->
            <li class="breadcrumb-item itemtext"><a href={{ route('allcategories') }} class="text-decoration-none">Всички
                    продукти</a></li>
            @if ($category !== null)
                <li class="breadcrumb-item itemtext"><a href="#" class="text-decoration-none">{{$category->title}}</a></li>
            @endif
        </ol>
    </nav>
    @if($query !== null)
        <h1 class="title">Търсене за "{{$query}}"</h1>
    @elseif ($category !== null)
        <h1 class="title">{{$category->title}}</h1>
    @endif
    
    <div class="alert-productova">
        <img src={{url('assets/img/vector.png')}} class="vector">
        <div class="textalert-productova">
            <span class="text-alertt">
                В  заведенията за бързо хранене, ресторантите, баровете, кафенетата, и особено в разрастващата се област
                на
                бюфета, предимствата и възможностите на тази техника са незаменими. Този тип кухненско оборудване
                позволява
                да се извършват до 70% от всички възможни операции, които са свързани с термичната обработка на
                продуктите.
                По този начин се заместват няколко уреда за топлинна обработка едновременно: печка, фурна, електрическа
                скара, котлон и др.
            </span>
            <button onclick="topFunction()" id="myBtn" title="Go to top" class="buton-scroll">Научете повече</button>
        </div>
    </div>


    <div class="row m row7">
        <div class="col-3 pt-4 px-0 ps-2">
            <div class="filter-container">
                <span class="filtr-zaglavie">Филтри</span>
                <div class="cena-border">
                    <div class="card">
                        <span class="title-cena pb-2">Цена:</span>
                        <div class="price-content">
                            <div>
                                <label>Min</label>
                                <p id="min-value">70лв</p>
                            </div>

                            <div>
                                <label>Max</label>
                                <p id="max-value">900лв</p>
                            </div>
                        </div>

                        <div class="range-slider">
                            <div class="range-fill"></div>

                            <input type="range" class="min-price" value="70" min="70" max="500" step="10" />
                            <input type="range" class="max-price" value="250" min="10" max="1000" step="100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 col-9a pt-4">
            <div class="d-flex gap-3 pb-3 m">
                @if($subcategories !== null)
                        @foreach($subcategories as $subcategory)
                                <div class="col">
                                    @include('includes.subcategories-small')
                                </div>
                                @if($loop->iteration % 3 == 0)
                                    </div>
                                <div class="d-flex gap-3 pb-3 m"> @endif
                        @endforeach
                @endif
            </div>
            <div class="d-flex gap-3 pb-3 m">
                @if($products !== null)    
                        @foreach($products as $product)
                                <div class="col">
                                    @include('includes.product-small')
                                </div>
                                @if($loop->iteration % 3 == 0)
                                    </div>
                                <div class="d-flex gap-3 pb-3 m"> @endif
                        @endforeach
                @endif
            </div>
            <h2 class="pb-3">Често задавани въпроси</h2>
            <div class="pb-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button acordiontitle" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Защо конвектоматът е важна част от оборудването на професионалната кухня?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default,
                                until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via
                                CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed  acordiontitle" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Как се категоризират конвектоматите
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                until the collapse plugin adds the appropriate classes that we use to style each
                                element. These classes control the overall appearance, as well as the showing and
                                hiding
                                via CSS transitions. You can modify any of this with custom CSS or overriding our
                                default variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed  acordiontitle" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Колко вида конвектомати има
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via
                                CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed acordiontitle" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                Има ли специфика в сервизирането на такъв тип техника
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via
                                CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@include ('includes/footer')