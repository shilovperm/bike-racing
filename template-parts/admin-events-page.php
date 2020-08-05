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




  // Функция выводит список всех записей в таблице БД
  function show_list()
  {
      $events = get_all_events();
?>

      <div class="container">
        <h3>Все события</h3>
        <div class="table-container">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <p class="text-right"><a href=" <?php echo home_url()?>/admin-events?action=addform" class="btn btn-primary"><b>+</b> Добавить событие</a></p>
                    <tr>
                        <th>#</th>
                        <th>Событие</th>
                        <th>Описание события</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Тип</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($events as &$event) { ?>
                    <tr>
                        <td> <?php echo $event->event_id ?></td>
                        <td> <?php echo $event->event_title ?></td>
                        <td> <?php echo $event->event_subtitle ?></td>
                        <td> <?php echo $event->event_date ?></td>
                        <td> <?php echo $event->status_name ?></td>
                        <td> <?php echo $event->race_type_short_name ?></td>
                        <td class="text-center"> <a class='btn btn-info' href=" <?php echo home_url()?>/admin-events?action=editform&event_id=<?php echo $event->event_id?>"> Редактировать </a></td>
                    </tr>
                    <?php } ?>

    	          </tbody>
            </table>
        </div>
      </div>
<?php }
  // Функция формирует форму для добавления записи в таблице БД
  function get_add_item_form()
  { ?>
    <div class="container">
      <div class="col-md-8 wp-bp-content-width">
        <?php
            $spr_event_status   = get_spr_event_status();
            $spr_organizations  = get_spr_organizations();
            $spr_race_types     = get_spr_race_types();
            $spr_category_types = get_spr_category_types();
            $spr_images         = get_spr_images();
            ?>

            <h1>Создание события</h1>
            <p><span class="error">* обязательные поля</span></p>
            <form name="addform" action="<?php echo home_url()?>/admin-events?action=add" method="POST">
              <div class="form-group">
                  <div class="form-row pl-1">
                      <div class="form-group mr-3">
                          <label for="eventStatus">Организатор события*: </label>
                          <select class="form-control" id="orgName" name="orgName" style="width:280px">
                              <?php foreach ($spr_organizations as &$organization) { ?>
                                <option value="<?php echo $organization->org_id; ?>"><?php echo $organization->org_name; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="form-group mr-3">
                          <label for="raceType">Тип гонки*: </label>
                          <select class="form-control" id="raceType" name="raceType" style="width:280px">
                              <?php foreach ($spr_race_types as &$race_type) { ?>
                                <option value="<?php echo $race_type->race_type_id; ?>"><?php echo $race_type->race_type_name; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="form-group mr-3">
                          <label for="raceType">Тип категорий*: </label>
                          <select class="form-control" id="categoryType" name="categoryType" style="width:280px">
                              <?php foreach ($spr_category_types as &$category_type) { ?>
                                <option value="<?php echo $category_type->type_id; ?>"><?php echo $category_type->type_description; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
                  <label for="eventName">Наименование события*:</label>
                  <input class="form-control" type="text" id="eventName" name="eventName" value="" required maxlength="50">
                  <span class="error"><?php echo $eventNameErr;?></span>

                  <label for="eventSubName">Наименование этапа*:</label>
                  <input class="form-control" type="text" id="eventSubName" name="eventSubName" value="" required maxlength="50">
                  <span class="error"><?php echo $eventSubNameErr;?></span>

                  <label for="eventSubName">Описание этапа:</label>
                  <input class="form-control" type="text" id="eventDescription" name="eventDescription" value="" maxlength="100">
                  <div class="form-row pl-1">
                      <div class="form-group mr-3">
                          <label for="eventDate">Дата события*:</label>
                          <input class="form-control" type="date" id="eventDate" name="eventDate" value="" required style="width:280px">
                          <span class="error"><?php echo $eventDateErr;?></span>
                      </div>
                      <div class="form-group mr-3">
                          <label for="eventStatus">Статус события*: </label>
                          <select class="form-control" id="eventStatus" name="eventStatus" style="width:280px">
                              <?php foreach ($spr_event_status as &$event_status) { ?>
                                <option value="<?php echo $event_status->status_id; ?>"><?php echo $event_status->status_name; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="form-group mr-3">
                          <label for="eventStatus">Картинка события*: </label>
                          <select class="form-control" id="eventImage" name="eventImage" style="width:280px">
                              <?php foreach ($spr_images as &$image) { ?>
                                <option value="<?php echo $image->image_id; ?>"><?php echo $image->description; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
              </div>

              <input type="submit" name="Создать" value="Создать">
              <button type="button" onClick="history.back();">Отменить</button>
            </form>
      </div>
    </div>
  <?php
  }
  // Функция добавляет новую запись в таблицу БД
  function add_item()
  {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $org_id = clear_input($_POST["orgName"]);

        $eventName = clear_input($_POST["eventName"]);

        if (empty($_POST["eventName"])) {
          $eventNameErr = "Поле Наименование события обязательно";
        }

        $eventSubName = clear_input($_POST["eventSubName"]);

        if (empty($_POST["eventSubName"])) {
          $eventNameErr = "Поле Наименование этапа обязательно";
        }

        $eventDate = $_POST["eventDate"];

        if (empty($_POST["eventDate"])) {
          $eventNameErr = "Поле Дата события обязательно";
        }
        $eventDescription = $_POST["eventDescription"];
        $eventStatus      = $_POST["eventStatus"];
        $raceType         = $_POST["raceType"];
        $eventImage       = $_POST["eventImage"];
        $categoryType     = $_POST["categoryType"];


        if (!empty($eventName)&&
            !empty($eventSubName)&&
            !empty($eventDate))
            {

                $result = add_event($org_id,
                                    $eventName,
                                    $eventSubName,
                                    $eventDate,
                                    $eventDescription,
                                    $eventStatus,
                                    $raceType ,
                                    $eventImage,
                                    $categoryType);
                echo '<div class="alert alert-success mt-1" role="alert"> Параметры созданного события  <br>
                                                                                    org_id:           '.$org_id.' <br>
                                                                                    eventName:        '.$eventName.' <br>
                                                                                    eventSubName:     '.$eventSubName.' <br>
                                                                                    eventDate:        '.$eventDate.' <br>
                                                                                    eventDescription: '.$eventDescription.' <br>
                                                                                    eventStatus:      '.$eventStatus.' <br>
                                                                                    raceType:         '.$raceType.' <br>
                                                                                    eventImage:       '.$eventImage.' <br>
                                                                                    categoryType:     '.$categoryType.' <br>
                                                                                      </div>';
                                                                                      ?>
                <p class="text-left"><a href=" <?php echo home_url()?>/admin-events?action=showlist" class="btn btn-success">Список событий</a></p>
                <?php
            }
    }
  }
  // Функция формирует форму для редактирования записи в таблице БД
  function get_edit_item_form()
  {
    if (isset($_GET["event_id"])) {
      $event_id = $_GET["event_id"];
      ?>
      <div class="container">
        <div class="col-md-8 wp-bp-content-width">
          <?php
              $event              = get_event_info_by_event_id($event_id);
              $spr_event_status   = get_spr_event_status();
              $spr_organizations  = get_spr_organizations();
              $spr_race_types     = get_spr_race_types();
              $spr_category_types = get_spr_category_types();
              $spr_images         = get_spr_images();

              foreach ($event as &$event_info) {
              ?>

                <h1>Редактирование события</h1>
                <p><span class="error">* обязательные поля</span></p>
                <form name="editform" action="<?php echo home_url()?>/admin-events?action=update&event_id=<?php echo $event_id; ?>" method="POST">
                  <div class="form-group">
                      <div class="form-row pl-1">
                          <div class="form-group mr-3">
                              <label for="eventStatus">Организатор события*: </label>
                              <select class="form-control" id="orgName" name="orgName" style="width:280px">
                                  <?php foreach ($spr_organizations as &$organization) { ?>
                                    <option value="<?php
                                      echo $organization->org_id;
                                      ?>" <?php if ($organization->org_id == $event_info->org_id) {echo 'selected = "selected"';}?>>
                                      <?php echo $organization->org_name; ?>
                                    </option>
                                  <?php } ?>
                              </select>
                          </div>
                          <div class="form-group mr-3">
                              <label for="raceType">Тип гонки*: </label>
                              <select class="form-control" id="raceType" name="raceType" style="width:280px">
                                  <?php foreach ($spr_race_types as &$race_type) { ?>
                                    <option value="<?php echo $race_type->race_type_id; ?>"
                                        <?php if ($race_type->race_type_id == $event_info->event_type_id) {echo 'selected = "selected"';}?>
                                    ><?php echo $race_type->race_type_name; ?>
                                    </option>
                                  <?php } ?>
                              </select>
                          </div>
                          <div class="form-group mr-3">
                              <label for="raceType">Тип категорий*: </label>
                              <select class="form-control" id="categoryType" name="categoryType" style="width:280px">
                                  <?php foreach ($spr_category_types as &$category_type) { ?>
                                    <option value="<?php echo $category_type->type_id; ?>"
                                        <?php if ($category_type->type_id == $event_info->event_category_type_id) {echo 'selected = "selected"';}?>
                                    >
                                      <?php echo $category_type->type_description; ?>
                                    </option>
                                  <?php } ?>
                              </select>
                          </div>
                      </div>
                      <label for="eventName">Наименование события*:</label>
                      <input class="form-control" type="text" id="eventName" name="eventName" value="<?php echo $event_info->event_title; ?>" required maxlength="50">
                      <span class="error"><?php echo $eventNameErr;?></span>

                      <label for="eventSubName">Наименование этапа*:</label>
                      <input class="form-control" type="text" id="eventSubName" name="eventSubName" value="<?php echo $event_info->event_subtitle; ?>" required maxlength="50">
                      <span class="error"><?php echo $eventSubNameErr;?></span>

                      <label for="eventSubName">Описание этапа:</label>
                      <input class="form-control" type="text" id="eventDescription" name="eventDescription" value="<?php echo $event_info->event_description; ?>" maxlength="100">
                      <div class="form-row pl-1">
                          <div class="form-group mr-3">
                              <label for="eventDate">Дата события*:</label>
                              <input class="form-control" type="date" id="eventDate" name="eventDate" value="<?php echo $event_info->event_date; ?>" required style="width:280px">
                              <span class="error"><?php echo $eventDateErr;?></span>
                          </div>
                          <div class="form-group mr-3">
                              <label for="eventStatus">Статус события*: </label>
                              <select class="form-control" id="eventStatus" name="eventStatus" style="width:280px">
                                  <?php foreach ($spr_event_status as &$event_status) { ?>
                                    <option value="<?php echo $event_status->status_id; ?>"
                                      <?php if ($event_status->status_id == $event_info->event_status_id) {echo ' selected = "selected"';}?>
                                      >
                                      <?php echo $event_status->status_name; ?>
                                    </option>
                                  <?php } ?>
                              </select>
                          </div>
                          <div class="form-group mr-3">
                              <label for="eventStatus">Картинка события*: </label>
                              <select class="form-control" id="eventImage" name="eventImage" style="width:280px">
                                  <?php foreach ($spr_images as &$image) { ?>
                                    <option value="<?php echo $image->image_id; ?>"
                                      <?php if ($image->image_id == $event_info->event_image_id) {echo ' selected = "selected"';}?>
                                      >
                                      <?php echo $image->description; ?>
                                    </option>
                                  <?php } ?>
                              </select>
                          </div>
                      </div>
                  </div>

                  <input type="submit" name="Изменить" value="Изменить">
                  <button class="btn btn-cancel" type="button" onClick="history.back();">Отменить</button>
                </form>
              <?php } ?>
        </div>
      </div>
      <?php
    };
  }

  // Функция обновляет запись в таблице БД
  function update_item()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_GET["event_id"])) {
          $event_id = $_GET["event_id"];
          $org_id = clear_input($_POST["orgName"]);

          $eventName = clear_input($_POST["eventName"]);

          if (empty($_POST["eventName"])) {
            $eventNameErr = "Поле Наименование события обязательно";
          }

          $eventSubName = clear_input($_POST["eventSubName"]);

          if (empty($_POST["eventSubName"])) {
            $eventNameErr = "Поле Наименование этапа обязательно";
          }

          $eventDate = $_POST["eventDate"];

          if (empty($_POST["eventDate"])) {
            $eventNameErr = "Поле Дата события обязательно";
          }
          $eventDescription = $_POST["eventDescription"];
          $eventStatus      = $_POST["eventStatus"];
          $raceType         = $_POST["raceType"];
          $eventImage       = $_POST["eventImage"];
          $categoryType     = $_POST["categoryType"];


          if (!empty($eventName)&&
              !empty($eventSubName)&&
              !empty($eventDate))
              {

                  $result = update_event(
                                      $event_id,
                                      $org_id,
                                      $eventName,
                                      $eventSubName,
                                      $eventDate,
                                      $eventDescription,
                                      $eventStatus,
                                      $raceType ,
                                      $eventImage,
                                      $categoryType);
                  echo '<div class="alert alert-success mt-1" role="alert"> Параметры сохраненного события <br>
                        event_id:         '.$event_id.' <br>
                        org_id:           '.$org_id.' <br>
                        eventName:        '.$eventName.' <br>
                        eventSubName:     '.$eventSubName.' <br>
                        eventDate:        '.$eventDate.' <br>
                        eventDescription: '.$eventDescription.' <br>
                        eventStatus:      '.$eventStatus.' <br>
                        raceType:         '.$raceType.' <br>
                        eventImage:       '.$eventImage.' <br>
                        categoryType:     '.$categoryType.' <br>
                          </div>';
                                                                                        ?>
                  <p class="text-left"><a href=" <?php echo home_url()?>/admin-events?action=showlist" class="btn btn-success">Список событий</a></p>
                  <?php
              }
        }
    }
  }
  // Функция удаляет запись в таблице БД
  function delete_item()
  {
    echo 'delete_item';
  }

  function clear_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
