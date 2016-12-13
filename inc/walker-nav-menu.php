<?php
class pogaam_nav_menu extends Walker_Nav_Menu {

	public function __construct( $li_class = '' ) {
		$this->li_class = $li_class;
	}

    // First li
	public function start_el(&$output, $item, $depth, $args) {
		// Variable
		$indent         = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes        = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes        = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item );
		$a_attr         = "";
		$li_class_names = "";
		$li_attr        = "";
		$has_child      = false;


		/** --------------------
		 * <a> 
		 */
		// attribuite
		$a_attr .= ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$a_attr .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$a_attr .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$a_attr .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		/** --------------------
		 * <li> 
		 */
		$class_array = array();
		// class active
		if ( in_array("current-menu-item",   $classes) ||
			 in_array("current-menu-parent",   $classes) ) {
			array_push( $class_array, 'active' );
		}
		// has child
		if ( in_array("menu-item-has-children",   $classes) ) {
			$has_child = true;
			array_push( $class_array, 'menu-item-has-children' );
		}
		// $li_class (parameters)
		if ( $depth == 0 && !empty( $this->li_class ) ) {
			array_push( $class_array, $this->li_class );
		}	
		

		// Combine class
		if ( count( $class_array ) > 0 ) {
			$li_class_names = ' class="' . implode( ' ', $class_array ) . '"';
		}


		/** --------------------
		 * OUTPUT
		 * <li>
		 *    <a>text</a>
		 * </li>
		 */
		$output .= $indent . '<li ' . $li_attr . $li_class_names .'>';
		$item_output .= $args->link_before;
		$item_output .= "<a". $a_attr .">";
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= "</a>";
		$item_output .= $has_child ? '<i class="fa fa-angle-down header-navigation-open-icon"></i>' : '';
		$item_output .= $args->link_after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}

class pogaam_footer_nav_menu extends Walker_Nav_Menu {

	public function __construct( $li_class = '' ) {
		$this->li_class = $li_class;
	}

    // First li
	public function start_el(&$output, $item, $depth, $args) {
		// Variable
		$indent         = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes        = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes        = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item );
		$a_attr         = "";
		$li_class_names = "";
		$li_attr        = "";
		// Custom
		$item->disappear_in_footer = get_post_meta( $item->ID, '_menu_item_disappear_in_footer', true );
		if ( $item->disappear_in_footer == "yes" ) {
			return false;
		}


		/** --------------------
		 * <a> 
		 */
		// attribuite
		$a_attr .= ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$a_attr .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$a_attr .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$a_attr .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		/** --------------------
		 * <li> 
		 */
		$class_array = array();
		// class active
		if ( in_array("current-menu-item",   $classes) ||
			 in_array("current-menu-parent",   $classes) ) {
			array_push( $class_array, 'active' );
		}
		// has child
		if ( in_array("menu-item-has-children",   $classes) ) {
			array_push( $class_array, 'menu-item-has-children' );
		}
		// $li_class (parameters)
		if ( $depth == 0 && !empty( $this->li_class ) ) {
			array_push( $class_array, $this->li_class );
		}	
		

		// Combine class
		if ( count( $class_array ) > 0 ) {
			$li_class_names = ' class="' . implode( ' ', $class_array ) . '"';
		}


		/** --------------------
		 * OUTPUT
		 * <li>
		 *    <a>text</a>
		 * </li>
		 */
		$output .= $indent . '<li ' . $li_attr . $li_class_names .'>';
		$item_output .= $args->link_before;
		$item_output .= "<a". $a_attr .">";
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= "</a>";
		$item_output .= $args->link_after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}


	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$item->disappear_in_footer = get_post_meta( $item->ID, '_menu_item_disappear_in_footer', true );

		if ($item->disappear_in_footer == "yes") {
			return false;			
		}
		else {
			$output .= "</li>\n";
		}
        
    }

}

?>