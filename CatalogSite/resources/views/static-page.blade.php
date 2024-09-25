@include('includes/nav')

<div class="container align-items-center flex-column  d-flex pt-3 pb-5 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item mininav "><a href="home" class="text-decoration-none">Начало</a></li>
            <li class="breadcrumb-item mininav" aria-current="page">Клиенти</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row tt" style="justify-content: center;">
            <div class="col-6 bql mxm" >
                    <h1 class="title-contact1" style="text-align: center;">{{$page -> name}}</h1>
                    <p style="  color: #2a2964; font-size:14px; text-align: center;">{{$page -> description}}</p>
            </div>
        </div>
    </div>
</div>

@include('includes/footer')