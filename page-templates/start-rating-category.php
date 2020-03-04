<?php
/*
* Template Name: start-rating-category
*/

  get_header();
  /*Идентификатор стартового рейтинга*/
  if (isset($_GET["rating_id"])) {
      $p_rating_id = $_GET["rating_id"];
  } else {
      $p_rating_id = 4;
  };
  /*Тип категорий стартового рейтинга*/
  if (isset($_GET["category_type"])) {
      $p_category_type = $_GET["category_type"];
  } else {
      $p_category_type = 'Absolute';
  };
  // обращение к БД
  $categories   = get_categories_by_rating_id($p_rating_id);
  $rating       = get_start_rating_by_category_type(4,'Absolute');
  $ratingInfo   = get_rating_info_by_rating_id($p_rating_id);
  $ratingEvents = get_rating_event_consist_by_rating_id($p_rating_id);

?>
<div class="container">
    <h3>Рейтинг <?php echo $ratingInfo[0]->rating_name ?> (<?php echo $ratingInfo[0]->rating_year ?>)</h3>
    <div class="table-container">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Событие</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ratingEvents as &$ratingEventsValue) { ?>
                <tr>
                    <td> <?php echo $ratingEventsValue->event_number ?></td>
                    <td> <a href=<?php echo '"'.home_url() .'/event/?event_id='.$ratingEventsValue->event_id.'">'.$ratingEventsValue->event_title .'('. $ratingEventsValue->event_subtitle ?>)</a></td>
                    <td> <?php echo date("d.m.Y", strtotime($ratingEventsValue->event_date)) ?> </td>
                </tr>
                <?php } ?>
	          </tbody>
        </table>
    </div>


    <div class="btn-group p-1 d-inline-block ">
        <?php foreach ($categories as &$categoriesValue) {?>
            <button type="button" class="btn btn-<?php echo $categoriesValue->style?> btn-filter m-1" data-target="<?php echo $categoriesValue->category_short_name?>"> <?php echo $categoriesValue->category_name ?></button>
        <?php } ?>
        <button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>
    </div>

    <div class="table-container">
        <table class="table table-striped table-bordered action-table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Категория/Имя</th>
                    <th>Очки</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rating as &$ratingValue) {?>
                    <tr data-status="<?php echo $ratingValue->category_short_name?>">
                        <td>
                            <span data-toggle="tooltip" data-placement="top" title="Позиция в категории" class="ml-0 badge badge-<?php echo $ratingValue->style?> d-inline"><?php echo $ratingValue->num?></span>
                            <?php if ($ratingValue->delta_position>9){?>
                                <span data-toggle="tooltip" data-placement="top" title="Изменение позиции в категории" class="ml-0 badge d-inline" style="background: url(<?php echo get_template_directory_uri()?>/svg/si-glyph-triangle-up.svg); background-repeat: no-repeat; background-size: 32px 32px; background-position: 1px -4px; color:white;">&nbsp&nbsp<?php echo $ratingValue->delta_position?>&nbsp&nbsp&nbsp</span>
                            <?php } elseif ($ratingValue->delta_position>0) {?>
                                <span data-toggle="tooltip" data-placement="top" title="Изменение позиции в категории" class="ml-0 badge d-inline" style="background: url(<?php echo get_template_directory_uri()?>/svg/si-glyph-triangle-up.svg); background-repeat: no-repeat; background-size: 32px 32px; background-position: 1px -4px; color:white;">&nbsp&nbsp&nbsp<?php echo $ratingValue->delta_position?>&nbsp&nbsp&nbsp</span>
                            <?php } elseif ($ratingValue->delta_position<0) {?>
                                <span data-toggle="tooltip" data-placement="top" title="Изменение позиции в категории" class="ml-0 badge d-inline" style="background: url(<?php echo get_template_directory_uri()?>/svg/si-glyph-triangle-down.svg); background-repeat: no-repeat; background-size: 32px 32px; background-position: 1px -4px; color:white;">&nbsp&nbsp&nbsp<?php echo abs($ratingValue->delta_position)?>&nbsp&nbsp&nbsp</span>
                            <?php }?>
                        </td>
                        <td class="position-relative">
                          <span data-toggle="tooltip" data-placement="top" title="Категория" class="ml-0 badge badge-<?php echo $ratingValue->style ?> d-inline"><?php echo $ratingValue->category_short_name ?> </span>
                          <a href="<?php echo home_url() ?>/rider?rider_id=<?php echo $ratingValue->rider_id?>"> <?php echo $ratingValue->rider_name?></a>
                        </td>
                        <td>
                            <?php echo $ratingValue->result_points?>
                            <?php if ($ratingValue->delta_points>0){?>
                                <span data-toggle="tooltip" data-placement="top" title="Изменение очков в категории" class="ml-0 badge badge-success d-inline"><?php echo  $ratingValue->delta_points ?></span>
                              <?php }?>
                        </td>
                    </tr>
                  <?php }?>
            </tbody>
            <tfoot>
  		          <tr>
  		              <th>#</th>
  		              <th>Категория/Имя</th>
  		              <th>Очки</th>
  	            </tr>
  		       </tfoot>
  	     </table>
       </div>
  </div>


<?php
get_footer();
