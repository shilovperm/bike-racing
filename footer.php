<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center bg-white mt-4 text-muted">
			<div class="container">
				<div class="row">
						<div class="col-sm">
							<h6 style="color:white!important;">Полезные ссылки</h6>
							<a href="https://t.me/cyclingche" 	target="_blank" style="color:white!important;"><img class="icon-social" src="<?php echo get_template_directory_uri()?>/images/telegram_logo.png">МТБ Велошкола Че</a><br>
							<a href="https://vk.com/cyclingche" target="_blank" style="color:white!important;"><img class="icon-social" src="<?php echo get_template_directory_uri()?>/images/vk-logo.png">МТБ Велошкола Че</a>
						</div>
						<div class="col-sm">
							<h6 style="color:white!important;">Обратная связь</h6>
							<a href="https://t.me/bike_racing_ru" target="_blank"><img class="d-inline icon-social" src="<?php echo get_template_directory_uri()?>/images/telegram_logo.png"> </a>
							<a href="https://vk.com/bike_racing_ru" target="_blank"><img class="d-inline icon-social" src="<?php echo get_template_directory_uri()?>/images/vk-logo.png"></a>
						</div>
						<div class="col-sm">
							<h6 style="color:white!important;">Прочее</h6>
							<a href="<?php echo home_url() . '/policy';?>" style="color:white!important;"> Политика конфиденциальности </a>
						</div>
				</div>
			</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
