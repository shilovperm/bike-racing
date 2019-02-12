<?php
/*
* Template Name: Ratings
*/

get_header(); ?>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Рейтинги</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Кубок Велта-спорт
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?category=A">Категория A</a>
                        <a class="dropdown-item" href="?category=B">Категория B</a>
                        <a class="dropdown-item" href="?category=C">Категория C</a>
                        <a class="dropdown-item" href="?category=D">Категория D</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php
    if (isset($_GET["category"])) {
        $p_category = $_GET["category"];
    } else {
        $p_category = 'A';
    };
?>


<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Категория/Имя</th>
                <th>Этап №1</th>
                <th>Этап №2</th>
                <th>Этап №3</th>
                <th>Этап №4</th>
                <th>Этап №5</th>
                <th>Итого</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $riders = get_rating_list_by_category($p_category);
            foreach ($riders as &$value) {
              echo '<tr>';
              echo '  <td>', $value->Num ,'</td>';
              echo '  <td> <span class="badge badge-', $value->Style,' d-inline">',$value->Category_Short_Name,'</span> <a href="'. home_url() .'/rider?rider_id='. $value->rider_id .'">'. $value->rider_name .'</a></td>';
              echo '  <td>', $value->result1,'</td>';
              echo '  <td>', $value->result2,'</td>';
              echo '  <td>', $value->result3,'</td>';
              echo '  <td>', $value->result4,'</td>';
              echo '  <td>', $value->result5,'</td>';
              echo '  <td>', $value->result_points ,'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Категория/Имя</th>
                <th>Этап №1</th>
                <th>Этап №2</th>
                <th>Этап №3</th>
                <th>Этап №4</th>
                <th>Этап №5</th>
                <th>Итого</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php
get_footer();
