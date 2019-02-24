<?php
/*
* Template Name: admin-rider-verification
*/

get_header(); ?>

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/admin-rider-verification' );  }
  else
  {   get_template_part( 'template-parts/admin-no-access' );  }
?>

<?php
get_footer();
