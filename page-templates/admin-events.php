<?php
/*
* Template Name: admin-events
*/

get_header(); ?>

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/admin-events-page' );  }
  else
  {   get_template_part( 'template-parts/admin-no-access' );  }
?>

<?php
get_footer();
