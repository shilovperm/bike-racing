<?php
/**
 * WP Bootstrap 4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_4
 */

if ( ! function_exists( 'wp_bootstrap_4_setup' ) ) :
	function wp_bootstrap_4_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'wp-bootstrap-4', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Enable Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'status', 'quote', 'link' ) );

		// Enable support for woocommerce.
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp-bootstrap-4' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_4_custom_background_args', array(
			'default-color' => 'f8f9fa',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_4_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_4_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_4_content_width', 800 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_4_content_width', 0 );




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_4_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-4' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'wp-bootstrap-4' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'wp-bootstrap-4' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'wp-bootstrap-4' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'wp-bootstrap-4' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-4' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'wp_bootstrap_4_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_4_scripts() {
	wp_enqueue_style( 'open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );

	wp_enqueue_script( 'jquery-3.3.1-js', 					get_template_directory_uri() . '/assets/js/jquery-3.3.1.js', array('jquery'), 'v3.3.1', true );
	wp_enqueue_script( 'jquery-ui-js', 							get_template_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'), 'v1.12.1', true );
	wp_enqueue_script( 'jquery-dataTables-min-js', 	get_template_directory_uri() . '/assets/js/jquery.dataTables.min.js', array('jquery'), 'v3.3.1', true );
	wp_enqueue_script( 'popper-js', 								get_template_directory_uri() . '/assets/js/popper.js', array('jquery'), 'v0', true );
	wp_enqueue_script( 'bootstrap-4-js', 						get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'dataTables-bootstrap-4-js', get_template_directory_uri() . '/assets/js/dataTables.bootstrap4.min.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'jquery-fancybox-js', 				get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), 'v3.5.6', true );
  wp_enqueue_script( 'customizer-js', 						get_template_directory_uri() . '/assets/js/customizer.js', array('jquery'), 'v1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_4_scripts' );


/**
 * Registers an editor stylesheet for the theme.
 */
function wp_bootstrap_4_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'wp_bootstrap_4_add_editor_styles' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*
**************************************************************************************************
Пакет pack_admin
**************************************************************************************************
*/
/*
Возвращает список всех событий для админки
*/

function add_event($par_org_id,
	                      $par_event_title,
	                      $par_event_subtitle,
	                      $par_event_date,
	                      $par_event_description,
	                      $par_event_status_id,
	                      $par_event_type_id ,
	                      $par_event_image_id,
	                      $par_event_category_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_add_event(%d,%s,%s,%s,%s,%d,%d,%d,%d);',	$par_org_id,
																						                      $par_event_title,
																						                      $par_event_subtitle,
																						                      $par_event_date,
																						                      $par_event_description,
																						                      $par_event_status_id,
																						                      $par_event_type_id ,
																						                      $par_event_image_id,
																						                      $par_event_category_id));
	return $results;
}

function update_event($par_event_id,
											$par_org_id,
	                    $par_event_title,
	                    $par_event_subtitle,
	                    $par_event_date,
	                    $par_event_description,
	                    $par_event_status_id,
	                    $par_event_type_id ,
	                    $par_event_image_id,
	                    $par_event_category_type_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_update_event(%d,%d,%s,%s,%s,%s,%d,%d,%d,%d);',	$par_event_id,
																																	$par_org_id,
																						                      $par_event_title,
																						                      $par_event_subtitle,
																						                      $par_event_date,
																						                      $par_event_description,
																						                      $par_event_status_id,
																						                      $par_event_type_id ,
																						                      $par_event_image_id,
																						                      $par_event_category_type_id));
	return $results;
}

function update_image($par_image_id,
											$par_description)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_update_image(%d,%s);',	$par_image_id, $par_description));
	return $results;
}


/*Возвращает все события*/
function get_all_events()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_all_events();','events_info') );
	return $results;
}

/*Возвращает всю информацю по изображениям*/
function get_all_images_info()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_all_images_info();','events_info') );
	return $results;
}

/*Возвращает всю информацю по изображению*/
function get_image_info_by_image_id($par_image_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_image_info_by_image_id(%d);',$par_image_id) );
	return $results;
}


/*
Возвращает список всех статусов событий для админки
*/
function get_spr_category_types()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_spr_category_types();','events_info') );
	return $results;
}

/*
Возвращает список всех загруженных картинок для админки
*/
function get_spr_images()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_spr_images();','events_info') );
	return $results;
}

