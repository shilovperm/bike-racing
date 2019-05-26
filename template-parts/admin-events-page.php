<?php


  // обращение к БД

  $events = get_all_events();

?>
<div class="container">
    <h3>Все события</h3>
    <div class="table-container">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>

                <p class="text-right"><a href=" <?php echo home_url()?>/admin-add-event" class="btn btn-primary"><b>+</b> Добавить событие</a></p>
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
                    <td class="text-center"> <a class='btn btn-info' href="#"> Редактировать </a></td>
                </tr>
                <?php } ?>

	          </tbody>
        </table>
    </div>
  </div>
