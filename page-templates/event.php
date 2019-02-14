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
        $riderResult= get_event_result_by_event_id($par_event_id);

        foreach ($event as &$eventValue)
        {
          echo '<h3>'. $eventValue->event_title .'<img  class="img-logo yellow-background ml-1" src="data:image/png;base64,'.base64_encode($eventValue->org_logo).'" alt="wr"></h3>';
          echo '<h4>'. $eventValue->event_subtitle .'</h4>';
          echo '<h5> Организатор: '. $eventValue->org_name .'</h5>';
          echo '<h5> Дата: '. date("d.m.Y", strtotime( $eventValue->event_date)) .'</h5>';
          echo '<h6> Тип соревнования: '. $eventValue->race_type_name .' ('. $eventValue->race_type_short_name . ')</h6>';
          if ($eventValue->event_status_id == 2) {
            echo '<a  href="'.$eventValue->event_registration_link.'" target="_blank" class="btn btn-success m-1">Зарегистрироваться</a>';
            echo '<a  href="'.$eventValue->event_participants_link.'" target="_blank" class="btn btn-info m-1"> Зарегистрированные участники </a>';
            echo '<h6> Оплата участия:</h6>';
            echo '<ul>';
            echo '    <li class="list-style-type-none">Получатель: <b>Чертков Дмитрий Сергеевич</b></li>';
            echo '    <li class="list-style-type-none">Карта Сбербанка: <b>4276 4900 2134 0734</b></li>';
            echo '</ul>';
          }

        }



        if (count($categories)>0) {
            echo '<h6> Категории участников:</h6>';
            echo '<ul>';
              foreach ($categories as &$categoriesValue) {
                echo '<li class="list-style-type-none">';
                echo '  <span class="'. $categoriesValue->style .' rounded cp-1">'.  $categoriesValue->category_name .'</span> - '.$categoriesValue->description ;
                echo '</li>';
              }
            echo '</ul>';
        }

        if (count($timeLine)>0) {
            echo '<h6> Расписание мероприятия:</h6>';
            echo '<ul>';
            foreach ($timeLine as &$timeLineValue) {
              echo '<li class="list-style-type-none">';
              echo    date("H:i", strtotime($timeLineValue->time_start))   .' ';

              if (date("H:i", strtotime($timeLineValue->time_end))=='00:00') {
                  echo $timeLineValue->description;
              } else {
                  echo date("H:i", strtotime($timeLineValue->time_end)).' '. $timeLineValue->description;
              }

              echo '</li>';
            }
            echo '</ul>';
        }

        if (count($costRules)>0) {
            echo '<h6> Стоимость участия:</h6>';
            echo '<ul>';
              foreach ($costRules as &$costRulesValue) {
                echo '<li class="list-style-type-none">';
                echo    $costRulesValue->rule_cost .' рублей. '. $costRulesValue->rule_description ;
                echo '</li>';
              }
            echo '</ul>';
        }

        if (strlen($eventValue->event_place_map)>0) {
        echo '<h6> Место регистрации на гонку:</h6>';
        echo '<div style="display: block; width: 100%; height: 450px;">'. $eventValue->event_place_map. '</div>';
        }

        if (count($riderResult)>0) {
    		    echo '<div class="btn-group p-1 d-inline-block ">';

                foreach ($categories as &$categoriesValue) {
            			 echo '<button type="button" class="btn btn-'. $categoriesValue->style .'   btn-filter m-1" data-target="'. $categoriesValue->category_short_name .'"   >'. $categoriesValue->category_name .'</button>';
                }
                echo '<button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>';
    		    echo '</div>';

        		echo '<div class="table-container">';
        		echo '	<table class="table table-striped table-bordered" style="width:100%">';
            echo '    <thead>';
            echo '        <tr>';
            echo '            <th>№</th>';
            echo '            <th>Имя</th>';
            echo '            <th>Время</th>';
            echo '            <th>Круги</th>';
            echo '            <th>Очки</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($riderResult as &$riderResultValue) {
        				echo '        <tr data-status="'.$riderResultValue->category_short_name.'">';
        				echo '            <td>';
                echo '                <span class="badge badge-default d-inline m-0">' . $riderResultValue->result_absolute_place . '</span>';
                echo '                <span class="badge badge-' . $riderResultValue->style . ' d-inline">' . $riderResultValue->result_category_place . '</span>';
                echo '            </td>';
                echo '            <td class="position-relative"> <span class="badge badge-' . $riderResultValue->style . ' d-inline">' . $riderResultValue->category_short_name . '</span> <a href="'. home_url() .'/rider?rider_id='. $riderResultValue->rider_id .'">'. $riderResultValue->rider_name .'</a></td>';
                /*echo '   <td>'.$riderResultValue->team_name.' </td>';*/
                echo '            <td>'.$riderResultValue->result_time.' </td>';
                echo '            <td>'.$riderResultValue->result_laps.' </td>';
                echo '            <td>'.$riderResultValue->result_points.' </td>';
        				echo '        </tr>';
            }
        		echo '		</tbody>';
        		echo '	</table>';
        		echo '</div>';
        }
    ?>
  </div>
<?php
get_footer();
