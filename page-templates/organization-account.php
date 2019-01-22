<?php
/*
* Template Name: organization-account
*/

get_header(); ?>

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/organization-account-content' );  }
  else
  {   get_template_part( 'template-parts/organization-account-no-access' );  }
?>

<?php
get_footer();
