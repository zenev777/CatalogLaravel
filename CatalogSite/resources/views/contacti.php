<?php include "includes/nav.php";?>
<div class="container">
    <div class="row tt ">
        <div class="col-6 bql mxm">
            <div class="pole-conactii">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item mininav "><a href="index.php" class="text-decoration-none">Начало</a>
                        </li>
                        <li class="breadcrumb-item mininav" aria-current="page">Контакти</li>
                    </ol>
                </nav>
                <h1 class="title-contact1">Свържете се с<br>
                    нас
                </h1>

                <span class="gradiend"></span>

            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2945.046769147165!2d25.61027427593471!3d42.42673937118682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40a86993d2fdf8a9%3A0xf5b789486c30febf!2z0KHRgtCw0YDQsCDQl9Cw0LPQvtGA0LAg0KbQtdC90YLRitGALCDRg9C7LiDigJ7QodGC0YDRitC80L3QsOKAnCAxNCwgNjAwMyDQodGC0LDRgNCwINCX0LDQs9C-0YDQsA!5e0!3m2!1sbg!2sbg!4v1708972848456!5m2!1sbg!2sbg"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
        </div>
        <div class="col-6 bql ">
            <div class="d-flex gap-3 tt">
                <div class="d-flex flex-column pole-conacti">
                    <span class="title-pole">Email</span>
                    <a class="pole-danni" href="mailto:office@regular.bg">office@regular.bg</a>
                </div>
                <div class="d-flex flex-column pole-conacti">
                    <span class="title-pole">Телефон</span>
                    <a href="tel:+359899065105" class="pole-danni">+359 899 065 105</a>
                    <span>
                </div>
            </div>
            <div class="d-flex flex-column pole-conacti mt-3">
                <span class="title-pole">Адрес</span>
                <span class="pole-danni">гр. Стара Загора, Стръмна, 14</span>
                <span>
            </div>
            <div class="pole-conacti mt-3">
                <p style="  color: #2a2964; font-size:14px; ">Попълнете и изпратете формата за запитване и нашият екип
                    ще се свърже с вас
                    за уточняване на детайли</p>
                <form>
                    <input type=" text" id="name" name="name" placeholder="Вашето име*" class="input-polecontacti"><br>
                    <input type="text" id="phone" name="phone" placeholder="Телефон за контакт*"
                        class="input-polecontacti"><br>
                    <input type="email" required id="email" name="email" placeholder="Вашият email*"
                        class="input-polecontacti"><br>
                    <textarea id="comentar" name="comentar" rows="7" class="textarea-polecontacti"
                        placeholder="Вашето съобщение*"></textarea>
                    <button type="submit" value="Submit" class="btn-contactiform">Изпрати </button>

                </form>
            </div>




        </div>
    </div>


</div>


<?php include "includes/footer.php" ?>