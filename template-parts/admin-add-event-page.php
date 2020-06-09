

<div class="container">
  <div class="col-md-8 wp-bp-content-width">
    <?php
        $spr_event_status   = get_spr_event_status();
        $spr_organizations  = get_spr_organizations();
        $spr_race_types     = get_spr_race_types();
        $spr_category_types = get_spr_category_types();
        $spr_images         = get_spr_images();

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
                    echo '<div class="alert alert-success mt-1" role="alert"> Параметры
                                                                                        org_id:           '.$org_id.'
                                                                                        eventName:        '.$eventName.'
                                                                                        eventSubName:     '.$eventSubName.'
                                                                                        eventDate:        '.$eventDate.'
                                                                                        eventDescription: '.$eventDescription.'
                                                                                        eventStatus:      '.$eventStatus.'
                                                                                        raceType:         '.$raceType.'
                                                                                        eventImage:       '.$eventImage.'
                                                                                        categoryType:     '.$categoryType.'
                                                                                        </div>';
                }


        }

        function clear_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        ?>

        <h1>Создание события</h1>
        <p><span class="error">* обязательные поля</span></p>
        <form action="" method="post">

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
        </form>
  </div>
</div>
