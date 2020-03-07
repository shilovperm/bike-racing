<?php
/*
* Template Name: YearCalendar
*/

get_header(); ?>
    <?php
      $years = get_years_of_events();
      $month_name = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь','Октябрь','Ноябрь','Декабрь');
    ?>

    <div class="container">
      <h2 class="text-center">Календарь событий</h2>
      <!--  <div class="block-label">next-events</div> bg-secondary bg-success bg-info-->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php foreach ($years as &$value) { ?>
          <li class="nav-item">
            <a class="nav-link <?php if ($value->year == $years[0]->year) { echo 'active show';} ?>" id="<?php echo $value->year?>-tab" data-toggle="tab" href="#YEAR<?php echo $value->year?>" role="tab" aria-controls="<?php echo $value->year?>" aria-selected="true"><?php echo $value->year?></a>
          </li>
        <?php } ?>
      </ul>
      <div class="tab-content" id="myTabContent">
        <?php foreach ($years as &$value) {
          $months = get_months_of_events_by_year($value->year);
        ?>
          <div class="calendar-events tab-pane fade <?php if ($value->year == $years[0]->year) { echo 'active show';} ?>" id="YEAR<?php echo $value->year?>" role="tabpanel" aria-labelledby="<?php echo $value->year?>-tab">
            <div class = "calendar-events">
            <?php foreach ($months as &$month_value) { ?>
                <div class="card card-cascade card-month position-relative blue-grey-text">
                  <p class="mb-0 text-center"><b><?php echo $month_name[$month_value->month_num-1] ?></b></p>
                  <?php $events = get_events_by_year_month($value->year, $month_value->month_num);
                    foreach ($events as &$event_value) { ?>
                    <a href="event/?event_id=<?php  echo $event_value->event_id ?>" class="card card-calendar text-white
                    <?php if ($event_value->status_id == 1) {echo 'bg-primary';}
                          elseif ($event_value->status_id == 2) {echo 'bg-success';}
                          elseif ($event_value->status_id == 3) {echo 'bg-secondary';}
                          elseif ($event_value->status_id == 4) {echo 'bg-muted';}
                          elseif ($event_value->status_id == 5) {echo 'bg-danger';}
                    ?>
                    m-1 ml-3 mr-3" style="max-width: 18rem;">
                      <div class="card-header p-0 d-block justify-content-center">
                        <p class="mb-0 text-center"><?php echo $event_value->event_title?></p>
                        <p class="mb-0 text-center"><?php echo $event_value->event_subtitle?></p>
                      </div>
                      <div class="card-body p-0">
                        <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                          <p class="card-text m-0"><?php echo russian_date($event_value->event_date) ?></p>
                          <p class="card-text m-0"><?php echo $event_value->race_type_short_name ?></p>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
                </div>
            <?php } ?>
            </div>
          </div>
        <?php } ?>

      </div>


  </div>
<?php
get_footer();
