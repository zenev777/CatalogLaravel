@include ('includes/nav')

<div class="container">

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb breadcrumb2">
            <li class="breadcrumb-item itemtext "><a href={{ route('home') }} class="text-decoration-none">Начало</a>
            </li>
            <!-- ask for this links path -->
            <li class="breadcrumb-item itemtext"><a href={{ route('allcategories') }}
                    class="text-decoration-none">Всички
                    продукти</a></li>
            @if ($category !== null)
                <li class="breadcrumb-item itemtext"><a href="#" class="text-decoration-none">{{$category->title}}</a>
                </li>
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
            @if($products->isNotEmpty())
                <div class="sorting-dropdown">
                    <label for="sort-options">Сортиране по:</label>
                    <select id="sort-options" onchange="location = this.value;">
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'custom']) }}" {{ request('sort') == 'custom' ? 'selected' : '' }}>Персонализирано</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Азбучен ред (А-Я)</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Азбучен ред (Я-А)</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена (Най-евтини)</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена (Най-скъпи)</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'date_desc']) }}" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Дата (най-нови)</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'promo']) }}" {{ request('sort') == 'promo' ? 'selected' : '' }}>Първо промоции</option>
                    </select>
                </div>
            @endif
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

            <div class="pagination">
                @if($subcategories == null)
                    {{ $products->appends(['query' => request()->query('query')])->links('vendor.pagination.bootstrap-4')  }}
                @endif
            </div>

            @if($category->faqs->isNotEmpty())
                <h2 class="pb-3">Често задавани въпроси</h2>
                <div class="pb-5">
                    <div class="accordion" id="accordionExample">
                        @foreach($category->faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button acordiontitle" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
</div>


@include ('includes/footer')
