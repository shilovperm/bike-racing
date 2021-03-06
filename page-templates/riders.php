<?php
/*
* Template Name: Riders
*/

get_header(); ?>
<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Категория/Имя</th>
                <th>Команда</th>

            </tr>
        </thead>
        <tbody>
          <?php
            $riders = get_riders();
            foreach ($riders as &$rider_value) {
              echo '<tr>';
              echo '  <td class="position-relative"> <span data-toggle="tooltip" data-placement="top" title="Категория" class="badge badge-' . $rider_value->style.' d-inline ml-0">'.$rider_value->Category_Short_Name.'</span> <a href="'. home_url() .'/rider?rider_id='. $rider_value->rider_id .'">'. $rider_value->rider_name .'</a>';
              if ($rider_value->wp_user_approved == 1) {
                echo '<img class="ml-1" height="15" width="15" src="'.get_template_directory_uri() . '/images/verified.png" data-toggle="tooltip" data-placement="top" title="Верифицирован">';
              }
              if (strlen($rider_value->strava_link)>0){
                  echo '<a data-toggle="tooltip" data-placement="top" title="Профиль в STRAVA" href="'.$rider_value->strava_link.'" target="_blank"><img class="ml-1 p-0" src="'.get_template_directory_uri() . '/images/Logo_strava_mini.png" height="24" width="24" alt="Logo_strava_mini" ></a>';
              }
              echo '  </td>';
              echo '  <td>';
              if (strlen($rider_value->team_name)>0){
                  if (strlen($rider_value->team_strava_link)>0 and $rider_value->team_image) {
                      echo '<a data-toggle="tooltip" data-placement="top" title="Профиль команды" href="'.$rider_value->team_strava_link.'" target="_blank"><img  class="table-logo ml-1 p-0" src="data:image/png;base64,'.base64_encode($rider_value->team_image).'" alt="'.$rider_value->team_name.'"></a>';
                  } else {
                      echo '<b>'.$rider_value->team_name.'</b>';
                  }
              }

              echo '  </td>';
              echo '</tr>';
            }
          ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Категория/Имя</th>
                <th>Команда</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php
get_footer();
