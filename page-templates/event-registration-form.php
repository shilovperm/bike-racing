

<?php
/*
* Template Name: event-registration-form
*/

get_header();
$jquery_path = get_template_directory_uri() . '/assets/js/jquery-3.3.1.js';
?>
<script src='<?php echo $jquery_path ?>'></script>
<?php
if (isset($_GET["event_id"])) {
    $par_event_id = $_GET["event_id"];
};
$event          = get_event_info_by_event_id($par_event_id);
$categoriesAge  = get_event_categories_by_event_id($par_event_id, 'Age');
/*echo '<pre>'.print_r($categoriesAge).'</pre>';
echo '<pre>'.print_r($event).'</pre>';*/

/*подготовка автозаполнения*/
$results = get_riders_for_registry();
$riders='[';
foreach ($results as &$resultvalue) {
        $riders .= '{ "label" : "' . $resultvalue->rider_name . '", "value" : "' . $resultvalue->rider_name . '"},';
}
$riders = substr($riders,0,-1) . ']';
/*окончание подготовки */



if ($event[0]->event_title != NULL) {
?>

  <div class="container">
    <h2>Регистрация на <?php echo $event[0]->event_title.' '.$event[0]->event_subtitle ?></h2>
    <form class="form" method="post" action="<?php echo get_template_directory_uri()?>/page-templates/event-registration-action.php">
        <div class="form-group ui-widget">
            <label for="name">Фамилия и Имя: <span style="color: red">*</span></label>
            <input type="text" name="name" id="name" autocomplete="off" onkeyup="checkParams()" placeholder="Фамилия и Имя участника" required />
        </div>
        <div class="form-group">
            <label for="year">Год рождения: <span style="color: red">*</span></label>
            <input type="text" name="year" id="year" onkeyup="checkParams()" placeholder="Введите год" />
        </div>
        <div class="form-group">
            <label for="category">Выберите категорию: <span style="color: red">*</span></label>
            <select name="category" id="category" onkeyup="checkParams()">
                <option value="none">Катеория не выбрана</option>
                <?php foreach ($categoriesAge as &$categoriesValue) { ?>
                    <option value="<?php echo $categoriesValue->category_id ?>"><?php echo $categoriesValue->category_name ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="city">Город: <span style="color: red">*</span></label>
            <input type="text" name="city" id="city" onkeyup="checkParams()" placeholder="Введите город" />
            <input type="hidden" name="event_id" value="<?php echo $par_event_id ?>">
        </div>
        <div class="pt-3">
            <input type="submit" id="submit" class="btn" value="Зарегистрироваться" disabled />
            <button type="button" class="btn" onclick="form.reset()">Очистить</button>
        </div>
        <div class="py-3">
            <small>Поля отмеченные звездочкой <span style="color: red">*</span> являются обязательными для заполнения.</small>
        </div>
    </form>
  </div>

<?php } else {
  echo ('<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
  <h1 class="red">Событие не выбрано!</h1>');
  $title = 'Ошибка!';
} ?>


<script>
    function checkParams() {
        var name      = $('#name').val();
        var year      = $('#year').val();
        var category  = $('#category').val();
        var city  = $('#city').val();

        if (name.length != 0 && year.length == 4 && city.length != 0)  {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
        }
    }
    $( function() {
        var rider_list = <?php echo $riders ?>;
        console.log(rider_list);
        $( "#name" ).autocomplete({
          source: rider_list
        });
     } );
</script>

<?php
get_footer();
