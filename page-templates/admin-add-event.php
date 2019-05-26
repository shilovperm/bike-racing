<?php
/*
* Template Name: admin-add-event
*/

get_header(); ?>

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/admin-add-event-page' );  }
  else
  {   get_template_part( 'template-parts/admin-no-access' );  }
?>

<?php
get_footer();
