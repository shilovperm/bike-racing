<?php
/*
* Template Name: Ratings
*/

get_header();


$ratings = get_ratings();

?>


<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Рейтинги</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <?php
                    foreach ($ratings as &$ratingsValue) {
                        echo '<a class="dropdown-item" href="?rating_id='.$ratingsValue->rating_id.'">'.$ratingsValue->rating_name.'('.$ratingsValue->rating_year.')</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php
    if (isset($_GET["rating_id"])) {
        $p_rating_id = $_GET["rating_id"];
    } else {
        $p_rating_id = 1;
    };

  $categories = get_categories_by_rating_id($p_rating_id);
  $rating     = get_rating_by_rating_id($p_rating_id);

  echo'<div class="container">';

  echo '<h3>'.$ratingsValue->rating_name.'('.$ratingsValue->rating_year.')</h3>';

  echo '<div class="btn-group p-1 d-inline-block ">';

      foreach ($categories as &$categoriesValue) {
         echo '<button type="button" class="btn btn-'. $categoriesValue->style .'   btn-filter m-1" data-target="'. $categoriesValue->category_short_name .'"   >'. $categoriesValue->category_name .'</button>';
      }
  echo '</div>';

  echo '<div class="table-container">';
  echo '	<table class="table table-striped table-bordered" style="width:100%">';
  echo '    <thead>';
  echo '        <tr>';
  echo '            <th>#</th>';
  echo '            <th>Категория/Имя</th>';
  echo '            <th>Этап №1</th>';
  echo '            <th>Этап №2</th>';
  echo '            <th>Этап №3</th>';
  echo '            <th>Этап №4</th>';
  echo '            <th>Этап №5</th>';
  echo '            <th>Итого</th>';
  echo '        </tr>';
  echo '    </thead>';
  echo '    <tbody>';
  foreach ($rating as &$ratingValue) {
      echo '        <tr data-status="'.$ratingValue->category_short_name.'">';
      echo '            <td>';
      echo '                <span class="ml-0 badge badge-' . $ratingValue->style . ' d-inline">' . $ratingValue->num  . '</span>';
      echo '            </td>';
      echo '            <td class="position-relative"> <span class="ml-0 badge badge-' . $ratingValue->style . ' d-inline">' . $ratingValue->category_short_name . '</span> <a href="'. home_url() .'/rider?rider_id='. $ratingValue->rider_id .'">'. $ratingValue->rider_name .'</a></td>';
      /*echo '   <td>'.$riderResultValue->team_name.' </td>';*/
      echo '            <td>'.$ratingValue->result1.' </td>';
      echo '            <td>'.$ratingValue->result2.' </td>';
      echo '            <td>'.$ratingValue->result3.' </td>';
      echo '            <td>'.$ratingValue->result4.' </td>';
      echo '            <td>'.$ratingValue->result5.' </td>';
      echo '            <td>'.$ratingValue->result_points.' </td>';
      echo '        </tr>';
  }
  echo '		</tbody>';
  echo '		<tfoot>';
  echo '		    <tr>';
  echo '		      <th>#</th>';
  echo '		      <th>Категория/Имя</th>';
  echo '		      <th>Этап №1</th>';
  echo '		      <th>Этап №2</th>';
  echo '		      <th>Этап №3</th>';
  echo '		      <th>Этап №4</th>';
  echo '		      <th>Этап №5</th>';
  echo '		      <th>Итого</th>';
  echo '		    </tr>';
  echo '		</tfoot>';
  echo '	</table>';
  echo '</div>';
  echo '</div>';
?>

<?php
get_footer();
