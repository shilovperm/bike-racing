<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133587744-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-133587744-1');
	</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="stylesheet" id="dataTables-css" 	href="<?php echo get_template_directory_uri() . '/assets/css/dataTables.bootstrap4.min.css'; ?>" type="text/css" media="all">
	<link rel="stylesheet" id="fancyBox" 				href="<?php echo get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css'; ?>" type="text/css" media="all">
	<?php
	/*Добавляем метаданные динамически в зависимости от страницы*/
	$currentPage = get_page_uri();
	if ($currentPage == 'events' or $currentPage == '') {
		echo '<meta property="og:title" content="Bike-Racing Велосипедные гонки в Перми"/>';
		echo '<meta property="og:description" content="Гонки, рейтинги участников, протоколы гонок"/>';
		echo '<meta property="og:image" content="https://bike-racing.ru/wp-content/themes/bike-racing/images/logo_login.png">';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content= "https://bike-racing.ru"/>';
	}

	if ($currentPage == 'rider') {
		if (isset($_GET["rider_id"])) {
				$par_rider_id = $_GET["rider_id"];
		};
		$rider = get_rider_info($par_rider_id);
		echo '<meta property="og:title" content="Bike-Racing Профиль участника: '.$rider[0]->rider_name.'"/>';
		echo '<meta property="og:description" content="Рейтинги и статистика выступлений участника '.$rider[0]->rider_name.'"/>';
		echo '<meta property="og:image" content="'.get_avatar_url($rider_value->wp_user_id).'">';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content= "'.home_url( add_query_arg( NULL, NULL )).'" />';
	}

	if ($currentPage == 'start-rating') {
		echo '<meta property="og:title" content="Bike-Racing Рейтинг Стартовый протокол"/>';
		echo '<meta property="og:description" content="Стартовый протокол определяет позицию в стартовом створе"/>';
		echo '<meta property="og:image" content="https://bike-racing.ru/wp-content/themes/bike-racing/images/logo_login.png">';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content= "https://bike-racing.ru/start-rating/"/>';
	}

	if ($currentPage == 'roadmap') {
		echo '<meta property="og:title" content="Bike-Racing Дорожная карта"/>';
		echo '<meta property="og:description" content="Дорожная карта определяет направление развития сайта и фиксирует изменения"/>';
		echo '<meta property="og:image" content="https://bike-racing.ru/wp-content/themes/bike-racing/images/logo_login.png">';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content= "https://bike-racing.ru/roadmap/"/>';
	}

	if ($currentPage == 'ratings') {
		if (isset($_GET["rating_id"])) {
        $p_rating_id = $_GET["rating_id"];
    } else {
        $p_rating_id = 1;
    };
		$ratingInfo   = get_rating_info_by_rating_id($p_rating_id);
	  $ratingEvents = get_rating_event_consist_by_rating_id($p_rating_id);

		echo '<meta property="og:title" content="Bike-Racing Рейтинг '.$ratingInfo[0]->rating_name.'"/>';
		echo '<meta property="og:description" content="';
		foreach ($ratingEvents as &$ratingEventsValue) {
				echo $ratingEventsValue->event_subtitle.' ';
		}
		echo '"/>';
		echo '<meta property="og:image" content="https://bike-racing.ru/wp-content/themes/bike-racing/images/logo_login.png">';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content= "'.home_url( add_query_arg( NULL, NULL )).'"/>';
	}

	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-4' ); ?></a>

	<header id="masthead" class="site-header <?php if ( get_theme_mod( 'sticky_header', 0 ) ) : echo 'sticky-top'; endif; ?>">
		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-dark bg-dark p-0">
			<?php if( get_theme_mod( 'header_within_container', 0 ) ) : ?><div class="container"><?php endif; ?>
				<?php the_custom_logo(); ?>

				<div class="site-branding-text">
					<?php
						if ( is_front_page() && is_home() ) : ?>
		                    <h1 class="site-title h3 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand mb-0"><?php bloginfo( 'name' ); ?></a></h1>
		                <?php else : ?>
		                    <h2 class="site-title h3 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand mb-0"><?php bloginfo( 'name' ); ?></a></h2>
		                <?php
						endif;

						if ( get_theme_mod( 'show_site_description', 1 ) ) {
		                    $description = get_bloginfo( 'description', 'display' );
		                    if ( $description || is_customize_preview() ) : ?>
		                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
		                    <?php
		                    endif;
		                }
					?>
				</div>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu-wrap" aria-controls="primary-menu-wrap" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'menu-1',
						'menu_id'         => 'primary-menu',
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'primary-menu-wrap',
						'menu_class'      => 'navbar-nav ml-auto',
			            'fallback_cb'     => '__return_false',
			            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			            'depth'           => 2,
			            'walker'          => new WP_bootstrap_4_walker_nav_menu()
					) );
				?>
			<?php if( get_theme_mod( 'header_within_container', 0 ) ) : ?></div><!-- /.container --><?php endif; ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
