<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage bike-racing
 */
get_header(); // подключаем header.php ?>
  <section>
  	<div class="container">
  		<div class="row">

        <section class="next-events bordered">
          <div class="block-label">next-events</div>
          <h2>Ближайшие события</h2>
          <div class="container-events">

            <!-- Card Wider -->
            <div class="card card-cascade wider card-custom position-relative blue-grey-text">
              <!-- sun image -->
              <i class="fas fa-sun position-absolute absolute-top-left text-danger "></i>
              <!-- bicycle image -->
              <i class="fas fa-bicycle position-absolute absolute-top-right text-danger"></i>
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img  class="card-img-top card-img-top-custom yellow-background" src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <!-- Title -->
                <h4 class="card-title"><strong>Кубок Велта-спорт</strong></h4>
                <!-- Subtitle -->
                <h5 class="blue-text pb-2"><strong>Этап №2 "Бодрый заряд"</strong></h5>
                <!-- Date -->
                <p class="mb-0"><i class="fas fa-calendar mr-2"></i>13.05.2018</p>
                <!-- Text -->
                <p class="card-text">Профсоюзка - это народный бренд</p>
                <!-- Button -->
                <button type="button" class="btn btn-outline-success waves-effect">Зарегистрироваться</button>
              </div>
            </div>
            <!-- Card Wider -->
            <!-- Card Wider -->
            <div class="card card-cascade wider card-custom position-relative blue-grey-text">
              <!-- cloud-sun image -->
              <i class="fas fa-cloud-sun position-absolute absolute-top-left text-primary"></i>
              <!-- bicycle image -->
              <i class="fas fa-bicycle position-absolute absolute-top-right text-danger"></i>
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img  class="card-img-top card-img-top-custom yellow-background" src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <!-- Title -->
                <h4 class="card-title"><strong>Кубок Велта-спорт</strong></h4>
                <!-- Subtitle -->
                <h5 class="blue-text pb-2"><strong>Этап №3 "РОВный пульс"</strong></h5>
                <!-- Date -->
                <p class="mb-0"><i class="fas fa-calendar mr-2"></i>17.06.2018</p>
                <!-- Text -->
                <p class="card-text">Рваный пульс на РОВной трассе</p>
                <!-- Button -->
                <button type="button" class="btn btn-outline-gray" disabled>Ожидание регистрации</button>
              </div>
            </div>
            <!-- Card Wider -->
            <!-- Card Wider -->
            <div class="card card-cascade wider card-custom position-relative blue-grey-text">
              <!-- umbrella image -->
              <i class="fas fa-umbrella position-absolute absolute-top-left text-primary"></i>
              <!-- bicycle image -->
              <i class="fas fa-bicycle position-absolute absolute-top-right text-danger"></i>
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img  class="card-img-top card-img-top-custom yellow-background" src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <!-- Title -->
                <h4 class="card-title"><strong>Кубок Велта-спорт</strong></h4>
                <!-- Subtitle -->
                <h5 class="blue-text pb-2"><strong>Этап №4 "ДИВное лето"</strong></h5>
                <!-- Date -->
                <p class="mb-0"><i class="fas fa-calendar mr-2"></i>29.07.2018</p>
                <!-- Text -->
                <p class="card-text">Лужа в твоих бошмаках зазвучит соль диезом</p>
                <!-- Button -->
                <button type="button" class="btn btn-outline-gray" disabled>Ожидание регистрации</button>
              </div>
            </div>
            <!-- Card Wider -->
            <!-- Card Wider -->
            <div class="card card-cascade wider card-custom position-relative blue-grey-text">
              <!-- piggy-bank image -->              
              <i class="fas fa-piggy-bank position-absolute absolute-top-left text-black-50"></i>
              <!-- bicycle image -->
              <i class="fas fa-bicycle position-absolute absolute-top-right text-danger"></i>
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img  class="card-img-top card-img-top-custom yellow-background" src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <!-- Title -->
                <h4 class="card-title"><strong>Кубок Велта-спорт</strong></h4>
                <!-- Subtitle -->
                <h5 class="blue-text pb-2"><strong>Этап №5 "Andronovo Mud Race"</strong></h5>
                <!-- Date -->
                <p class="mb-0"><i class="fas fa-calendar mr-2"></i>27.10.2018</p>
                <!-- Text -->
                <p class="card-text">Холодная грязь. Самовывоз. Дорого.</p>
                <!-- Button -->
                <button type="button" class="btn btn-outline-gray" disabled>Ожидание регистрации</button>
              </div>
            </div>
            <!-- Card Wider -->
          </div>
        </section>
        <section class="past-events bordered">
          <div class="block-label">past-events</div>
          <h2>Прошедшие события</h2>
          <div class="container-events">
            <!-- Card Wider -->
            <div class="card card-cascade wider card-custom position-relative blue-grey-text">
              <!-- snowflake image -->
              <i class="fas fa-snowflake position-absolute absolute-top-left text-info"></i>
              <!-- bicycle image -->
              <i class="fas fa-bicycle position-absolute absolute-top-right text-danger"></i>
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img  class="card-img-top card-img-top-custom yellow-background" src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" alt="Card image cap">
                <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <!-- Title -->
                <h4 class="card-title"><strong>Кубок Велта-спорт</strong></h4>
                <!-- Subtitle -->
                <h5 class="blue-text pb-2"><strong>Этап №1 "Открытие сезона"</strong></h5>
                <!-- Date -->
                <p class="mb-0"><i class="fas fa-calendar mr-2"></i>04.03.2018</p>
                <!-- Text -->
                <p class="card-text">Первая зимняя гонка от Сварочника и Димы Че</p>
                <!-- Button -->
                <button type="button" class="btn btn-success" disabled>Гонка завершена</button>
              </div>
            </div>
            <!-- Card Wider -->
          </div>
        </section>

  		</div>
  	</div>
  </section>
<?php get_footer(); // подключаем footer.php ?>
