<?php
/*
* Template Name: Intro
*/

get_header(); ?>

    <div class="container-intro">
        <div class="view">
            <img src="<?php echo get_template_directory_uri() . '/images/title2.jpg'; ?>" class="img-fluid" alt="">
            <div class="mask flex-center rgba-black-strong">
                <div class="row d-flex flex-column justify-content-center text-center h-100 container-fluid">
                    <h3 class="text-light pt-2 mb-2 container-fluid">
                       Любишь гоняться? Люби и гоняйся
                    </h3>
                    <!--<hr class="hr-light">
                      <h4 class="text-light">
                      Мы тебе гонки - ты нам свою душу
                    </h4>-->
                    <a class="btn btn-outline-light align-self-center mb-2" href="<?php echo home_url() . '/events/';?>">Начать!</a>

                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
