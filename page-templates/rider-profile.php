<?php
/*
* Template Name: Rider-profile
*/

get_header(); ?>

<div class="container">
  <?php
  // define variables and set to empty values


  $current_user = wp_get_current_user();

  $name = $current_user->user_firstname;
  $lastName = $current_user->user_lastname;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Поле Имя обязательно";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[а-яА-ЯёЁ]*$/",$name)) {
        $nameErr = "Поле Имя должно содержать только кириллицу";
      }
    }


      if (empty($_POST["lastName"])) {
        $lastNameErr = "Поле Фамилия обязательно";
      } else {
        $lastName = test_input($_POST["lastName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[а-яА-ЯёЁ]*$/",$lastName)) {
          $lastNameErr = "Поле Фамилия должно содержать только кириллицу";
        }
      }


    if (empty($_POST["stravaLink"])) {
      $stravaLink = "";
    } else {
      $stravaLink = test_input($_POST["stravaLink"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$stravaLink)) {
        $stravaLinkErr = "Ошибочный URL strava";
      }
    }


      if (empty($_POST["year"])) {
        $yearErr = "Поле Год рождения обязательно";
      } else {
        $year = test_input($_POST["year"]);
        // check if name only contains letters and whitespace
        if (!preg_match("[0-9]{4}",$year)) {
          $yearErr = "Поле Год рождения должно содержать 4 цифры";
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
    Имя: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br>
    Фамилия: <input type="text" name="lastName" value="<?php echo $lastName;?>">
    <span class="error">* <?php echo $lastNameErr;?></span>
    <br>
    Профиль в strava: <input type="text" name="strava_link" value="<?php echo $stravaLink;?>">
    <span class="error"><?php echo $stravaLinkErr;?></span>
    <br>
    Год рождения: <input type="text" name="year" value="<?php echo $year;?>">
    <span class="error"><?php echo $yearErr;?></span>

    <input type="submit" name="submit" value="Submit">
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
  ?>






</div>

<?php
get_footer();
