<?php
/**
 * Agenio Header Menu Walker
 *
 * @package agenio
 */
if ( ! class_exists( 'Agenio_Walker_Header_Menu' ) ) {
class Agenio_Walker_Header_Menu extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '<ul class="sub-menu">';
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</ul>';
        }
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes       = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children  = in_array( 'menu-item-has-children', $classes );
        $is_active     = in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes );
        $url           = ! empty( $item->url ) ? $item->url : '#';

        if ( $depth === 0 ) {
            // Top-level item
            $li_class   = 'menu-item' . ( $has_children ? ' has-dropdown' : '' ) . ( $is_active ? ' active' : '' );
            $link_class = 'main-element' . ( $has_children ? ' wpr-dropdown-main-element' : '' );

            $output .= '<li class="' . esc_attr( $li_class ) . '">';
            $output .= '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $link_class ) . '">';
            $output .= esc_html( $item->title );
            $output .= '</a>';
        } else {
            // Dropdown child item
            $link_class = 'item-link link1' . ( $is_active ? ' active' : '' );

            $output .= '<li class="sub-menu-item">';
            $output .= '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $link_class ) . '">';
            $output .= esc_html( $item->title );
            $output .= '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
}