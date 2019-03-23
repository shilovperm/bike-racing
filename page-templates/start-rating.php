<?php
/*
* Template Name: start-rating
*/

get_header();


$ratings = get_ratings();

  /*Идентификатор стартового рейтинга*/
  $p_rating_id = 3;


  $categories   = get_categories_by_rating_id($p_rating_id);
  $rating       = get_start_rating();
  $ratingInfo   = get_rating_info_by_rating_id($p_rating_id);
  $ratingEvents = get_rating_event_consist_by_rating_id($p_rating_id);


  echo'<div class="container">';
  echo '<h3>Рейтинг '.$ratingInfo[0]->rating_name.'('.$ratingInfo[0]->rating_year.')</h3>';

  echo '<div class="table-container">';
  echo '	<table class="table table-striped table-bordered" style="width:100%">';
  echo '    <thead>';
  echo '        <tr>';
  echo '            <th>#</th>';
  echo '            <th>Событие</th>';
  echo '            <th>Дата</th>';
  echo '        </tr>';
  echo '    </thead>';
  echo '    <tbody>';
  foreach ($ratingEvents as &$ratingEventsValue) {
      echo '        <tr>';
      echo '           <td>'.$ratingEventsValue->event_number.' </td>';
      echo '           <td> <a href="'. home_url() .'/event/?event_id='.$ratingEventsValue->event_id.'">'.$ratingEventsValue->event_title.' ('.$ratingEventsValue->event_subtitle.') </a> </td>';
      echo '           <td>'.date("d.m.Y", strtotime($ratingEventsValue->event_date)) .' </td>';
      echo '        </tr>';
  }
  echo '		</tbody>';
  echo '	</table>';
  echo '</div>';


  echo '<div class="btn-group p-1 d-inline-block ">';
  foreach ($categories as &$categoriesValue) {
         echo '<button type="button" class="btn btn-'. $categoriesValue->style .'   btn-filter m-1" data-target="'. $categoriesValue->category_short_name .'"   >'. $categoriesValue->category_name .'</button>';
      }
      echo '<button type="button" class="btn btn-default  btn-filter m-1" data-target="all" >Все категории</button>';
  echo '</div>';

  echo '<div class="table-container">';
  echo '	<table class="table table-striped table-bordered action-table" style="width:100%">';
  echo '    <thead>';
  echo '        <tr>';
  echo '            <th>#</th>';
  echo '            <th>Категория/Имя</th>';
  echo '            <th>Очки</th>';
  echo '        </tr>';
  echo '    </thead>';
  echo '    <tbody>';
  foreach ($rating as &$ratingValue) {
      echo '        <tr data-status="'.$ratingValue->category_short_name.'">';
      echo '            <td>';
      echo '                <span data-toggle="tooltip" data-placement="top" title="Позиция в категории" class="ml-0 badge badge-' . $ratingValue->style . ' d-inline">' . $ratingValue->num  . '</span>';
      echo '            </td>';
      echo '            <td class="position-relative"> <span data-toggle="tooltip" data-placement="top" title="Категория" class="ml-0 badge badge-' . $ratingValue->style . ' d-inline">' . $ratingValue->category_short_name . '</span> <a href="'. home_url() .'/rider?rider_id='. $ratingValue->rider_id .'">'. $ratingValue->rider_name .'</a></td>';
      echo '            <td>'.$ratingValue->result_points.' </td>';
      echo '        </tr>';
  }
  echo '		</tbody>';
  echo '		<tfoot>';
  echo '		    <tr>';
  echo '		      <th>#</th>';
  echo '		      <th>Категория/Имя</th>';
  echo '		      <th>Очки</th>';
  echo '		    </tr>';
  echo '		</tfoot>';
  echo '	</table>';
  echo '  </div>';

  echo '</div>';
?>

<?php
get_footer();
