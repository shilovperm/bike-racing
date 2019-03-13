<?php
/*
* Template Name: Rider
*/

get_header(); ?>

<div class="container">
  <?php
      if (isset($_POST['button']))
      {
          if (!empty($_POST["wp_user_id"]) && !empty($_POST["rider_id"])){
              $result = set_wp_user_to_rider($_POST["wp_user_id"],$_POST["rider_id"]);
          }
      }

      if (isset($_GET["rider_id"])) {
          $par_rider_id = $_GET["rider_id"];
      };

      $rider = get_rider_info($par_rider_id);
      $rider_years = get_rider_years_of_events($par_rider_id);
      $current_user = wp_get_current_user();

      foreach ($rider as &$rider_value) {
        echo '<br>';
        if ($rider_value->rider_photo) {
            echo '<img  class="" src="data:image/webp;base64,'.base64_encode($rider_value->rider_photo).'" height="400" width="300" alt="rider_image">';
        } elseif (substr(get_avatar_url($rider_value->wp_user_id), 35, 1) != "?") {
            echo get_avatar($rider_value->wp_user_id,200,'','', array('extra_attr'=>'style="border-radius: 0.5rem !important; box-shadow: 0 0 10px rgba(0,0,0,0.5);"') );
        }

        echo '<h3>'.$rider_value->rider_name;
        if ($rider_value->wp_user_approved == 1) {
          echo '<img class="ml-1" height="15" width="15" src="'.get_template_directory_uri() . '/images/verified.png" data-toggle="tooltip" data-placement="top" title="Верифицирован" >';
        }
        if (strlen($rider_value->strava_link)>0){
            echo '<a href="'.$rider_value->strava_link.'" target="_blank"><img class="img-logo ml-1" src="'.get_template_directory_uri() . '/images/Logo_Strava.png" ></a>';
        }
        echo '</h3>';

        if ($current_user->exists()) {
          $full_name = $current_user->user_lastname.' '.$current_user->user_firstname;
          if ($full_name == $rider_value->rider_name && $rider_value->wp_user_id == null) {
            echo '<form action="" method="post">';
            echo '    <input type="hidden" name="wp_user_id" value="'.$current_user->ID.'">';
            echo '    <input type="hidden" name="rider_id" value="'.$par_rider_id.'">';
            echo '    <button class="btn btn-success" type="submit" name="button">Привязать участника</button>';
            echo '</form>';
          }
          if ($full_name == $rider_value->rider_name && $rider_value->wp_user_id != null && $rider_value->wp_user_approved == 0) {
            echo '  <button type="button" class="btn btn-info" disabled>Запрос отправлен</button>';
          }
        }


        if (strlen($rider_value->team_name)>0){
          echo '<h4> Команда: <a href="'.$rider_value->team_strava_link.'" target="_blank"><img  class="img-logo ml-1" src="data:image/png;base64,'.base64_encode($rider_value->team_photo).'" alt="wr"></a></h4>';
        }
        if (strlen($rider_value->birth_year)>0){
          echo '<h5> Год рождения: '.$rider_value->birth_year.'</h5>';
        }
      }
  ?>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <?php      
        foreach ($rider_years as &$value) {
          echo '<li class="nav-item">';
          if ($value->year == $rider_years[0]->year ) {
            echo '    <a class="nav-link active" id="'.$value->year.'-tab" data-toggle="tab" href="#YEAR'.$value->year.'" role="tab" aria-controls="'.$value->year.'" aria-selected="true">'.$value->year.'</a>';
          } else {
            echo '    <a class="nav-link" id="'.$value->year.'-tab" data-toggle="tab" href="#YEAR'.$value->year.'" role="tab" aria-controls="'.$value->year.'" aria-selected="false">'.$value->year.'</a>';
          }
          echo '</li>';
        }
      ?>
  </ul>

  <div class="tab-content" id="myTabContent">
    <?php
      foreach ($rider_years as &$value) {
          if ($value->year == $rider_years[0]->year ) {
              echo '<div class="tab-pane fade show active" id="YEAR'.$value->year.'" role="tabpanel" aria-labelledby="'.$value->year.'-tab">';
          } else {
              echo '<div class="tab-pane fade" id="YEAR'.$value->year.'" role="tabpanel" aria-labelledby="'.$value->year.'-tab">';
          }

          $rider_year_ratings =get_rating_by_rider_id($par_rider_id,$value->year);

          if (count($rider_year_ratings)>0) {
            echo '<h6> Рейтинги: </h6>';
            echo '<div class="table-container">';
            echo '	<table class="table table-striped table-bordered" style="width:100%">';
            echo '    <thead>';
            echo '        <tr>';
            echo '            <th>Рейтинг</th>';
            echo '            <th>№</th>';
            echo '            <th>Очки</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($rider_year_ratings as &$year_ratings) {
                echo '        <tr>';
                echo '            <td>'.$year_ratings->rating_name.'</td>';
                echo '            <td> <span class="badge badge-' . $year_ratings->style . ' d-inline" data-toggle="tooltip" data-placement="top" title="Рейтинг в категории '.$year_ratings->Category_Short_Name.'">#' . $year_ratings->rating . '</span> </td>';
                echo '            <td>'.$year_ratings->result_points.' </td>';
                echo '        </tr>';
            }
            echo '		</tbody>';
            echo '	</table>';
            echo '</div>';
          }

          $rider_year_results = get_rider_results_by_year($par_rider_id,$value->year);
            echo '<h6> События: </h6>';
            echo '<div class="table-container">';
            echo '	<table class="table table-striped table-bordered" style="width:100%">';
            echo '    <thead>';
            echo '        <tr>';
            echo '            <th>№</th>';
            echo '            <th>Событие</th>';
            echo '            <th>Дата</th>';
            echo '            <th>Очки</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($rider_year_results as &$year_results) {
                echo '        <tr>';
                echo '            <td> <span class="badge badge-' . $year_results->style . ' d-inline" data-toggle="tooltip" data-placement="top" title="Место в категории '.$year_results->category_short_name.'">' . $year_results->result_category_place . '</span> </td>';
                echo '            <td>'.$year_results->event_title.'<i> ('.$year_results->event_subtitle.')</i></td>';
                echo '            <td>'.date("d.m", strtotime( $year_results->event_date)).' </td>';
                echo '            <td>'.$year_results->result_points.' </td>';
                echo '        </tr>';
            }
            echo '		</tbody>';
            echo '	</table>';
            echo '</div>';

          echo '</div>';
      }
    ?>
  </div>

</div>

<?php
get_footer();