/*
Возвращает список всех статусов событий для админки
*/
function get_spr_event_status()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_spr_event_status();','events_info') );
	return $results;
}


/*
Возвращает список всех типов событий для админки
*/
function get_spr_race_types()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_spr_race_types();','events_info') );
	return $results;
}

/*
Возвращает список всех организаторов событий для админки
*/
function get_spr_organizations()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_admin.p_get_spr_organizations();','events_info') );
	return $results;
}



/*
--------------------------------------------------------------------------------------------------
Окончание пакета pack_admin
--------------------------------------------------------------------------------------------------
*/

/*
**************************************************************************************************
Пакет pack_calendar
**************************************************************************************************
*/
/*
Возвращает список сезонов в которых есть события
*/
function get_years_of_events()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_calendar.p_get_years_of_events();','events_info') );
	return $results;
}

/*
Возвращает список месяцев в которые были события в году
*/
function get_months_of_events_by_year($year)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_calendar.p_get_months_of_events_by_year(%d)',$year) );
	return $results;
}

/*
Возвращает список событий в выбранном месяце выбранного года
*/
function get_events_by_year_month($year, $month)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_calendar.p_get_events_by_year_month(%d,%d)',$year,$month) );
	return $results;
}

/*
--------------------------------------------------------------------------------------------------
Окончание пакета pack_calendar
--------------------------------------------------------------------------------------------------
*/

/*
**************************************************************************************************
Пакет pack_events
**************************************************************************************************
*/
/*
Возвращает список всех будущих событий
*/
function get_all_future_events()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_all_future_events();','events_info') );
	return $results;
}

/*
Возвращает список всех прошедших и отмененных событий
*/
function get_all_past_events()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_all_past_events();','events_info') );
	return $results;
}

/*
Возвращает категории мероприятия
*/
function get_event_categories_by_event_id($event_id, $category_type)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_event_categories_by_event_id(%d,%s)',$event_id, $category_type) );
	return $results;
}

/*
Возвращает правила ценообразования
*/
function get_event_cost_rules_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_event_cost_rules_by_event_id(%d)',$event_id) );
	return $results;
}

/*
Возвращает общую информацию о мероприятии
*/
function get_event_info_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_event_info_by_event_id(%d)',$event_id) );
	return $results;
}

/*
Возвращает результаты гонки
*/
function get_event_result_by_event_id($event_id,$category_type)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_event_result_by_event_id(%d,%s)',$event_id, $category_type) );
	return $results;
}

/*
Возвращает расписание мероприятия
*/
function get_event_timeline_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_event_timeline_by_event_id(%d)',$event_id) );
	return $results;
}

//Список партнеров по событию
function get_partners_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_partners_by_event_id(%d)',$event_id) );
	return $results;
}

/*
Список ссылок на фото для события
*/

function get_photo_links_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_photo_links_by_event_id(%d)',$event_id) );
	return $results;
}

/*
Возвращает зарегистрированных участников мероприятия
*/
function get_registered_riders_by_event($event_id, $is_organisator)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_registered_riders_by_event(%d, %d)',$event_id, $is_organisator) );
	return $results;
}



//Список спонсоров по событию
function get_sponsors_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_sponsors_by_event_id(%d)',$event_id) );
	return $results;
}

/*
Время и количество кругов третьего участника в событии
*/

function get_third_time_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_third_time_by_event_id(%d)',$event_id) );
	return $results;
}

/*
Список ссылок на видео для события
*/

function get_video_links_by_event_id($event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_events.p_get_video_links_by_event_id(%d)',$event_id) );
	return $results;
}

/*Проверка на организатора*/
function is_organisation($wp_user_id, $event_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_var( $wpdb_bike->prepare(
			'SELECT  pack_events.f_is_organisation(%d,%d)',$wp_user_id,$event_id) );
	return $results;
}

/*
--------------------------------------------------------------------------------------------------
Окончание пакета pack_events
--------------------------------------------------------------------------------------------------
*/


/*
**************************************************************************************************
Пакет pack_rider
**************************************************************************************************
*/

/*
Возвращает список рейтингов в рамках сезона у участника
*/
function get_rating_by_rider_id($rider_id, $year)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_get_rating_by_rider_id(%d,%d)',$rider_id,$year) );
	return $results;
}

/*
Возвращает список участников с категориями
*/
function get_riders()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_get_riders_all();','rider_info') );
	return $results;
}

