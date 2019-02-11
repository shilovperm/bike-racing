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
        echo '<h3>'.$rider_value->rider_name.'</h3>';
      }
    ?>


</div>

<?php
get_footer();
