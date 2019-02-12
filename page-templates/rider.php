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
  <!---
  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="2019-tab" data-toggle="tab" href="#Y2019" role="tab" aria-controls="2019" aria-selected="true">2019</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
      </li>
  </ul>
      <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="Y2019" role="tabpanel" aria-labelledby="2019-tab">.1..</div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.2..</div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.3..</div>
  </div>
 -->



</div>

<?php
get_footer();
