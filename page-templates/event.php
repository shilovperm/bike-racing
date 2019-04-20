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
    $sponsors = get_sponsors_by_event_id($par_event_id);
    ?>
    <?php foreach ($event as &$eventValue)  { ?>
      <h3><?php echo $eventValue->event_title ?></h3>
      <h4><?php echo $eventValue->event_subtitle ?></h4>
      <?php if ($eventValue->org_logo == NULL) { ?>
          <h5> Организатор: <?php echo $eventValue->org_name?></h5>
      <?php } else { ?>
          <h5> Организатор: <?php echo $eventValue->org_name ?><img data-toggle="tooltip" data-placement="top" title="Организатор" class="img-logo <?php echo $eventValue->org_style ?> ml-1" src="data:image/png;base64, <?php echo base64_encode($eventValue->org_logo)?>" alt="wr"></h5>
      <?php } ?>
      <h5> Дата: <?php echo date("d.m.Y", strtotime( $eventValue->event_date)) ?></h5>

      <?php if (count($sponsors)>0) { ?>
          <h5> Спонсоры:
          <?php foreach ($sponsors as &$sponsor) { ?>
              <a  href="<?php echo $sponsor->sponsor_link?>" target="_blank"><img data-toggle="tooltip" data-placement="top" title="Спонсор" class=" ml-1 <?php echo $sponsor->sponsor_style?> img-logo" src="data:image/png;base64,<?php echo base64_encode($sponsor->image)?>" alt="<?php echo $sponsor->description?>"></a>
          <?php } ?>
          </h5>
      <?php } ?>
      <h6> Тип соревнования: <?php echo $eventValue->race_type_name ?> (<?php echo $eventValue->race_type_short_name?>)</h6>
      <?php if ($eventValue->event_status_id == 2) {?>
          <a  href="<?php echo $eventValue->event_registration_link?>" target="_blank" class="btn btn-success m-1">Зарегистрироваться</a>
          <a  href="<?php echo $eventValue->event_participants_link?>" target="_blank" class="btn btn-info m-1"> Зарегистрированные участники </a>
          <a  href="<?php echo $eventValue->event_regulation_link?>" class="btn btn-info m-1"> Положение гонки </a>
          <h6> Оплата участия:</h6>
          <ul>
              <li class="list-style-type-none">Получатель: <b>Чертков Дмитрий Сергеевич</b></li>
              <li class="list-style-type-none">Карта Сбербанка: <b>4276 4900 2134 0734</b></li>
              <li class="list-style-type-none">Сообщение: <b>Кубок весны</b></li>
          </ul>
      <?php } elseif ($eventValue->event_regulation_link != null && $eventValue->event_status_id <> 3) {?>
          <a  href="<?php echo $eventValue->event_regulation_link?>" class="btn btn-info m-1"> Положение гонки </a>
          <?php } ?>
      <?php } ?>



      <?php if (count($categoriesCat)>0) { ?>
          <h6> Категории участников:</h6>
              <ul>
              <?php foreach ($categoriesCat as &$categoriesValue) { ?>
                  <li class="list-style-type-none">
                      <span class="'. $categoriesValue->style .' rounded cp-1">'<?php echo $categoriesValue->category_name?></span> - <?php echo $categoriesValue->description?>
                  </li>
              <?php } ?>
              </ul>
      <?php } ?>

      <?php if (count($categoriesAge)>0) { ?>
          <h6> Возрастные категории участников:</h6>
          <ul>
          <?php foreach ($categoriesAge as &$categoriesValue) { ?>
              <li class="list-style-type-none">
                  <span class="'. $categoriesValue->style .' rounded cp-1"><?php echo $categoriesValue->category_name ?></span> - <?php echo $categoriesValue->description?>
              </li>
          <?php } ?>
          </ul>
      <?php } ?>

      <?php if (count($timeLine)>0 && $eventValue->event_status_id <> 3) { ?>
          <h6> Расписание мероприятия:</h6>
          <ul>
              <?php foreach ($timeLine as &$timeLineValue) { ?>
                  <li class="list-style-type-none">
                      <?php echo date("H:i", strtotime($timeLineValue->time_start)).' '?>
                      <?php if (date("H:i", strtotime($timeLineValue->time_end))=='00:00') {
                        echo $timeLineValue->description;
                      } else {
                        echo date("H:i", strtotime($timeLineValue->time_end)).' '. $timeLineValue->description;
                      } ?>

                  </li>
              <?php } ?>
          </ul>
      <?php } ?>

      <?php if (count($costRules)>0 && $eventValue->event_status_id <> 3) { ?>
          <h6> Стоимость участия:</h6>
              <ul>
              <?php foreach ($costRules as &$costRulesValue) { ?>
                  <li class="list-style-type-none">
                    <?php echo  $costRulesValue->rule_cost .' рублей. '. $costRulesValue->rule_description ?>
                  </li>
              <?php } ?>
              </ul>
      <?php } ?>

      <?php if (count($videoLinks)>0) {
          foreach ($videoLinks as &$videoLinksValue) {
              echo $videoLinksValue->link;
          }
      } ?>

      <!--Добавляем таб для результатов по категориям и возрастам-->

      <ul class="nav nav-tabs" id="myTab" role="tablist">
          <?php if (count($riderResultCat)>0 && count($riderResultAge)>0) { ?>
              <li class="nav-item">
                  <a class="nav-link active" id="Category-tab" data-toggle="tab" href="#Category" role="tab" aria-controls="Category" aria-selected="true">По категориям</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="Age-tab" data-toggle="tab" href="#Age" role="tab" aria-controls="Age" aria-selected="false">По возрастам</a>
              </li>
              <?php } elseif (count($riderResultCat)>0){ ?>
                  <li class="nav-item">
                      <a class="nav-link active" id="Category-tab" data-toggle="tab" href="#Category" role="tab" aria-controls="Category" aria-selected="true">По категориям</a>
                  </li>
              <?php } else if (count($riderResultAge)>0) { ?>
                  <li class="nav-item">
                      <a class="nav-link active" id="Age-tab" data-toggle="tab" href="#Age" role="tab" aria-controls="Age" aria-selected="true">По возрастам</a>
                  </li>
              <?php } ?>
      </ul>

      <div class="tab-content" id="myTabContent">
      <!--Вывод результата по Категориям-->
          <?php if (count($riderResultCat)>0) { ?>
              <div class="tab-pane fade show active" id="Category" role="tabpanel" aria-labelledby="Category-tab">
          		    <div class="btn-group p-1 d-inline-block ">
                      <?php foreach ($categoriesCat as &$categoriesValue) { ?>
                  	       <button type="button" class="btn btn-<?php echo $categoriesValue->style ?> btn-filter m-1" data-target="<?php echo $categoriesValue->category_short_name ?>"><?php echo $categoriesValue->category_name ?></button>
                      <?php } ?>
                      <button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>
          		    </div>

              		<div class="table-container">
              		    <table class="table table-striped table-bordered action-table" style="width:100%">
                          <thead>
                              <tr>
                                  <th>№</th>
                                  <th>Имя</th>
                                  <th>Время</th>
                                  <th>Круги</th>
                                  <th>Очки</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($riderResultCat as &$riderResultValue) { ?>
            				              <tr data-status="<?php echo $riderResultValue->category_short_name ?>">
            				                  <td>
                                          <span data-toggle="tooltip" data-placement="top" title="Позиция в абсолюте" class="badge badge-default d-inline m-0"><?php echo $riderResultValue->result_absolute_place ?></span>
                                          <span data-toggle="tooltip" data-placement="top" title="Позиция в категории" class="ml-0 badge badge-<?php echo $riderResultValue->style ?> d-inline"><?php echo  $riderResultValue->result_category_place ?></span>
                                      </td>
                                      <td class="position-relative">
                                          <span data-toggle="tooltip" data-placement="top" title="Категория" class="badge badge-<?php echo $riderResultValue->style ?> d-inline"><?php echo $riderResultValue->category_short_name ?></span>
                                          <a href="<?php echo home_url()?>/rider?rider_id=<?php echo $riderResultValue->rider_id ?>"><?php echo $riderResultValue->rider_name ?></a>
                                      </td>

                                      <?php $third_seconds = strtotime("1970-01-01 ".$thirdRider[0]->result_time." UTC");
                                      $rider_seconds = strtotime("1970-01-01 ".$riderResultValue->result_time. "UTC");
                                      if ($riderResultValue->lap_is_equal) { ?>
                                          <td><?php echo $riderResultValue->result_time.' '.get_rider_span_lag_percent($third_seconds,$thirdRider[0]->result_laps,$rider_seconds,$riderResultValue->result_laps,$riderResultValue->rule_min,$riderResultValue->rule_max) ?></td>
                                        <?php } else { ?>
                                          <td><?php echo $riderResultValue->result_time ?></td>
                                      <?php } ?>
                                      <td><?php echo $riderResultValue->result_laps ?> </td>
                                      <td><span data-toggle="tooltip" data-placement="top" title="Очки в категории"><?php echo $riderResultValue->result_points ?></span></td>
                                  </tr>
                              <?php } ?>
                          </tbody>
          		        </table>
              		</div>
              </div>
          <?php } ?>
          <!--Вывод результата по Возрастам -->
          <?php if (count($riderResultAge)>0) { ?>
              <div class="tab-pane fade" id="Age" role="tabpanel" aria-labelledby="Age-tab">
                  <div class="btn-group p-1 d-inline-block ">
                      <?php foreach ($categoriesAge as &$categoriesValue) {?>
                          <button type="button" class="btn btn-<?php echo $categoriesValue->style?> btn-filter m-1" data-target="<?php echo $categoriesValue->category_short_name ?>" ><?php echo $categoriesValue->category_name?></button>
                      <?php } ?>
                      <button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>
                  </div>

                  <div class="table-container">
                      <table class="table table-striped table-bordered action-table" style="width:100%">
                          <thead>
                              <tr>
                                  <th>№</th>
                                  <th>Имя</th>
                                  <th>Время</th>
                                  <th>Круги</th>
                                  <th>Очки</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($riderResultAge as &$riderResultValue) { ?>
                              <tr data-status="<?php echo $riderResultValue->category_short_name ?>">
                                  <td>
                                      <span data-toggle="tooltip" data-placement="top" title="Позиция в абсолюте" class="badge badge-default d-inline m-0"><?php echo $riderResultValue->result_absolute_place ?></span>
                                      <span data-toggle="tooltip" data-placement="top" title="Позиция в категории" class="ml-0 badge badge-<?php echo $riderResultValue->style ?> d-inline"><?php echo $riderResultValue->result_category_place ?></span>
                                  </td>
                                  <td class="position-relative">
                                      <span data-toggle="tooltip" data-placement="top" title="Категория" class="badge badge-<?php echo $riderResultValue->style ?> d-inline"><?php echo $riderResultValue->category_short_name ?></span>
                                      <a href="<?php echo home_url() ?>/rider?rider_id=<?php echo $riderResultValue->rider_id ?>"><?php echo $riderResultValue->rider_name ?></a>
                                  </td>
                                  <?php $third_seconds = strtotime("1970-01-01 ".$thirdRider[0]->result_time." UTC");
                                  $rider_seconds = strtotime("1970-01-01 ".$riderResultValue->result_time. "UTC");
                                  if ($riderResultValue->lap_is_equal) { ?>
                                      <td> <?php echo $riderResultValue->result_time.' '.get_rider_span_lag_percent($third_seconds,$thirdRider[0]->result_laps,$rider_seconds,$riderResultValue->result_laps,$riderResultValue->rule_min,$riderResultValue->rule_max)?></td>
                                  <?php } else { ?>
                                      <td> <?php echo $riderResultValue->result_time ?></td>
                                  <?php } ?>
                                  <td><?php echo $riderResultValue->result_laps?> </td>
                                  <td>
                                      <span data-toggle="tooltip" data-placement="top" title="Очки в категории"> <?php echo $riderResultValue->result_points?> </span>
                                  </td>
                              </tr>
                          <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          <?php } ?>
      </div>


      <?php if (strlen($eventValue->event_place_map)>0) { ?>
          <h6> Место регистрации на гонку:</h6>
          <div style="display: block; width: 100%; height: 450px;"><?php echo $eventValue->event_place_map ?></div>
      <?php } ?>

      <?php if (strlen($eventValue->event_segment_link)>0) { ?>
          <h6> Сегмент в Strava:*</h6>
          <?php echo $eventValue->event_segment_link?>
          <p><i>*Примечание: трек трассы может быть изменен организатором в день гонки</i></p>
      <?php } ?>



</div>
<?php
get_footer();
