<?php
/*
* Template Name: Rider
*/

get_header(); ?>

<div class="container">
  <?php
      if (isset($_GET["rider_id"])) {
          $par_rider_id = $_GET["rider_id"];
      };

      $rider = get_rider_info($par_rider_id);
      $rider_years = get_rider_years_of_events($par_rider_id);


      foreach ($rider as &$rider_value) {
        echo '<h3>'.$rider_value->rider_name;
        if (strlen($rider_value->strava_link)>0){
            echo '<a href="'.$rider_value->strava_link.'" target="_blank"><img class="img-logo ml-1" src="'.get_template_directory_uri() . '/images/Logo_Strava.png" ></a>';
        }
        echo '</h3>';

        if (strlen($rider_value->team_name)>0){
          echo '<h4> Команда: '.$rider_value->team_name.'<a href="'.$rider_value->team_strava_link.'" target="_blank"><img  class="img-logo yellow-background ml-1" src="data:image/png;base64,'.base64_encode($rider_value->team_photo).'" alt="wr"></a></h4>';
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
          echo '    <a class="nav-link active" id="'.$value->year.'-tab" data-toggle="tab" href="#YEAR'.$value->year.'" role="tab" aria-controls="'.$value->year.'" aria-selected="true">'.$value->year.'</a>';
          echo '</li>';
        }
      ?>
  </ul>

  <div class="tab-content" id="myTabContent">
    <?php
      foreach ($rider_years as &$value) {
          echo '<div class="tab-pane fade show active" id="YEAR'.$value->year.'" role="tabpanel" aria-labelledby="'.$value->year.'-tab">';
          $rider_year_results = get_rider_results_by_year($par_rider_id,$value->year);

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
                echo '            <td> <span class="badge badge-' . $year_results->style . ' d-inline">' . $year_results->result_category_place . '</span> </td>';
                echo '            <td>'.$year_results->event_title.'<i>('.$year_results->event_subtitle.')</i></td>';
                echo '            <td>'.date("d.m.Y", strtotime( $year_results->event_date)).' </td>';
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
