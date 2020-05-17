    <?php
    /*
    * Template Name: riders-for-registry
    */
        $filter = $_GET['term'];

        $results = get_riders_for_registry();
        /*$output='[';

        foreach ($results as &$resultvalue) {
                $output .= '{ "label" : "' . $resultvalue->rider_name . '", "value" : "' . $resultvalue->rider_name . '"},';
        }
        // обрезаем последнюю запятую и закрываем кавычки
        $output = substr($output,0,-1) . ']';*/
        echo json_encode($results);
    ?>
