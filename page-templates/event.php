<?php
/*
* Template Name: event
*/

get_header(); ?>

  <div class="container position-relative">

    <?php
        if (isset($_GET["event_id"])) {
            $par_event_id = $_GET["event_id"];
        };

        $event      = get_event_info_by_event_id($par_event_id);
        $categories = get_event_categories_by_event_id($par_event_id);
        $timeLine   = get_event_timeline_by_event_id($par_event_id);
        $costRules  = get_event_cost_rules_by_event_id($par_event_id);

        foreach ($event as &$eventValue)
        {
          echo '<h3>'. $eventValue->event_title .'</h3>';
          echo '<h4>'. $eventValue->event_subtitle .'</h4>';
          echo '<h5> Организатор: '. $eventValue->org_name .'  '.'<img  class="img-logo position-absolute yellow-background" src="data:image/png;base64,'.base64_encode($eventValue->org_logo).'" alt="wr"></h5>';
          echo '<h5> Дата: '. date("d.m.Y", strtotime( $eventValue->event_date)) .'</h5>';
          echo '<h6> Тип соревнования: '. $eventValue->race_type_name .' ('. $eventValue->race_type_short_name . ')</h6>';
          echo '<h6> Место регистрации на гонку:</h6>';
          echo $eventValue->event_place_map;
<<<<<<< HEAD
        };
    ?>
    <section class="content">
			<h1>Table Filter</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Pagado</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pendiente</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>
								<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr data-status="pagado">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">(Pagado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox3">
												<label for="checkbox3"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pendiente">(Pendiente)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="cancelado">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox2">
												<label for="checkbox2"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right cancelado">(Cancelado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pagado" class="selected">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox4" checked>
												<label for="checkbox4"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star star-checked">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pagado">(Pagado)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox5">
												<label for="checkbox5"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">Febrero 13, 2016</span>
													<h4 class="title">
														Lorem Impsum
														<span class="pull-right pendiente">(Pendiente)</span>
													</h4>
													<p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="content-footer">
					<p>
						Page © - 2016 <br>
						Powered By <a href="https://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a>
					</p>
				</div>
			</div>
		</section>
  <div>
=======

        }

        echo '<h6> Категории участников:</h6>';
        echo '<ul>';
          foreach ($categories as &$categoriesValue) {
            echo '<li class="list-style-type-none">';
            echo '  <span class="'. $categoriesValue->style .' rounded">'.  $categoriesValue->category_name .'</span> '. $categoriesValue->description ;
            echo '</li>';
          }
        echo '</ul>';

        echo '<h6> Расписание мероприятия:</h6>';
        echo '<ul>';
        foreach ($timeLine as &$timeLineValue) {
          echo '<li class="list-style-type-none">';
          echo    date("G:i", strtotime($timeLineValue->time_start))   .' ';

          if (date("G:i", strtotime($timeLineValue->time_end))=='0:00') {
              echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $timeLineValue->description;
          } else {
              echo date("G:i", strtotime($timeLineValue->time_end)).' '. $timeLineValue->description;
          }

          echo '</li>';
        }
        echo '</ul>';

        echo '<h6> Стоимость участия:</h6>';
        echo '<ul>';
          foreach ($costRules as &$costRulesValue) {
            echo '<li class="list-style-type-none">';
            echo    $costRulesValue->rule_cost .' рублей. '. $costRulesValue->rule_description ;
            echo '</li>';
          }
        echo '</ul>';
    ?>
  </div>
>>>>>>> 5ff16e7ee21cd01fda18a0b30496f9ad116a297f
<?php
get_footer();
