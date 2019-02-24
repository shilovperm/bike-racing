<?php
/*
* Template Name: admin-load-results
*/

get_header(); ?>

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/admin-load-results' );  }
  else
  {   get_template_part( 'template-parts/admin-no-access' );  }
?>

<?php
get_footer();
