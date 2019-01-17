<?php
/*
* Template Name: Riders
*/

get_header(); ?>
<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $riders = get_rider_list();
            foreach ($riders as &$value) {
              echo '<tr>';
              echo '  <td>',$value->rider_name,'</td>';
              echo '  <td>',$value->Category_Name,'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php
get_footer();
