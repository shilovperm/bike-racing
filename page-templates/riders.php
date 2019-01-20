<?php
/*
* Template Name: Riders
*/

get_header(); ?>
<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $riders = get_rider_list();
            foreach ($riders as &$value) {
              echo '<tr>';
              echo '  <td class="position-relative">', $value->rider_name;
              if (substr($value->photo_link, 0, 4)=='http' and substr($value->strava_link, 0, 4)=='http') {
                echo '      <span class="position-absolute rider-photo-link-position"><a target="_blank" href="',$value->strava_link,'"><img class="rounded-circle m-0 p-0" src="',$value->photo_link,'" width="44" height="44" alt="strava_rider"></a></span>';
              };
              if (substr($value->team_strava_logo_link, 0, 4)=='http' and substr($value->team_strava_link, 0, 4)=='http') {
                echo '      <span class="position-absolute team-photo-link-position"><a target="_blank" href="',$value->team_strava_link,'"><img class="rounded-circle m-0 p-0" src="',$value->team_strava_logo_link,'" width="44" height="44" alt="strava_team"></a></span>';
              };
              echo '  </td>';
              echo '  <td class="badge ', $value->style , ' p-1">',$value->Category_Short_Name,'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php
get_footer();
