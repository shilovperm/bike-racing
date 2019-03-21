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
        $categoriesCat = get_event_categories_by_event_id($par_event_id,'Category');
        $categoriesAge = get_event_categories_by_event_id($par_event_id,'Age');
        $timeLine   = get_event_timeline_by_event_id($par_event_id);
        $costRules  = get_event_cost_rules_by_event_id($par_event_id);
        $riderResultCat = get_event_result_by_event_id($par_event_id,'Category');
        $riderResultAge = get_event_result_by_event_id($par_event_id,'Age');
        $videoLinks = get_video_links_by_event_id($par_event_id);
        $photoLinks = get_photo_links_by_event_id($par_event_id);
        $thirdRider = get_third_time_by_event_id($par_event_id);

        foreach ($event as &$eventValue)
        {
          echo '<h3>'. $eventValue->event_title .'</h3>';
          echo '<h4>'. $eventValue->event_subtitle .'</h4>';
          echo '<h5> Организатор: '. $eventValue->org_name .'<img  class="img-logo yellow-background ml-1" src="data:image/png;base64,'.base64_encode($eventValue->org_logo).'" alt="wr"></h5>';
          echo '<h5> Дата: '. date("d.m.Y", strtotime( $eventValue->event_date)) .'</h5>';
          echo '<h6> Тип соревнования: '. $eventValue->race_type_name .' ('. $eventValue->race_type_short_name . ')</h6>';
          if ($eventValue->event_status_id == 2) {
            echo '<a  href="'.$eventValue->event_registration_link.'" target="_blank" class="btn btn-success m-1">Зарегистрироваться</a>';
            echo '<a  href="'.$eventValue->event_participants_link.'" target="_blank" class="btn btn-info m-1"> Зарегистрированные участники </a>';
            echo '<a  href="'.$eventValue->event_regulation_link.'" class="btn btn-info m-1"> Положение гонки </a>';
            echo '<h6> Оплата участия:</h6>';
            echo '<ul>';
            echo '    <li class="list-style-type-none">Получатель: <b>Чертков Дмитрий Сергеевич</b></li>';
            echo '    <li class="list-style-type-none">Карта Сбербанка: <b>4276 4900 2134 0734</b></li>';
            echo '    <li class="list-style-type-none">Сообщение: <b>Кубок весны</b></li>';
            echo '</ul>';
          } elseif ($eventValue->event_regulation_link != null && $eventValue->event_status_id <> 3) {
                echo '<a  href="'.$eventValue->event_regulation_link.'" class="btn btn-info m-1"> Положение гонки </a>';
          }
        }

        if (count($categoriesCat)>0) {
            echo '<h6> Категории участников:</h6>';
            echo '<ul>';
              foreach ($categoriesCat as &$categoriesValue) {
                echo '<li class="list-style-type-none">';
                echo '  <span class="'. $categoriesValue->style .' rounded cp-1">'.  $categoriesValue->category_name .'</span> - '.$categoriesValue->description ;
                echo '</li>';
              }
            echo '</ul>';
        }

        if (count($categoriesAge)>0) {
            echo '<h6> Возрастные категории участников:</h6>';
            echo '<ul>';
              foreach ($categoriesAge as &$categoriesValue) {
                echo '<li class="list-style-type-none">';
                echo '  <span class="'. $categoriesValue->style .' rounded cp-1">'.  $categoriesValue->category_name .'</span> - '.$categoriesValue->description ;
                echo '</li>';
              }
            echo '</ul>';
        }

        if (count($timeLine)>0 && $eventValue->event_status_id <> 3) {
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

        if (count($costRules)>0 && $eventValue->event_status_id <> 3) {
            echo '<h6> Стоимость участия:</h6>';
            echo '<ul>';
              foreach ($costRules as &$costRulesValue) {
                echo '<li class="list-style-type-none">';
                echo    $costRulesValue->rule_cost .' рублей. '. $costRulesValue->rule_description ;
                echo '</li>';
              }
            echo '</ul>';
        }

        if (count($videoLinks)>0) {
            foreach ($videoLinks as &$videoLinksValue) {
                echo $videoLinksValue->link;
            }
        }

        /*if (count($photoLinks)>0) {
            foreach ($photoLinks as &$photoLinksValue) {
                  echo '<a data-fancybox="gallery" href="'.$photoLinksValue->link.'"><img src="'.$photoLinksValue->link_second.'" width="370" height="246"></a>';
            }
        }*/

        /*Добавляем таб для результатов по категориям и возрастам*/
        echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';

                if (count($riderResultCat)>0 && count($riderResultAge)>0) {
                  echo '<li class="nav-item">';
                  echo '    <a class="nav-link active" id="Category-tab" data-toggle="tab" href="#Category" role="tab" aria-controls="Category" aria-selected="true">По категориям</a>';
                  echo '</li>';
                  echo '<li class="nav-item">';
                  echo '    <a class="nav-link" id="Age-tab" data-toggle="tab" href="#Age" role="tab" aria-controls="Age" aria-selected="false">По возрастам</a>';
                  echo '</li>';
                } elseif (count($riderResultCat)>0){
                  echo '<li class="nav-item">';
                  echo '    <a class="nav-link active" id="Category-tab" data-toggle="tab" href="#Category" role="tab" aria-controls="Category" aria-selected="true">По категориям</a>';
                  echo '</li>';
                } else if (count($riderResultAge)>0) {
                  echo '<li class="nav-item">';
                  echo '    <a class="nav-link active" id="Age-tab" data-toggle="tab" href="#Age" role="tab" aria-controls="Age" aria-selected="true">По возрастам</a>';
                  echo '</li>';
                }

        echo '</ul>';
        echo '<div class="tab-content" id="myTabContent">';
            /*Вывод результата по Категориям*/
            if (count($riderResultCat)>0) {
                echo '<div class="tab-pane fade show active" id="Category" role="tabpanel" aria-labelledby="Category-tab">';
            		    echo '<div class="btn-group p-1 d-inline-block ">';

                        foreach ($categoriesCat as &$categoriesValue) {
                    			 echo '<button type="button" class="btn btn-'. $categoriesValue->style .'   btn-filter m-1" data-target="'. $categoriesValue->category_short_name .'"   >'. $categoriesValue->category_name .'</button>';
                        }
                        echo '<button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>';
            		    echo '</div>';

                		echo '<div class="table-container">';
                		echo '	<table class="table table-striped table-bordered action-table" style="width:100%">';
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
                    foreach ($riderResultCat as &$riderResultValue) {
                				echo '        <tr data-status="'.$riderResultValue->category_short_name.'">';
                				echo '            <td>';
                        echo '                <span data-toggle="tooltip" data-placement="top" title="Позиция в абсолюте" class="badge badge-default d-inline m-0">' . $riderResultValue->result_absolute_place . '</span>';
                        echo '                <span data-toggle="tooltip" data-placement="top" title="Позиция в категории" class="ml-0 badge badge-' . $riderResultValue->style . ' d-inline">' . $riderResultValue->result_category_place . '</span>';
                        echo '            </td>';
                        echo '            <td class="position-relative"> <span data-toggle="tooltip" data-placement="top" title="Категория" class="badge badge-' . $riderResultValue->style . ' d-inline">' . $riderResultValue->category_short_name . '</span> <a href="'. home_url() .'/rider?rider_id='. $riderResultValue->rider_id .'">'. $riderResultValue->rider_name .'</a></td>';
                        /*echo '   <td>'.$riderResultValue->team_name.' </td>';*/
                        $third_seconds = strtotime("1970-01-01 ".$thirdRider[0]->result_time." UTC");
                        $rider_seconds = strtotime("1970-01-01 ".$riderResultValue->result_time. "UTC");
                        if ($riderResultValue->lap_is_equal) {
                            echo '            <td>'.$riderResultValue->result_time.' '.get_rider_span_lag_percent($third_seconds,$thirdRider[0]->result_laps,$rider_seconds,$riderResultValue->result_laps,$riderResultValue->rule_min,$riderResultValue->rule_max) .'</td>';
                        } else {
                            echo '            <td>'.$riderResultValue->result_time.'</td>';
                        }
                        echo '            <td>'.$riderResultValue->result_laps.' </td>';
                        echo '            <td><span data-toggle="tooltip" data-placement="top" title="Очки в категории">'.$riderResultValue->result_points.'</span></td>';
                				echo '        </tr>';
                    }
                		echo '		</tbody>';
                		echo '	</table>';
                		echo '</div>';
                echo '</div>';
            }
            /*Вывод результата по Возрастам*/
            if (count($riderResultAge)>0) {
                echo '<div class="tab-pane fade" id="Age" role="tabpanel" aria-labelledby="Age-tab">';
                    echo '<div class="btn-group p-1 d-inline-block ">';

                        foreach ($categoriesAge as &$categoriesValue) {
                           echo '<button type="button" class="btn btn-'. $categoriesValue->style .'   btn-filter m-1" data-target="'. $categoriesValue->category_short_name .'"   >'. $categoriesValue->category_name .'</button>';
                        }
                        echo '<button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>';
                    echo '</div>';

                    echo '<div class="table-container">';
                    echo '	<table class="table table-striped table-bordered action-table" style="width:100%">';
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
                    foreach ($riderResultAge as &$riderResultValue) {
                        echo '        <tr data-status="'.$riderResultValue->category_short_name.'">';
                        echo '            <td>';
                        echo '                <span data-toggle="tooltip" data-placement="top" title="Позиция в абсолюте" class="badge badge-default d-inline m-0">' . $riderResultValue->result_absolute_place . '</span>';
                        echo '                <span data-toggle="tooltip" data-placement="top" title="Позиция в категории" class="ml-0 badge badge-' . $riderResultValue->style . ' d-inline">' . $riderResultValue->result_category_place . '</span>';
                        echo '            </td>';
                        echo '            <td class="position-relative"> <span data-toggle="tooltip" data-placement="top" title="Категория" class="badge badge-' . $riderResultValue->style . ' d-inline">' . $riderResultValue->category_short_name . '</span> <a href="'. home_url() .'/rider?rider_id='. $riderResultValue->rider_id .'">'. $riderResultValue->rider_name .'</a></td>';
                        /*echo '   <td>'.$riderResultValue->team_name.' </td>';*/
                        $third_seconds = strtotime("1970-01-01 ".$thirdRider[0]->result_time." UTC");
                        $rider_seconds = strtotime("1970-01-01 ".$riderResultValue->result_time. "UTC");
                        if ($riderResultValue->lap_is_equal) {
                            echo '            <td>'.$riderResultValue->result_time.' '.get_rider_span_lag_percent($third_seconds,$thirdRider[0]->result_laps,$rider_seconds,$riderResultValue->result_laps,$riderResultValue->rule_min,$riderResultValue->rule_max) .'</td>';
                        } else {
                            echo '            <td>'.$riderResultValue->result_time.'</td>';
                        }
                        echo '            <td>'.$riderResultValue->result_laps.' </td>';
                        echo '            <td><span data-toggle="tooltip" data-placement="top" title="Очки в категории">'.$riderResultValue->result_points.' </span></td>';
                        echo '        </tr>';
                    }
                    echo '		</tbody>';
                    echo '	</table>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';


        if (strlen($eventValue->event_place_map)>0) {
            echo '<h6> Место регистрации на гонку:</h6>';
            echo '<div style="display: block; width: 100%; height: 450px;">'. $eventValue->event_place_map. '</div>';
        }

        if (strlen($eventValue->event_segment_link)>0) {
            echo '<h6> Сегмент в Strava:*</h6>';
            echo $eventValue->event_segment_link;
            echo '<p><i>*Примечание: трек трассы может быть изменен организатором в день гонки</i></p>';
        }

    ?>

  </div>
<?php
get_footer();
