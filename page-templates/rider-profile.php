<?php
/*
* Template Name: Rider-profile
*/

get_header(); ?>

<div class="container">
  <div class="col-md-8 wp-bp-content-width">
    <?php
    // define variables and set to empty values
    $current_user = wp_get_current_user();
    $is_verified = is_verified($current_user->ID);
    //echo $current_user->ID;
        /*Для верифицированных участников*/
        if ($is_verified==1) {
          $rider = get_rider_info_by_WP_user_id($current_user->ID);
          foreach ($rider as &$rider_value) {
            $name = $rider_value->rider_name;
            $stravaLink = str_replace('https://www.strava.com/athletes/','',$rider_value->strava_link);
            $year = $rider_value->birth_year;
            $city = $rider_value->city;
          }
        } else {
          $name = $current_user->user_lastname.' '.$current_user->user_firstname;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["riderName"]) and $is_verified==0) {
              $nameErr = "Поле Имя обязательно";
            } elseif ($is_verified==0) {
              $name = test_input($_POST["riderName"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/[а-яА-ЯёЁ]/",$name)) {
                $nameErr = "Поле Имя должно содержать только кириллицу";
              }
            }

            if (empty($_POST["riderStravaLink"])) {
              $stravaLink = "";
            } else {
              $stravaLink = test_input($_POST["riderStravaLink"]);
              // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
              if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",'https://www.strava.com/athletes/'.$stravaLink)) {
                $stravaLinkErr = "Ошибочный URL strava";
              }
            }
            if ($stravaLink =='') {
                $inStravaLink = '';
              } else {
                $inStravaLink = 'https://www.strava.com/athletes/'.$stravaLink;
              }

            if (empty($_POST["riderBirthYear"])) {
              $yearErr = "Поле Год рождения обязательно";
            } else {
              $year = test_input($_POST["riderBirthYear"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/(\d{4})/",$year)) {
                $yearErr = "Поле Год рождения должно содержать 4 цифры";
              }
            }

            if (empty($_POST["riderCity"])) {
              $cityErr = "Поле Город обязательно.";
            } else {
              $city = test_input($_POST["riderCity"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/[а-яА-ЯёЁ]/",$city)) {
                $cityErr = "Поле Город должно содержать только кириллицу";
              }
            }





            if ($is_verified==1
                && !empty($name)
                && !empty($year)
                && !empty($city)
                && !preg_match("/[а-яА-ЯёЁ]/",$name)==0
                && !preg_match("/[а-яА-ЯёЁ]/",$city)==0
              ) {
                $results = update_rider_by_WP_user($name, $year, $inStravaLink , $city, $current_user->ID);
                echo '<div class="alert alert-success mt-1" role="alert">  Изменения сохранены! </div>';
            } elseif ($current_user->ID>0
                && !empty($name)
                && !empty($year)
                && !empty($city)
                && !preg_match("/[а-яА-ЯёЁ]/",$name)==0
                && !preg_match("/[а-яА-ЯёЁ]/",$city)==0
              ) {
                $results = add_rider($name,'D',$year,$city,$inStravaLink,$current_user->ID,1);
                update_user_option( $current_user->ID, 'show_admin_bar_front', false );
                echo '<div class="alert alert-success mt-1" role="alert">  Участник '.$name.' создан </div>';
            }


        }

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        ?>

        <h1>Профиль участника</h1>
        <p><span class="error">* обязательные поля</span></p>
        <form action="" method="post">

          <div class="form-group">
              <label for="riderName">Фамилия и имя участника*:</label>
              <input class="form-control mb-3" type="text" id="riderName" name="riderName" value="<?php echo $name;?>" <?php if ($is_verified==1) {echo 'disabled';}?> >
              <span class="error"><?php echo $nameErr;?></span>
          </div>

          <label for="strava-url">Профиль в strava:</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="strava-athete-link">https://www.strava.com/athletes/</span>
            </div>
            <input type="text" class="form-control" id="strava-url" aria-describedby="strava-athete-link" name="riderStravaLink" value="<?php echo $stravaLink;?>">
            <span class="error"><?php echo $stravaLinkErr;?></span>
          </div>
          <div class="form-row">
              <div class="form-group">
                  <label for="yearSelect">Год рождения*: </label>
                  <select class="form-control" id="yearSelect" name="riderBirthYear" value="<?php echo $year;?>" style="width:90px">
                      <?php
                      for ($i = 1950; $i <= 2010; $i++) {
                          if ($i == $year) {
                          echo '<option selected>'.$i.'</option>';
                        } else {
                          echo '<option>'.$i.'</option>';
                        }
                      }
                      ?>
                  </select>
                  <span class="error"><?php echo $yearErr;?></span>
              </div>

              <div class="form-group col ml-1">
                  <label for="riderCity">Город*:</label>
                  <input class="form-control mb-3" type="text" id="riderCity" name="riderCity" value="<?php echo $city;?>">
                  <span class="error"><?php echo $cityErr;?></span>
              </div>
          </div>

          <input type="submit" name="Сохранить" value="Сохранить">
        </form>







  </div>
</div>

<?php
get_footer();
