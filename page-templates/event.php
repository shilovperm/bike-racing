<?php
/*
* Template Name: event
*/

get_header(); ?>

  <div class="container">

    <?php
        if (isset($_GET["event_id"])) {
            $par_event_id = $_GET["event_id"];
        };

        $event = get_event_info_by_event_id($par_event_id);
        $categories = get_event_categories_by_event_id($par_event_id);
        $timeLine = get_event_timeline_by_event_id($par_event_id);
        $costRules = get_event_cost_rules_by_event_id($par_event_id);
        foreach ($event as &$eventValue)
        {
          echo '<h3>'. $eventValue->event_title .'</h3>';
          echo '<h4>'. $eventValue->event_subtitle .'</h4>';
          echo '<h5> Организатор: '. $eventValue->org_name .'  '.'<img  class="img-logo yellow-background" src="data:image/png;base64,'.base64_encode($eventValue->org_logo).'" alt="wr"></h5>';
          echo '';
        };
    ?>

  <div>
<?php
get_footer();
