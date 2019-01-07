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
          <div class="card-deck card-deck-custom">
            <div class="card card-custom">
              <img src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" class="card-img-top card-img-top-custom" alt="Велта-спорт">
              <div class="card-body">
                <h5 class="card-title">Кубок Велта-спорт</h5>
                <p class="card-text">I этап "Открытие сезона" MTB</p>
                <p class="card-text"><small class="text-muted">4 марта 2018</small></p>
              </div>
            </div>
            <div class="card card-custom">
              <img src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" class="card-img-top card-img-top-custom" alt="Велта-спорт">
              <div class="card-body">
                <h5 class="card-title">Кубок Велта-спорт</h5>
                <p class="card-text">II этап "Бодрый заряд" MTB</p>
                <p class="card-text"><small class="text-muted">13 мая 2018</small></p>
              </div>
            </div>
            <div class="card card-custom">
              <img src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" class="card-img-top card-img-top-custom" alt="Велта-спорт">
              <div class="card-body">
                <h5 class="card-title">Кубок Велта-спорт</h5>
                <p class="card-text">III этап "Ровный пульс" MTB</p>
                <p class="card-text"><small class="text-muted">17 июня 2018</small></p>
              </div>
            </div>
            <div class="card card-custom">
              <img src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" class="card-img-top card-img-top-custom" alt="Велта-спорт">
              <div class="card-body">
                <h5 class="card-title">Кубок Велта-спорт</h5>
                <p class="card-text">IV этап "ДИВное лето" MTB</p>
                <p class="card-text"><small class="text-muted">29 июля 2018</small></p>
              </div>
            </div>
            <div class="card card-custom">
              <img src="<?php echo get_template_directory_uri() . '/images/veltasport.png'; ?>" class="card-img-top card-img-top-custom" alt="Велта-спорт">
              <div class="card-body">
                <h5 class="card-title">Кубок Велта-спорт</h5>
                <p class="card-text">V этап "Andronovo Mud Race" MTB</p>
                <p class="card-text"><small class="text-muted">27 октября 2018</small></p>
              </div>
            </div>
          </div>
        </section>
        <section class="past-events bordered">
          <div class="block-label">past-events</div>
          <h2>Прошедшие события</h2>
          <div class="container-events">
            <article class="event-block velta-background">
              <h4 class="event-header">Кубок Велта-спорт</h4>
              <p class="event-stage">I этап</p>
              <p class="event-date">04.03.2018</p>
            </article>
            <article class="event-block velta-background">
              <h4 class="event-header">Кубок Велта-спорт</h4>
              <p class="event-stage">II этап</p>
              <p class="event-date">04.03.2018</p>
            </article>
            <article class="event-block velta-background">
              <h4 class="event-header">Кубок Велта-спорт</h4>
              <p class="event-stage">III этап</p>
              <p class="event-date">04.03.2018</p>
            </article>
            <article class="event-block velta-background">
              <h4 class="event-header">Кубок Велта-спорт</h4>
              <p class="event-stage">IV этап</p>
              <p class="event-date">04.03.2018</p>
            </article>
            <article class="event-block velta-background">
              <h4 class="event-header">Кубок Велта-спорт</h4>
              <p class="event-stage">V этап</p>
              <p class="event-date">04.03.2018</p>
            </article>
          </div>
        </section>
        <!--
        <div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
  				<h1>Hello world<?php // заголовок архивов
  					if (is_day()) : printf('Daily Archives: %s', get_the_date()); // если по дням
  					elseif (is_month()) : printf('Monthly Archives: %s', get_the_date('F Y')); // если по месяцам
  					elseif (is_year()) : printf('Yearly Archives: %s', get_the_date('Y')); // если по годам
  					else : 'Archives';
  				endif; ?></h1>
  				<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
  					<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
  				<?php endwhile; // конец цикла
  				else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>
  				<?php pagination(); // пагинация, функция нах-ся в function.php ?>
  			</div>
  			<?php get_sidebar(); // подключаем sidebar.php ?>
      -->
  		</div>
  	</div>
  </section>
<?php get_footer(); // подключаем footer.php ?>
