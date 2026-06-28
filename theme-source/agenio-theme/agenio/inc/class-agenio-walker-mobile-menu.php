<?php
/**
 * Agenio Mobile Menu Walker
 *
 * @package agenio
 */
if ( ! class_exists( 'Agenio_Walker_Mobile_Menu' ) ) {
class Agenio_Walker_Mobile_Menu extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        // collapse target ID is stored during start_el, retrieved via a property
        $target = $this->current_collapse_id;
        $output .= '<ul id="' . esc_attr( $target ) . '" class="collapse list-unstyled ps-3" data-bs-parent="#mobile-menu">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes      = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );
        $is_active    = in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes );
        $url          = ! empty( $item->url ) ? $item->url : '#';

        if ( $depth === 0 ) {
            $li_class = 'menu-item' . ( $is_active ? ' active' : '' );
            $output  .= '<li class="' . esc_attr( $li_class ) . '">';

            if ( $has_children ) {
                // Generate a unique collapse ID from the item title
                $collapse_id = 'mobileMenu_' . sanitize_title( $item->title );
                $this->current_collapse_id = $collapse_id;

                $output .= '<button class="main-element collapsed w-100 text-start bg-transparent border-0"'
                         . ' data-bs-toggle="collapse"'
                         . ' data-bs-target="#' . esc_attr( $collapse_id ) . '"'
                         . ' aria-expanded="false"'
                         . ' aria-controls="' . esc_attr( $collapse_id ) . '">';
                $output .= esc_html( $item->title );
                $output .= '</button>';
            } else {
                $output .= '<a class="main-element" href="' . esc_url( $url ) . '">';
                $output .= esc_html( $item->title );
                $output .= '</a>';
            }
        } else {
            // Child item
            $output .= '<li>';
            $output .= '<a href="' . esc_url( $url ) . '" class="sub-menu' . ( $is_active ? ' active' : '' ) . '">';
            $output .= esc_html( $item->title );
            $output .= '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
}