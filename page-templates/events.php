<?php
/*
* Template Name: Events
*/

get_header(); ?>

  <div class="container">
    <section class="next-events">
      <!--  <div class="block-label">next-events</div>-->
      <?php
        $events = get_all_future_events();
        if (count($events)>0) {
            echo '<h2 class="text-center">Ближайшие события</h2>';
            echo '<div class="container-events">';
            echo '<!-- Card Wider из БД-->';
            foreach ($events as &$value) {
                echo '<div class="card card-cascade wider card-custom position-relative blue-grey-text">';
                /*echo '    <!-- snowflake image -->';
                echo '    <img  class="card-add-picture-1 position-absolute" src="' . get_template_directory_uri() . '/images/snowflake.svg" alt="wr" height="25" width="25">';*/
                echo '    <!-- veltalogo image -->';
                echo '    <img  class="card-img-logo position-absolute yellow-background" src="data:image/png;base64,'.base64_encode($value->org_logo).'" alt="wr">';
                echo '    <!--XCO image -->';
                echo '    <p class="position-absolute race-type">' . $value->race_type_short_name . '</p>';
                echo '    <!-- Card image -->';
                echo '    <div class="view view-cascade overlay">';
                echo '        <a href="event/?event_id=' . $value->event_id . '">';
                echo '            <img  class="card-img-top img-link-hover" src="data:image/png;base64,'.base64_encode($value->image).'" height="200" width="300" alt="Card image cap">';
                echo '        </a>';
                echo '    </div>';
                echo '    <!-- Card content -->';
                echo '    <div class="card-body card-body-cascade text-center card-body-custom">';
                echo '        <!-- Title -->';
                echo '        <h4 class="card-title"><strong>' . $value->event_title . '</strong></h4>';
                echo '        <!-- Subtitle -->';
                echo '        <h5 class="blue-text pb-2"><strong>' . $value->event_subtitle . '</strong></h5>';
                echo '        <!-- Date -->';
                echo '        <p class="mb-0"><i class="fas fa-calendar mr-2"></i>' . date("d.m.Y", strtotime( $value->event_date)) . '</p>';
                echo '        <!-- Text -->';
                echo '        <p class="card-text">' . $value->event_description . '</p>';
                echo '        <!-- Button -->';
                $btnstyle   = ($value->status_id == 2 or $value->status_id == 3) ? 'btn-success' :'btn-outline-gray';
                $btndisable = ($value->status_id == 2) ? '':'disabled';
                echo '        <button type="button" class="btn '. $btnstyle .' btn-on-card"' . $btndisable . '>' . $value->status_name . '</button>';
                echo '    </div>';
                echo '</div>';
                echo '<!-- Card Wider -->';
            echo '</div>';
            }
          }
      ?>
    </section>
    <section class="past-events">
        <?php
            $events = get_all_past_events();
            if (count($events)>0) {
                echo '<h2 class="text-center">Прошедшие события</h2>';
                echo '<div class="container-events">';
                echo '  <!-- Card Wider из БД-->';
                foreach ($events as &$value) {
                    echo '<div class="card card-cascade wider card-custom position-relative blue-grey-text">';
                    /*echo '    <!-- snowflake image -->';
                    echo '    <img  class="card-add-picture-1 position-absolute" src="' . get_template_directory_uri() . '/images/snowflake.svg" alt="wr" height="25" width="25">';*/
                    echo '    <!-- veltalogo image -->';
                    echo '    <img  class="card-img-logo position-absolute yellow-background" src="data:image/png;base64,'.base64_encode($value->org_logo).'" alt="wr">';
                    echo '    <!--XCO image -->';
                    echo '    <p class="position-absolute race-type">' . $value->race_type_short_name . '</p>';
                    echo '    <!-- Card image -->';
                    echo '    <div class="view view-cascade overlay">';
                    echo '        <a href="event/?event_id=' . $value->event_id . '">';
                    echo '            <img  class="card-img-top img-link-hover" src="data:image/png;base64,'.base64_encode($value->image).'" height="200" width="300" alt="Card image cap">';
                    echo '        </a>';
                    echo '    </div>';
                    echo '    <!-- Card content -->';
                    echo '    <div class="card-body card-body-cascade text-center card-body-custom">';
                    echo '        <!-- Title -->';
                    echo '        <h4 class="card-title"><strong>' . $value->event_title . '</strong></h4>';
                    echo '        <!-- Subtitle -->';
                    echo '        <h5 class="blue-text pb-2"><strong>' . $value->event_subtitle . '</strong></h5>';
                    echo '        <!-- Date -->';
                    echo '        <p class="mb-0"><i class="fas fa-calendar mr-2"></i>' . date("d.m.Y", strtotime( $value->event_date)) . '</p>';
                    echo '        <!-- Text -->';
                    echo '        <p class="card-text">' . $value->event_description . '</p>';
                    echo '        <!-- Button -->';
                    $btnstyle   = ($value->status_id == 2 or $value->status_id == 3) ? 'btn-success' :'btn-outline-gray';
                    $btndisable = ($value->status_id == 2) ? '':'disabled';
                    echo '        <button type="button" class="btn '. $btnstyle .' btn-on-card"' . $btndisable . '>' . $value->status_name . '</button>';
                    echo '    </div>';
                    echo '</div>';
                    echo '<!-- Card Wider -->';
                }
                echo '</div>';
            }
          ?>
    </section>
  </div>
<?php
get_footer();
