<?php
/*
* Template Name: Intro
*/

get_header(); ?>
    <!--
    <div id="intro" class="view" style="background-image: url(<?php echo get_template_directory_uri() . '/images/title2.jpg'; ?>); -webkit-background-size:cover; background-size:cover;">
        <div class="mask rgba-black-strong">
            <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                <div class="row d-flex justify-content-center text-center">
                    <h2 class="display-4 font-weight-bold white-text pt-5 mb-2">
                       Любишь гоняться? Люби и гоняйся
                    </h2>
                    <hr class="hr-light">
                    <h4 class="white-text">
                      Мы тебе гонки - ты нам свою душу
                    </h4>
                    <button type="button" class="btn btn-outline-light">Начать!</button>
                </div>
            </div>
        </div>
    </div>
  -->
    <div class="container-intro">
        <div class="view">
            <img src="<?php echo get_template_directory_uri() . '/images/title2.jpg'; ?>" class="img-fluid" alt="">
            <div class="mask flex-center rgba-black-strong">
                <div class="row d-flex flex-column justify-content-center text-center h-100">
                    <h3 class="text-light pt-5 mb-2">
                       Любишь гоняться? Люби и гоняйся
                    </h3>
                    <hr class="hr-light">
                    <h4 class="text-light">
                      Мы тебе гонки - ты нам свою душу
                    </h4>
                    <button type="button" class="btn btn-outline-light align-self-center">Начать!</button>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
