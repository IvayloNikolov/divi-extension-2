<?php

class CustomWalker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
        $permalink = $item->url;
        $id = $item->menu_order-1;
        $onMouseOver = 'let backgroundOfMenu = document.querySelectorAll(\'#background-menu-links .background-menu-image\')[' . $id . ']; 
            backgroundOfMenu.style.opacity = \'1\';               
            backgroundOfMenu.style.transform = \'scale(1)\';
        ';
        $output .= "<li class='" .  implode(" ", $item->classes) . '\'>';
        
        $onMouseLeave = 'let backgroundOfMenu = document.querySelectorAll(\'#background-menu-links .background-menu-image\')[' . $id . '];
        backgroundOfMenu.style.transform = \'scale(1.2)\';
        backgroundOfMenu.style.opacity = \'0\'';

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
      	    $output .= '<a href="' . $permalink . '" onmouseover="' . $onMouseOver . '" onmouseleave= "' . $onMouseLeave . '">';
        } else {
            $output .= '<span>';
        }
       
        $output .= $title;

        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }

        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
        $output .= '<hr />';
    }
  
}