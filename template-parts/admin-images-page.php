<?php
  if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist";
  switch ( $_GET["action"] )
  {
    case "showlist":    // Список всех записей в таблице БД
      show_list(); break;
    case "addform":     // Форма для добавления новой записи
      get_add_item_form(); break;
    case "add":         // Добавить новую запись в таблицу БД
      add_item(); break;
    case "editform":    // Форма для редактирования записи
      get_edit_item_form(); break;
    case "update":      // Обновить запись в таблице БД
      update_item(); break;
    case "delete":      // Удалить запись в таблице БД
      delete_item(); break;
    default:
      show_list();
  }

  function show_list() {
        $images = get_all_images_info();
  ?>

        <div class="container">
          <h3>Все изображения</h3>
          <div class="table-container">
              <table class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <p class="text-right"><a href=" <?php echo home_url()?>/admin-images?action=addform" class="btn btn-primary"><b>+</b> Добавить изображение</a></p>
                      <tr>
                          <th>#</th>
                          <th>Описание изображения</th>
                          <th>Действия</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php foreach ($images as &$image) { ?>
                      <tr>
                          <td> <?php echo $image->image_id ?></td>
                          <td> <?php echo $image->description ?></td>
                          <td class="text-center"> <a class='btn btn-info' href=" <?php echo home_url()?>/admin-images?action=editform&image_id=<?php echo $image->image_id?>"> Редактировать </a></td>
                      </tr>
                      <?php } ?>

      	          </tbody>
              </table>
          </div>
        </div>
  <?php
  }

  function get_add_item_form() {
    ?>
    <div class="container">
          <form enctype="multipart/form-data" name="addform" action="<?php echo home_url()?>/admin-images?action=add" method="POST">
            <input class="form-control m-1" type="text" id="imageName" name="imageName" value="Имя картинки" required maxlength="50">
            <input class="m-1" type="file" id="imagefile" name="imagefile">
            <br>
            <input class="m-1" type="submit" name="submit" value="Загрузить">
          </form>
    </div>
    <?php
  }

  function  add_item() {
    if (isset($_POST["submit"])) {
        if (getimagesize($_FILES["imagefile"]["tmp_name"]) == false) {
            echo '<br />Please Select An Image.';
        } else {
            //Читаем содержимое файла
            $image=file_get_contents($_FILES["imagefile"]["tmp_name"]);
            //Читаем наименование файла
            $name = $_POST["imageName"];
            //подключение к БД
            global $wpdb_bike;
            //Формируем массив для вставки
            $data = ['image' => $image, 'description' => $name];
            //Вставка в таблицу методом от WP
            if ($wpdb_bike->insert('tl_images', $data) == false)
              echo 'Database Insertion failed';
            else
              {
              echo '<div class="alert alert-success mt-1" role="alert"> Параметры загруженного изображения  <br> name: '.$name.' <br> </div>';
              ?>
              <p class="text-left"><a href=" <?php echo home_url()?>/admin-images?action=showlist" class="btn btn-success">Список изображений</a></p>
              <?php }
        }
    }
  }
  function get_edit_item_form() {
    if (isset($_GET["image_id"])) {
      $image_id = $_GET["image_id"];
      $image    = get_image_info_by_image_id($image_id);
      foreach ($image as &$image_info) {
        ?>
        <div class="container">
              <form enctype="multipart/form-data" name="addform" action="<?php echo home_url()?>/admin-images?action=update&image_id=<?php echo $image_id; ?>" method="POST">
                <input class="form-control m-1" type="text" id="imageName" name="imageName" value="<?php echo $image_info->description ?>" required maxlength="50">
                <br>
                <input class="m-1" type="submit" name="submit" value="Сохранить">
                <button class="btn btn-cancel" type="button" onClick="history.back();">Отменить</button>
              </form>
        </div>
        <?php
      }
    }
  }

  function update_item() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_GET["image_id"])) {
          $image_id = $_GET["image_id"];
          $description = clear_input($_POST["imageName"]);
          if (!empty($description)) {
            $result = update_image(
                                $image_id,
                                $description);
            ?>
            <div class="alert alert-success mt-1" role="alert">
                  Параметры сохраненного изображения <br>
                  image_id: <?php echo $image_id; ?><br>
                  description: <?php echo $description; ?> <br>
            </div>
            <p class="text-left"><a href=" <?php echo home_url()?>/admin-images?action=showlist" class="btn btn-success">Список изображений</a></p>
            <?php
          }
        }
    }
  }

  function clear_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
