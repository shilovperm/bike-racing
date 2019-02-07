<?php
/*
* Template Name: event
*/

get_header(); ?>

  <div class="container position-relative">

    <?php
        if (isset($_GET["event_id"])) {
            $par_event_id = $_GET["event_id"];
        };

        $event      = get_event_info_by_event_id($par_event_id);
        $categories = get_event_categories_by_event_id($par_event_id);
        $timeLine   = get_event_timeline_by_event_id($par_event_id);
        $costRules  = get_event_cost_rules_by_event_id($par_event_id);

        foreach ($event as &$eventValue)
        {
          echo '<h3>'. $eventValue->event_title .'</h3>';
          echo '<h4>'. $eventValue->event_subtitle .'</h4>';
          echo '<h5> Организатор: '. $eventValue->org_name .'  '.'<img  class="img-logo position-absolute yellow-background" src="data:image/png;base64,'.base64_encode($eventValue->org_logo).'" alt="wr"></h5>';
          echo '<h5> Дата: '. date("d.m.Y", strtotime( $eventValue->event_date)) .'</h5>';
          echo '<h6> Тип соревнования: '. $eventValue->race_type_name .' ('. $eventValue->race_type_short_name . ')</h6>';
          echo '<h6> Место регистрации на гонку:</h6>';
          echo $eventValue->event_place_map;

        }

        echo '<h6> Категории участников:</h6>';
        echo '<ul>';
          foreach ($categories as &$categoriesValue) {
            echo '<li class="list-style-type-none">';
            echo '  <span class="'. $categoriesValue->style .' rounded">'.  $categoriesValue->category_name .'</span> '. $categoriesValue->description ;
            echo '</li>';
          }
        echo '</ul>';

        echo '<h6> Расписание мероприятия:</h6>';
        echo '<ul>';
        foreach ($timeLine as &$timeLineValue) {
          echo '<li class="list-style-type-none">';
          echo    date("G:i", strtotime($timeLineValue->time_start))   .' ';

          if (date("G:i", strtotime($timeLineValue->time_end))=='0:00') {
              echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $timeLineValue->description;
          } else {
              echo date("G:i", strtotime($timeLineValue->time_end)).' '. $timeLineValue->description;
          }

          echo '</li>';
        }
        echo '</ul>';

        echo '<h6> Стоимость участия:</h6>';
        echo '<ul>';
          foreach ($costRules as &$costRulesValue) {
            echo '<li class="list-style-type-none">';
            echo    $costRulesValue->rule_cost .' рублей. '. $costRulesValue->rule_description ;
            echo '</li>';
          }
        echo '</ul>';
    ?>
  </div>
<?php
get_footer();
