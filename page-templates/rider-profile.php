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

    $name = $current_user->user_firstname;
    $lastName = $current_user->user_lastname;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["riderName"])) {
          $nameErr = "Поле Имя обязательно";
        } else {
          $name = test_input($_POST["riderName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/[а-яА-ЯёЁ]/",$name)) {
            $nameErr = "Поле Имя должно содержать только кириллицу";
          }
        }

        if (empty($_POST["riderLastName"])) {
          $lastNameErr = "Поле Фамилия обязательно";
        } else {
          $lastName = test_input($_POST["riderLastName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/[а-яА-ЯёЁ]/",$lastName)) {
            $lastNameErr = "Поле Фамилия должно содержать только кириллицу";
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
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



    ?>

    <h2>Профиль участника</h2>
    <p><span class="error">* обязательные поля</span></p>
    <form action="" method="post">

      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="riderName">Имя*:</label>
              <input class="form-control mb-3" type="text" id="riderName" name="riderName" value="<?php echo $name;?>" >
              <span class="error"><?php echo $nameErr;?></span>
          </div>
          <div class="form-group col-md-6">
              <label for="riderLastName">Фамилия*:</label>
              <input class="form-control mb-3" type="text" id="riderLastName" name="riderLastName" value="<?php echo $lastName;?>" >
              <span class="error"><?php echo $lastNameErr;?></span>
          </div>
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

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $lastName;
    echo "<br>";
    echo $stravaLink;
    echo "<br>";
    echo $year;
    echo "<br>";
    echo $city;
    ?>





  </div>
</div>

<?php
get_footer();
