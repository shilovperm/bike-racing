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
							<a href="<?php echo home_url() . '/policy';?>" style="color:white!important;"> Политика конфиденциальности </a>
						</div>
						<div class="col-sm">
						</div>
						<div class="col-sm">
						</div>
				</div>
			</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
