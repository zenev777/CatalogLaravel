<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;0,900;1,300;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->
    <link href={{ url('/assets/css/style.css') }} rel="stylesheet">
    <link href={{ url('/assets/css/responsive.css') }} rel="stylesheet">
    <title>Home</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary pozicia">
        <div class="container-fluid nav">
            <a class="navbar-brand" href={{ route('home') }}><img src={{url('assets/img/logo.png')}} class="logo"></a>

            <button class="btn btn-vshichkiproducti" type="button" data-bs-toggle="offcanvas" data-bs-target="#ProductsNavOffcanvas" aria-controls="ProductsNavOffcanvas">Всички продукти</button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 categoryname">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('aboutus') }}>За нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('partners') }}>Партньори</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('clients') }}>Клиенти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('service') }}>Сервиз</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('contacts') }}>Контакти</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="GET" action="{{ route('search') }}">
                    <div>
                        <input class="form-control me-2 searchh" type="search" name="query" placeholder="Търсете по модел или актуален номер" aria-label="Search" value="{{ request()->query('query') }}">
                    </div>
                </form>

                <div class="nomer">
                    Tелефон за поръчки и сервиз
                    <span class="nomerflex">
                        <img src={{url('assets/img/logophone.png')}} class="imgphone">

                        </style>
                        <a href="tel:+359899065105" class="nomerr">+359 899 065 105</a>
                        <span>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-top bodyofcanvas" tabindex="-1" id="ProductsNavOffcanvas" aria-labelledby="ProductsNavOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title titleh5" id="ProductsNavOffcanvasLabel">Всички продукти</h5>
            <button type="button" class="btn-close zatrowi-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                <span class="ms-3">Затвори <span></button>
        </div>
        <div class="offcanvas-body">
            <div class="row vsichki-produkti">
                <div class="col">
                    <li><a class="dropdown-item" href={{url('categories/1/products')}}>Конвектомати</a></li>
                    <li><a class="dropdown-item" href={{url('categories/2/products')}}>Професионални Миялни машини</a></li>
                    <li><a class="dropdown-item" href={{url('categories/3/products')}}>Професионални препарати</a></li>
                </div>
                <div class="col">
                    <li><a class="dropdown-item" href={{url('categories/4/products')}}>Препарати за съдомиялни</a></li>
                    <li><a class="dropdown-item" href={{url('categories/5/products')}}>Почистващи препарати</a></li>
                    <li><a class="dropdown-item" href={{url('categories/6/products')}}>Рециклирани машини</a></li>
                </div>
                <div class="col">
                    <li><a class="dropdown-item" href={{url('categories/7/products')}}>Рециклирани Конвектомати</a></li>
                    <li><a class="dropdown-item" href={{url('categories/8/products')}}>Рециклирани Съдомиялни</a></li>
                    <li><a class="dropdown-item" href={{url('categories/9/products')}}>Омекотители</a></li>
                </div>
            </div>
        </div>
        <hr class="dropdown-divider">
        <div class="footer-opciii">
            <li class="footeropcii-title"> Ние сме на линия за Вашите въпроси:
                <a class="dropdown-itemm" href="tel:+359899065105">+359
                    899
                    065 105 |</a>
                <a class="dropdown-itemm" href="tel:+359898573708">+359 898 57 37 08 |</a>
                <a class="dropdown-itemm" href="mailto:office@regular.bg">office@regular.bg</a>
            </li>
        </div>
    </div>







    <!-- mobilna navigacia -->


    <nav class="navbar navbar-expand-lg bg-body-tertiary dis">
        <div class="container-fluid nav">
            <a class="navbar-brand" href="index.php"><img src={{url('assets/img/logo.png')}} class="logo"></a>
            <button class="mobilenav-btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#ProductsNavMobilleOffcanvas" aria-controls="ProductsNavMobilleOffcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffc803" class="bi bi-justify" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="NavMobilleSupportedContent">

                <form class="d-flex" role="search" method="GET" action="{{ route('search') }}">
                    <div>
                        <input class="form-control me-2 searchh" type="search" name="query" placeholder="Търсете по модел или актуален номер" aria-label="Search" value="{{ request()->query('query') }}">
                    </div>
                </form>
                <div class="nomer">
                    Tелефон за поръчки и сервиз
                    <span class="nomerflex">
                        <img src={{url('assets/img/logophone.png')}} class="imgphone">

                        </style>
                        <a href="tel:+359899065105" class="nomerr">+359 899 065 105</a>
                        <span>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-top bodyofcanvas" tabindex="-1" id="ProductsNavMobilleOffcanvas" aria-labelledby="ProductsNavMobilleOffcanvasLabel">
        <div class="offcanvas-header1">
            <a class="navbar-brand" href="home"><img src={{url('assets/img/logo.png')}} class="logo"></a>
            <button type="button" class="btn-close zatrowi-btn1" data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
        </div>
        <div class="offcanvas-body ">
            <div class="btn-vijpowechemobillenav">
                <button class="btn btn-vshichkiproducti" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTopmoblle" aria-controls="offcanvasTopmoblle">Всички
                    продукти</button>
            </div>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 categorynamemobile">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('aboutus') }}>За нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('partners') }}>Партньори</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('clients') }}>Клиенти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('service') }}>Сервиз</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('contacts') }}>Контакти</a>
                    </li>
                </ul>
            </div>
            <div class="footer-opciii1">
                <div class="ps-3 mobilnum-footer">
                    <span class="d-flex flex-column" style="font-size:14px; color: black; font-weight: 700;">
                        Телефон за поръчки и сервиз
                        <a href="tel:+359898573708" class="phone-product7"><img src={{url('assets/img/logophone.png')}} class="k">
                            +359 899 065 105</a>
                    </span>
                </div>
            </div>
        </div>
    </div>







    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTopmoblle" aria-labelledby="offcanvasTopLabelnav">
        <div class="offcanvas-header offcanvas-headerr">
            <h5 class="offcanvas-title" id="offcanvasTopLabelnav">Всички продукти</h5>
            <button type="button" class="btn-close btn-close1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body  offcanvas-bodyy">
            <div class="row vsichki-produkti">
                <div class="col">
                    <li><a class="dropdown-item" href={{url('categories/1/products')}}>Конвектомати</a></li>
                    <li><a class="dropdown-item" href={{url('categories/2/products')}}>Професионални Миялни машини</a></li>
                    <li><a class="dropdown-item" href={{url('categories/3/products')}}>Професионални препарати</a></li>
                </div>
                <div class="col">
                    <li><a class="dropdown-item" href={{url('categories/4/products')}}>Препарати за съдомиялни</a></li>
                    <li><a class="dropdown-item" href={{url('categories/5/products')}}>Почистващи препарати</a></li>
                    <li><a class="dropdown-item" href={{url('categories/6/products')}}>Рециклирани машини</a></li>
                </div>
                <div class="col">
                    <li><a class="dropdown-item" href={{url('categories/7/products')}}>Рециклирани Конвектомати</a></li>
                    <li><a class="dropdown-item" href={{url('categories/8/products')}}>Рециклирани Съдомиялни</a></li>
                    <li><a class="dropdown-item" href={{url('categories/9/products')}}>Омекотители</a></li>
                </div>
            </div>
        </div>
    </div>
    </div>