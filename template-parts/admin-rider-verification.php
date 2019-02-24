<?php
    if (isset($_POST['button']))
    {
        if (!empty($_POST["rider_id"])){
            $result = set_wp_user_verified($_POST["rider_id"]);
        }
    }
?>
<div class="container">
    <h3>Верификация участников</h3>

    <div class="table-container">
    	<table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Имя участника</th>
                <th>Год</th>
                <th>Город</th>
                <th>Имя пользователя</th>
                <th>E-mail</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $riders_verifications = get_riders_on_verification();
          foreach ($riders_verifications as &$riders_verifications_value) {
              $wp_user = get_user_by('id',$riders_verifications_value->wp_user_id);
              echo '<tr>';
              echo '  <td>'.$riders_verifications_value->rider_name.'</td>';
              echo '  <td>'.$riders_verifications_value->birth_year.'</td>';
              echo '  <td>'.$riders_verifications_value->city.'</td>';
              echo '  <td>'.$wp_user->last_name.' '.$wp_user->first_name.'</td>';
              echo '  <td>'.$wp_user->user_email.'</td>';
              echo '  <td>';
              echo '    <form action="" method="post">';
              echo '      <input type="hidden" name="rider_id" value="'.$riders_verifications_value->rider_id.'">';
              echo '      <button class="btn btn-success" type="submit" name="button">Привязать участника</button>';
              echo '    </form>';
              echo '  </td>';
              echo '</tr>';
          }
          ?>
    		</tbody>
    	</table>
    </div>
</div>
