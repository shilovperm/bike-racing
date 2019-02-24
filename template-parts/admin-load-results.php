




<?php

// Пути загрузки файлов

$upload_dir = wp_upload_dir();
// Массив допустимых значений типа файла
$types = array('text/csv','application/vnd.ms-excel');
// Максимальный размер файла
$size = 1024000;

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // Проверяем тип файла
  if (!in_array($_FILES['CSV']['type'], $types)) {
    die('Запрещённый тип файла' . $_FILES['CSV']['type'] .' .<a href="?">Попробовать другой файл?</a>');
  }
 // Проверяем размер файла
  if ($_FILES['CSV']['size'] > $size) {
    die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
  }


 // Загрузка файла и вывод сообщения
 $datafile= $_FILES['CSV']['tmp_name'];
 $file=$upload_dir['path'] .'/'.$_FILES['CSV']['name'];
 $fileurl=  $upload_dir['url'] .'/'.$_FILES['CSV']['name'];

 if (!move_uploaded_file($_FILES['CSV']['tmp_name'],$file)){
     echo 'Что-то пошло не так. $datafile: ' . $datafile . ' $file: ' . $file . ' $fileurl ' . $fileurl . ' $upload_dir: ' . $upload_dir;
   }
     else {
     echo 'Загрузка удачна <a href="' . $fileurl . '">Посмотреть</a> <br> <p>';
     /*$datafile: ' . $datafile . ' $file: ' . $file . ' $fileurl ' . $fileurl . ' $upload_dir: ' . $upload_dir['path'] . '</p>';*/
   }
/*
 if (!@copy($_FILES['CSV']['tmp_name'], $tmp_path . $_FILES['CSV']['name']))
 echo 'Что-то пошло не так';
 else
 echo 'Загрузка удачна <a href="' . $tmp_path . $_FILES['CSV']['name'] . '">Посмотреть</a> ' ;*/
}

?>

  <h5>Загрузка протокола</h5>
  <form  class="form-group" method="post" enctype="multipart/form-data">
    <input type="file" name="CSV">
    <input type="submit" value="Загрузить">
  </form>





<?php
/*
 //Upload CSV File
 if (isset($_POST['submit'])) {

 global $wordpress,$wpdb;
     $datafile= $_FILES['file']['tmp_name'];
     $file=$upload_dir['basedir'].'/'.$_FILES['file']['name'];
     $fileurl=$upload_dir['baseurl'].'/'.$_FILES['file']['name'];
     echo $upload_dir['baseurl'] . ' ' . $_FILES['file']['name'];
     if (!move_uploaded_file($_FILES['file']['tmp_name'],$file)){
         print_r('Failed to move uploaded file.');
       }
     $sql="
      LOAD DATA INFILE "$_FILES['upload_csv']['tmp_name']"
     INTO TABLE wp_sonali_data
     FIELDS TERMINATED BY ',' ENCLOSED BY '"'
     LINES TERMINATED BY '\n'
     IGNORE 1 ROWS
     ("id", "brname", "brcode", "dist")
     ";
     $query = $wpdb->query($sql);
}*/

 ?>
