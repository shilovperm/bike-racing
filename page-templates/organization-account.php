<?php
/*
* Template Name: organization-account
*/

get_header(); ?>
<<<<<<< HEAD
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Наименование организатора </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Загрузка протоколов<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Редактирование протоколов</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Редактирование профиля</a>
                </li>
            </ul>
        </div>
    </nav>
        
</div>
=======

<?php
  if (current_user_can('administrator'))
  {   get_template_part( 'template-parts/organization-account-content' );  }
  else
  {   get_template_part( 'template-parts/organization-account-no-access' );  }
?>
>>>>>>> d3064cc41a6e12ca471e8517d74b4728b3613bb9

<?php
get_footer();
