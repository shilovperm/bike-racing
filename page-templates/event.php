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
          echo '<h6> Место регистрации на гонку:</h6>';
          echo '<div style="display: block; width: 100%; height: 450px;">'. $eventValue->event_place_map. '</div>';
        }

        echo '<h6> Категории участников:</h6>';
        echo '<ul>';
          foreach ($categories as &$categoriesValue) {
            echo '<li class="list-style-type-none">';
            echo '  <span class="'. $categoriesValue->style .' rounded cp-1">'.  $categoriesValue->category_name .'</span> '. $categoriesValue->description ;
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

			<h6>Результат гонки</h6>


							<div class="btn-group p-1">
								<button type="button" class="btn btn-danger   btn-filter" data-target="A"   >Категория А</button>
								<button type="button" class="btn btn-warning  btn-filter" data-target="B"   >Категория B</button>
								<button type="button" class="btn btn-success  btn-filter" data-target="C"   >Категория C</button>
								<button type="button" class="btn btn-info     btn-filter" data-target="D"   >Категория D</button>
                <button type="button" class="btn btn-default  btn-filter" data-target="all" >Все категории</button>
							</div>

						<div class="table-container">
							<table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Команда</th>
                        <th>Время</th>
                        <th>Круги</th>
                        <th>Очки</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($riderResult as &$riderResultValue) {
    									echo '<tr data-status="'.$riderResultValue->category_short_name.'">';
    									echo '   <td>'.$riderResultValue->result_category_place.' </td>';
                      echo '  <td class="position-relative"> <span class="badge ' . $riderResultValue->style . ' d-inline">' . $riderResultValue->category_short_name . '</span> ' . $riderResultValue->rider_name . '</td>';
                      /*  echo '   <td>'.$riderResultValue->rider_name.' </td>';*/
                      echo '   <td>'.$riderResultValue->team_name.' </td>';
                      echo '   <td>'.$riderResultValue->result_time.' </td>';
                      echo '   <td>'.$riderResultValue->result_laps.' </td>';
                      echo '   <td>'.$riderResultValue->result_points.' </td>';
    									echo '</tr>';
                    }
                  ?>
								</tbody>
							</table>
						</div>


  </div>
<?php
get_footer();
