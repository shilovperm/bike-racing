<?php

class WP_bootstrap_4_walker_nav_menu extends Walker_Nav_menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object      = $item->object;
    	$type        = $item->type;
    	$title       = $item->title;
    	$description = $item->description;
    	$permalink   = $item->url;

        $active_class = '';
        if( in_array('current-menu-item', $item->classes) ) {
            $active_class = 'active';
        }

        $dropdown_class = '';
        $dropdown_link_class = '';

        $current_user = wp_get_current_user();
        $is_on_verification = 0;
        $is_verified = 0;
        if ($current_user->ID > 0) {
            $is_on_verification = is_on_verification($current_user->ID);
            $is_verified = is_verified($current_user->ID);
            $rider = get_rider_info_by_WP_user_id($current_user->ID);
        }

        if( $args->walker->has_children && $depth == 0 ) {
            $dropdown_class = 'dropdown';
            $dropdown_link_class = 'dropdown-toggle';
        }

        if ($title=='Админ'&&(!current_user_can('administrator')))
        {
          /**Личный кабинет администратора по умолчанию скрыт**/
        } elseif ($title=='Вход' && is_user_logged_in())
        {
          /*Вход для вошедших пользователей скрыт*/
        } elseif (($title=='Верификация' && is_user_logged_in() && $is_on_verification==0)||($title=='Верификация' && !is_user_logged_in()))
        {
            /*Верификация для вошедших пользователей скрыта*/
        } elseif ($title=='Профиль' && $is_verified == 0)
        {
           /*меню профиль скрыто для неверифицированных участников*/
        } else
        {

          if ($title=='Профиль') {
            $title = $rider[0]->rider_name;
            $permalink = home_url().'/rider?rider_id='. $rider[0]->rider_id;
          }

          if ($title=='Участник') {
            $permalink = home_url().'/rider?rider_id='. $rider[0]->rider_id;            
          }

          $output .= "<li class='nav-item $active_class $dropdown_class " .  implode(" ", $item->classes) . "'>";

          if( $args->walker->has_children && $depth == 0 ) {
              $output .= '<a href="' . esc_url($permalink) . '" class="nav-link ' . $dropdown_link_class . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
          }
          else {
              $output .= '<a href="' . esc_url($permalink) . '" class="nav-link">';
          }

          $output .= $title;

          if( $description != '' && $depth == 0 ) {
              $output .= '<small class="description">' . $description . '</small>';
          }

          $output .= '</a>';
        }
    }

    function start_lvl( &$output, $depth=0, $args = array() ){
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "<ul class='dropdown-menu $submenu depth_$depth'>";
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
    	if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
    		$t = '';
    		$n = '';
    	} else {
    		$t = "\t";
    		$n = "\n";
    	}
      if ($title=='Личный кабинет'&&(!current_user_can('administrator')))
      {
        /**Личный кабинет по умолчанию скрыт**/
      } else
      {
    	   $output .= "</li>{$n}";
      }
    }

}
