<?php
// Соединяемся с сервером БД
global $wpdb_bike;

if ( isset( $_GET['id'] ) ) {
  // Здесь $id номер изображения
  $id = (int)$_GET['id'];
  if ( $id > 0 ) {
		// Выполняем запрос и получаем файл
		$image = $wpdb_bike->get_results( $wpdb_bike->prepare(
				'CALL p_get_rating_by_category(%s)',$id) );
      // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
      header("Content-type: image/*");
      // И  передаем сам файл
      echo $image->image;
    }
  }
}
?>
