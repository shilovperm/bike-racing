

<div class="container">
  <div class="col-md-8 wp-bp-content-width">
    <?php
        $spr_event_status = get_spr_event_status();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
            $eventStatus = $_POST["eventStatus"];


            if (!empty($eventName)&&
                !empty($eventSubName)&&
                !empty($eventDate))
                {
                    /*$results = update_rider_by_WP_user($name, $year, $inStravaLink , $city, $current_user->ID);*/
                    echo '<div class="alert alert-success mt-1" role="alert"> Проверки пройдены! Ничего не сделано!Статус: '.$eventStatus.' </div>';
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
                      <input class="form-control" type="date" id="eventDate" name="eventDate" value="" required style="width:200px">
                      <span class="error"><?php echo $eventDateErr;?></span>
                  </div>

                  <div class="form-group">
                      <label for="eventStatus">Статус события*: </label>
                      <select class="form-control" id="eventStatus" name="eventStatus" style="width:200px">
                          <?php foreach ($spr_event_status as &$event_status) { ?>
                            <option value="<?php echo $event_status->status_id; ?>"><?php echo $event_status->status_name; ?></option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
          </div>

          <input type="submit" name="Создать" value="Создать">
        </form>
  </div>
</div>
