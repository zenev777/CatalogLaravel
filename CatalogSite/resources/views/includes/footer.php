<!-- footer -->
<div class="container pb-4 pt-5">
    <div class="footer-background">
        <div class="row align-items-center tt">
            <div class="col-3 col3-with">
                <span class="footernav1">Продукти</span>
                <li><a class="footernav" href="kategorii.php">Конвектомати</a></li>
                <li><a class="footernav" href="kategorii.php">Професионални Миялни машини</a></li>
                <li><a class="footernav" href="kategorii.php">Професионални препарати</a></li>
            </div>
            <div class="col-3 col3-with">
                <li><a class="footernav" href="kategorii.php">Препарати за съдомиялни</a></li>
                <li><a class="footernav" href="kategorii.php">Почистващи препарати</a></li>
                <li><a class="footernav" href="kategorii.php">Рециклирани машини</a></li>
            </div>
            <div class="col-3 col3-with">
                <li><a class="footernav" href="kategorii.php">Рециклирани Конвектомати</a></li>
                <li><a class="footernav" href="kategorii.php">Рециклирани Съдомиялни</a></li>
                <li><a class="footernav" href="kategorii.php">Омекотители</a></li>
            </div>
            <div class="col-3 d-flex gap-5 col3-with1">
                <div class="px-4">
                    <span class="footernav1">За компанията</span>
                    <li> <a class="footernav" href="zanas.php">За нас</a></li>
                    <li><a class="footernav" href="serviz.php">Сервиз</a></li>
                    <li> <a class="footernav" href="contacti.php">Контакти</a></li>
                </div>
                <div class="ptp">
                    <span class="footernav1">Свържете се с нас</span>
                    <li><a class="footernav" href="mailto:office@regular.bg">office@regular.bg</a></li>
                    <li><a class="footernav" href="tel:+359899065105">+359 899 065 105 </a></li>
                    <span class="footernav">гр. Стара Загора, Стръмна, 14</span>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-background1 mt-3 ">
        <div class="row tt centeralign">
            <div class="col-4 orders mhm1">
                <span class="smalltextt">2024 © Regular</span>
            </div>
            <div class="col-4 order1 mhm2">
                <a href="#" class="smalltextt">Политика за поверителност</a>
                <a href="#" class="smalltextt">Общи условия</a>
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<!-- NOTE: prior to v2.2.1 tiny-slider.js need to be in <body> -->







<script>
    var productSlider1 = tns({
        container: '.product-slider-1',
        items: 4,
        gutter: 15,
        mouseDrag: true,
        nav: false,
        controls: false,
        autoplayButtonOutput: false,
        autoplay: true,
        responsive: {
            300: {
                items: 1
            },
            700: {
                items: 3
            },
            900: {
                items: 4
            }
        }
    });
    document.querySelector(".product-slider-1-prev").addEventListener("click", function() {
        productSlider1.goTo('prev');
    });
    document.querySelector(".product-slider-1-next").addEventListener("click", function() {
        productSlider1.goTo('next');
    });






    var client = tns({
        container: '.clients-slider-1',
        items: 6,
        gutter: 1,
        mouseDrag: true,
        nav: false,
        controls: false,
        autoplayButtonOutput: false,
        autoplay: true,
        responsive: {
            300: {
                items: 3
            },
            700: {
                items: 3
            },
            900: {
                items: 6
            }
        }
    });
</script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<script>
    function topFunction() {
        window.scrollTo(0, document.body.scrollHeight);
        return false;
    }
</script>
<script>
    let minValue = document.getElementById("min-value");
    let maxValue = document.getElementById("max-value");
    const rangeFill = document.querySelector(".range-fill");

    function validateRange() {
        let minPrice = parseInt(inputElements[0].value);
        let maxPrice = parseInt(inputElements[1].value);
        if (minPrice > maxPrice) {
            let tempValue = maxPrice;
            maxPrice = minPrice;
            minPrice = tempValue;
        }
        const minPercentage = ((minPrice - 10) / 490) * 100;
        const maxPercentage = ((maxPrice - 10) / 490) * 100;
        rangeFill.style.left = minPercentage + "%";
        rangeFill.style.width = maxPercentage - minPercentage + "%";
        minValue.innerHTML = "$" + minPrice;
        maxValue.innerHTML = "$" + maxPrice;
    }
    const inputElements = document.querySelectorAll("input");
    // Add an event listener to each input element
    inputElements.forEach((element) => {
        element.addEventListener("input", validateRange);
    });
    // Initial call to validateRange
    validateRange();
</script>


<script>
    var productSlider2 = tns({
        container: '.product-slider-2',
        items: 4,
        gutter: 15,
        mouseDrag: true,
        nav: false,
        controls: false,
        autoplayButtonOutput: false,
        autoplay: true,
        responsive: {
            300: {
                items: 1
            },
            700: {
                items: 3
            },
            900: {
                items: 4
            }
        }
    });
    document.querySelector(".product-slider-2-prev").addEventListener("click", function() {
        productSlider2.goTo('prev');
    });
    document.querySelector(".product-slider-2-next").addEventListener("click", function() {
        productSlider2.goTo('next');
    });
</script>


<script>
    var productSlider3 = tns({
        container: '.product-slider-3',
        items: 4,
        gutter: 15,
        mouseDrag: true,
        nav: false,
        controls: false,
        autoplayButtonOutput: false,
        autoplay: true,
        responsive: {
            300: {
                items: 1
            },
            700: {
                items: 3
            },
            900: {
                items: 4
            }
        }
    });
    document.querySelector(".product-slider-3-prev").addEventListener("click", function() {
        productSlider3.goTo('prev');
    });
    document.querySelector(".product-slider-3-next").addEventListener("click", function() {
        productSlider3.goTo('next');
    });
</script>


<script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
</script>



</body>

</html>