<?php
/*
* Template Name: admin-images
*/

get_header(); ?>

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/admin-images-page' );  }
  else
  {   get_template_part( 'template-parts/admin-no-access' );  }
?>

<?php
get_footer();
