<?php
/*
* Template Name: event-registration-action
*/

require('../../../../wp-load.php');

/*
echo 'name: ',  $_POST['name'],'<br>';
echo 'year: ', $_POST['year'],'<br>';
echo 'category: ', $_POST['category'],'<br>';
echo 'city: ', $_POST['city'],'<br>';
echo 'event_id: ', $_POST['event_id'],'<br>';
*/
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
}  else  {
        $url = "http://";
}
// Append the host(domain name, ip) to the URL.
$url.= $_SERVER['HTTP_HOST'];


if ($_POST['category'] == 'none') {
    //$param_header = 'Refresh: 5; URL='.$url.'/bike-racing/event-registration';
    $param_header = 'Refresh: 5; URL='.$url.'/event-registration';
    header($param_header);
    echo ('<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <h1 class="red">Ошибка регистрации!</h1>
    <p>Категория не выбрана<br>
    Через 5 секунд вы вернетесь на страницу регистрации.</p>');
    $title = 'Ошибка!';
} else {
  $out_answer = register_rider($_POST['name'], $_POST['category'], $_POST['year'], $_POST['city'], $_POST['event_id']);
  if ($out_answer[0]->result == 'Регистрация прошла успешно!') {
    //$param_header = 'Refresh: 5; URL='.$url.'/bike-racing/event?event_id='.$_POST['event_id'];
    $param_header = 'Refresh: 5; URL='.$url.'/event?event_id='.$_POST['event_id'];
    header($param_header);
    echo '
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        <body>
          <h1>Регистрация прошла успешно!</h1>
          <p>Через 5 секунд вы вернетесь на страницу события.</p>
        </body>';
    $title = 'Регистрация завершена';
  } elseif ($out_answer[0]->result == 'Вы уже зарегистрированы') {
    //$param_header = 'Refresh: 5; URL='.$url.'/bike-racing/event?event_id='.$_POST['event_id'];
    $param_header = 'Refresh: 5; URL='.$url.'/event?event_id='.$_POST['event_id'];
    header($param_header);
    echo ('
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      </head>
      <h1 class="red">Ошибка регистрации!</h1>
      <p>Вы уже зарегистрированы<br>
      Через 5 секунд вы вернетесь на страницу события.</p>');
    $title = 'Ошибка!';
  }

}


?>
<?php