/*
Возвращает общуую информацию об участнике
*/
function get_rider_info_by_rider_id($rider_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_get_rider_info_by_rider_id(%d)',$rider_id) );
	return $results;
}

/*
Возвращает общуую информацию об участнике по идентификатору WP пользователя
*/
function get_rider_info_by_WP_user_id($WP_user_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_get_rider_info_by_WP_user_id(%d)',$WP_user_id) );
	return $results;
}

/*
Возвращает список результатов в рамках сезона у участника
*/
function get_rider_results_by_year($rider_id, $year)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_get_rider_results_by_year(%d,%d)',$rider_id,$year) );
	return $results;
}

/*
Возвращает список сезонов в которые были результаты у участника
*/
function get_rider_years_of_events($rider_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_get_rider_years_of_events(%d)',$rider_id) );
	return $results;
}

/*
Привязка пользователя WP к участнику
*/

function set_wp_user_to_rider($wp_user_id,$rider_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL pack_rider.p_set_wp_user_to_rider(%d,%d)',$wp_user_id,$rider_id) );
	update_user_option( $wp_user_id, 'show_admin_bar_front', false );
	return $results;
}

/*
--------------------------------------------------------------------------------------------------
Окончание пакета pack_rider
--------------------------------------------------------------------------------------------------
*/

/*
Возвращает список наименований участников
*/
function get_riders_for_registry()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_riders_for_registry();','rider_info') );
	return $results;
}

/*
Возвращает список наименований команд
*/
function get_teams_for_registry()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_teams_for_registry();','rider_info') );
	return $results;
}

/*
Возвращает рейтинг участников в категории
*/
function get_rating_list_by_category($category)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_rating_by_category(%s)',$category) );
	return $results;
}

/*Проверка на верификацию (проверка привязки WP пользователю участника)*/
function is_on_verification($wp_user_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_var( $wpdb_bike->prepare(
			'SELECT  f_is_on_verification(%d)',$wp_user_id) );
	return $results;
}

/*Проверка на полную верификацию WP пользователя с участником*/
function is_verified($wp_user_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_var( $wpdb_bike->prepare(
			'SELECT  f_is_verified(%d)',$wp_user_id) );
	return $results;
}


/*
Возвращает список рейтингов по годам
*/
function get_ratings()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_ratings()','events_info') );
	return $results;
}

/*
Возвращает список категорий по рейтингу
*/
function get_categories_by_rating_id($rating_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_categories_by_rating_id(%d)',$rating_id) );
	return $results;
}

/*
Возвращает рейтинг по идентификатору рейтинга
*/

function get_rating_by_rating_id($rating_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_rating_by_rating_id(%d)',$rating_id) );
	return $results;
}

/*
Возвращает стартовый рейтинг
*/

function get_start_rating()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_start_rating()','events_info') );
	return $results;
}

/*
Возвращает стартовый рейтинг по типам категорий
*/

function get_start_rating_by_category_type($rating_id,$category_type)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_start_rating_by_category_type(%d,%s)',$rating_id,$category_type) );
	return $results;
}


/*
Список участников на верификации
*/

function get_riders_on_verification()
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_get_riders_on_verification()','events_info') );
	return $results;
}

/*
Верификация участника
*/

