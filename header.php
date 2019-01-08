<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage bike-racing
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>

  <title>Bike-racing</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<header class="bordered">
		<div class="block-label">header</div>



					<!--меню-->
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					  <a class="navbar-brand" href="#">Bike-racing</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerMenu"
					    aria-controls="navbarTogglerMenu" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarTogglerMenu">
					    <ul class="navbar-nav mr-auto smooth-scroll">
					      <li class="nav-item">
					        <a class="nav-link waves-effect waves-light" href="http://localhost/wp/">События <span class="sr-only">(current)</span></a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="http://localhost/wp/page-custom.php">Участники</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link " href="http://localhost/wp/page-custom.php">Рейтинги</a>
					      </li>
								<li class="nav-item">
					        <a class="nav-link " href="http://localhost/wp/page-custom.php">Организаторы</a>
					      </li>
					    </ul>
					  </div>
					</nav>




	</header>