function set_wp_user_verified($rider_id)
{
	global $wpdb_bike;
	$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
			'CALL p_set_wp_user_verified(%d)',$rider_id) );
	return $results;
}

	/*
	Общая информация о рейтинге
	*/

	function get_rating_info_by_rating_id($rating_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_get_rating_info_by_rating_id(%d)',$rating_id) );
		return $results;
	}

	/*
	Список событий входящих в рейтинг
	*/

	function get_rating_event_consist_by_rating_id($rating_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_get_rating_event_consist_by_rating_id(%d)',$rating_id) );
		return $results;
	}

	/*
	Функция добавления участника из формы сохранения
	*/
	function add_rider($rider_name,$category_short_name,$birth_year,$city,$strava_link,$WP_user_id,$wp_user_approved)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_add_rider(%s,%s,%d,%s,%s,%d,%d)',$rider_name,$category_short_name,$birth_year,$city,$strava_link,$WP_user_id,$wp_user_approved) );
		return $results;
	}

	/*
	Расчет % отставания от третьего в абсолюте
	<span class="badge badge-danger d-inline"> +12% </span>
	*/
	function get_rider_span_lag_percent($third_time, $third_laps, $rider_time, $rider_laps, $rule_min, $rule_max)
	{
		$time_percent = 0;

		if ($rule_min>=0 && $rule_max >0) {
			$time_percent = (($rider_time/$rider_laps)/($third_time/$third_laps)-1)*100;
			if ($time_percent > 0) {
				if ($time_percent <= $rule_min) {
					$color="success";
				} elseif ($time_percent < $rule_max) {
					$color="default";
				} else {
					$color="danger";
				}
				$results = '<span data-toggle="tooltip" data-placement="top" title="Отставание от тройки лидеров" class="badge badge-'.$color.' d-inline"> '.round($time_percent,1).'% </span>';
			}
		}
		return $results;
	}




	/*
	Обновление параметров профиля участника
	*/

	function update_rider_by_WP_user($rider_name, $birth_year, $strava_link, $city, $WP_user_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_update_rider_by_WP_user(%s,%s,%s,%s,%d)',$rider_name, $birth_year, $strava_link, $city, $WP_user_id) );
		return $results;
	}





	//Регистрация участника на событие
	function register_rider($rider_name, $category_id, $birth_year, $city, $event_id, $team, $team_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_register_rider(%s,%s,%s,%s,%d,%s,%d)',$rider_name, $category_id, $birth_year, $city, $event_id, $team, $team_id) );
		return $results;
	}

	// Функция подтверждает оплату участника
	function paymentAccept($reg_id)
	{
	  global $wpdb_bike;
	  $results = $wpdb_bike->get_results( $wpdb_bike->prepare(
	      'CALL p_payment_accept(%d);',$reg_id) );
	  return $results;
	}

	// Функция отменяет оплату участника
	function paymentReject($reg_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_payment_reject(%d);',$reg_id) );
		return $results;
	}

	//функция отменяет регистрацию участника
	function registrationOut($reg_id)
	{
	  global $wpdb_bike;
	  $results = $wpdb_bike->get_results( $wpdb_bike->prepare(
	      'CALL p_registration_out(%d);',$reg_id) );
	  return $results;
	}

	//функция возвращает в статус зарегистрировано участника
	function registrationIn($reg_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_registration_in(%d);',$reg_id) );
		return $results;
	}

	//функция устанавливает признак премиум пакета
	function premiumPackAccept($reg_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_premium_pack_accept(%d);',$reg_id) );
		return $results;
	}

	//функция снимает признак премиум пакета
	function premiumPackReject($reg_id)
	{
		global $wpdb_bike;
		$results = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_premium_pack_reject(%d);',$reg_id) );
		return $results;
	}


	//Преобразование даты в русское наименование
	function russian_date($event_date){
		$date=explode(".", date("j.m.Y", strtotime($event_date)));
		switch ($date[1]){
			case 1: $m='января'; break;
			case 2: $m='февраля'; break;
			case 3: $m='марта'; break;
			case 4: $m='апреля'; break;
			case 5: $m='мая'; break;
			case 6: $m='июня'; break;
			case 7: $m='июля'; break;
			case 8: $m='августа'; break;
			case 9: $m='сентября'; break;
			case 10: $m='октября'; break;
			case 11: $m='ноября'; break;
			case 12: $m='декабря'; break;
		}
		echo $date[0].'&nbsp;'.$m.'&nbsp;';
	}

/*Заменяем логотип на свой*/
function my_login_logo(){
 echo '
 <style type="text/css">
 #login h1 a { background: url('. get_template_directory_uri() .'/images/logo_login.png) no-repeat 0 0 !important; width: 100%; height:150px;}
 </style>';
}
add_action('login_head', 'my_login_logo');

/*Отключаем библиотеку WP-embed*/
function my_deregister_scripts(){
 wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/* Ставим ссылку с логотипа на сайт, а не на wordpress.org */
add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );

/* убираем title в логотипе "сайт работает на wordpress" */
add_filter( 'login_headertitle', create_function('', 'return false;') );

// Add a custom user role

$result = add_role( 'organization', 'Организатор' ,array( ) );
$result = add_role( 'rider', 'Гонщик' ,array( ) );



/*function remove_admin_bar() {
	$cur_user = wp_get_current_user();
	if ($cur_user->ID > 0){
			if (!current_user_can('administrator') {
				show_admin_bar(false)
			}
	}
}

add_action('after_setup_theme', 'remove_admin_bar');*/
