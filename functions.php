<?php
/**
 * seed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pogaam
 */

if ( ! function_exists( 'pogaam_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pogaam_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pogaam, use a find and replace
	 * to change 'pogaam' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pogaam', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 100,
		'flex-width'  => true,
	) );
	*/

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 450, TRUE ); /* 16:9 */

	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'pogaam' ),
		//'mobile'  => __( 'Mobile Menu', 'pogaam' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	/*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	*/
}
endif; // pogaam_setup
add_action( 'after_setup_theme', 'pogaam_setup' );

/**
 * Registers Custom walker nav menu.
 */
require_once get_parent_theme_file_path( '/inc/walker-nav-menu.php' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pogaam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pogaam_content_width', 840 );
}
add_action( 'after_setup_theme', 'pogaam_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/*
function pogaam_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Lists Page Sidebar', 'pogaam' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'pogaam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s lists-navigation">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title hidden">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'pogaam' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'pogaam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'pogaam' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'pogaam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pogaam_widgets_init' );
*/

/**
 * Registers a widget.
 */
/*
function pogaam_widget_style() {

	$uri = get_template_directory_uri();

	wp_enqueue_style( 'pogaam-widget-bootstrap-css', $uri . '/inc/widgets/css/bootstrap.min.css' );
	wp_enqueue_style( 'pogaam-widget-css', $uri . '/inc/widgets/css/widget-pogaam.css' );

	wp_enqueue_script( 'pogaam-widget-bootstrap-js', $uri . '/inc/widgets/js/bootstrap.min.js' );
}
add_action('admin_enqueue_scripts', 'pogaam_widget_style');
require get_template_directory() . '/inc/widgets/widget-pogaam-categories.php';
require get_template_directory() . '/inc/widgets/widget-pogaam-post-loop.php';
require get_template_directory() . '/inc/widgets/widget-pogaam-section-hr.php';
require get_template_directory() . '/inc/widgets/widget-pogaam-google-map.php';
*/

/**
 * Enqueue scripts and styles.
 */
function pogaam_scripts() {

	$uri = get_template_directory_uri();

	/* CSS */
	wp_enqueue_style( 'pogaam-bootstrap3', $uri . '/vendor/bootstrap3/css/bootstrap.min.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-owl-carousel2', $uri . '/vendor/owl-carousel2/css/owl.carousel.min.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-font-awesome', $uri . '/vendor/font-awesome/css/font-awesome.min.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-components', $uri . '/css/components.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-utility', $uri . '/css/utility.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-global-css', $uri . '/css/global.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-style', $uri . '/style.css', array(), '20160804' );

	/* IE CSS. */
	wp_enqueue_style( 'pogaam-ie9', $uri . '/css/ie9.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-ie8', $uri . '/css/ie8.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-ie7', $uri . '/css/ie7.css', array(), '20160804' );
	wp_enqueue_style( 'pogaam-ie-lt7', $uri . '/css/ie-lt7.css', array(), '20160804' );
	wp_style_add_data( 'pogaam-ie9', 'conditional', 'lt IE 10' );
	wp_style_add_data( 'pogaam-ie8', 'conditional', 'lt IE 9' );
	wp_style_add_data( 'pogaam-ie7', 'conditional', 'lt IE 8' );
	wp_style_add_data( 'pogaam-ie-lt7', 'conditional', 'lt IE 7' );

	/* Load the html5 shiv. */
	wp_enqueue_script( 'pogaam-html5shiv', $uri . '/vendor/html5shiv/js/html5shiv.min.js', array(), '20160804', false );
	wp_enqueue_script( 'pogaam-respond', $uri . '/vendor/respond/js/respond.min.js', array(), '20160804', false );
	wp_script_add_data( 'pogaam-html5shiv', 'conditional', 'lt IE 9' );
	wp_script_add_data( 'pogaam-respond', 'conditional', 'lt IE 9' );

	/* JS */
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'pogaam-jquery', $uri . '/vendor/jquery/js/jquery.1.11.3.min.js', array(), '20160804', false );
	wp_enqueue_script( 'pogaam-selectize', $uri . '/vendor/selectize/js/selectize.js', array(), '20160804', false );
	wp_enqueue_script( 'pogaam-owl-carousel2', $uri . '/vendor/owl-carousel2/js/owl.carousel.min.js', array(), '20160804', false );
	wp_enqueue_script( 'pogaam-skip-link-focus-fix', $uri . '/js/skip-link-focus-fix.js', array(), '20160804', true );
	wp_enqueue_script( 'pogaam-global-js', $uri . '/js/global.js', array(), '20160804', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'pogaam-global-js', 'pogaam_obj', array(
		'uri' => $uri
	) );
}
add_action( 'wp_enqueue_scripts', 'pogaam_scripts' );

/**
 * Wysiwyg Editor CSS
 */
function pogaam_add_editor_styles() {
	$uri = get_stylesheet_directory_uri();
	add_editor_style( $uri . '/vendor/bootstrap3/css/bootstrap.min.css' );
	add_editor_style( $uri . '/css/global.css' );
	add_editor_style( $uri . '/css/wp-editor-style.css' );	
}
add_action( 'admin_init', 'pogaam_add_editor_styles' );

/**
 * Admin CSS
 */
function pogaam_admin_style() {

	$uri = get_template_directory_uri();
	wp_enqueue_style('pogaam-admin-style', $uri . '/css/wp-admin.css');
	wp_enqueue_script( 'pogaam-admin-js', $uri . '/js/admin.js' );

	wp_localize_script( 'pogaam-admin-js', 'pogaam_obj', array(
		'uri' => $uri
	) );
}
add_action('admin_enqueue_scripts', 'pogaam_admin_style');

/**
 * Hide admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Customizer additions.
 */
require_once get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Option page.
 */
if( function_exists('acf_add_options_page') ) {
	
	/* Footer page */
	acf_add_options_page(array(
		'page_title' 	=> __( 'Footer', 'pogaam' ),
		'menu_title'	=> __( 'Footer', 'pogaam' ),
		'menu_slug' 	=> 'pogaam-footer',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position'      => 21,
		'icon_url'      => 'dashicons-admin-settings',
	));

	/* Google Analytics */
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Google Analytics Code',
		'menu_title' 	=> 'Google Analytics Code',
		'parent_slug' 	=> 'options-general.php',
		'menu_slug' 	=> 'pogaam-google-analytics',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));
	
}

/**
 * Function Up Decimal
 */
if ( ! function_exists( 'pogaam_up_decimal' ) ) {
	function pogaam_up_decimal( $decimal ) {
		$int    = (int) $decimal;
		$return = $decimal > $int ? $int+1 : $int;
		return $return;
	}
}

/**
 * Resize Image
 */
require_once get_parent_theme_file_path( '/inc/resize-image.php' );


/**
 * Custom fields in Nav menu
 */
require_once get_parent_theme_file_path( '/inc/nav-menu-item-custom-fields.php' );

add_filter( 'xteam_nav_menu_item_additional_fields', 'pogaam_custom_fields_nav_menu' );
function pogaam_custom_fields_nav_menu( $fields ) {
	$fields['disappear_in_footer'] = array(
		'name'           => 'disappear_in_footer',
		'label'          => __( 'Disappear on footer', 'pogaam' ) . ' (' . __( 'Optional', 'pogaam' ) . ')',
		'placeholder'    => 'yes',
		'input_type'     => 'text',
	);
	
	return $fields;
}

/**
 * Get pogaam_logo
 */
if ( ! function_exists( 'pogaam_logo' ) ) {
	function pogaam_logo() {
		
		$logo_desktop = get_theme_mod( 'pogaam_logo_desktop' );
		$logo_mobile  = get_theme_mod( 'pogaam_logo_mobile' );

		if ( $logo_desktop ) : ?>
			<img class="custom-logo custom-logo-desktop<?php echo($logo_mobile != "" ? " has-mobile" : ""); ?>"
				 src="<?php echo $logo_desktop; ?>"
				 alt="<?php bloginfo( 'name' ); ?>"
				 title="<?php bloginfo( 'name' ); ?>"
				 >
		<?php endif; ?>
		<?php if ( $logo_desktop || $logo_mobile ) : ?>
			<img class="custom-logo custom-logo-mobile<?php echo($logo_mobile == "" ? " hidden" : ""); ?>"
				 src="<?php echo $logo_mobile; ?>"
				 alt="<?php bloginfo( 'name' ); ?>"
				 title="<?php bloginfo( 'name' ); ?>"
				 >
		<?php endif;
	}
}


/**
 * Hide Left side menu
 * Remove specific standard WP menu items
 * Adjust per project
 */
$bk_production = FALSE;

function bk_remove_menus() {
	// remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'edit.php' );                   //Posts
	// remove_menu_page( 'upload.php' );                 //Media
	// remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	// remove_menu_page( 'themes.php' );                 //Appearance
	remove_menu_page( 'plugins.php' );                //Plugins
	remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page( 'options-general.php' );        //Settings

	remove_menu_page( 'cptui_main_menu' );            //CPT UI
}

/**
 * We use this to remove the "Page Attributes" meta box, which has the
 * page template and page hierarchy attributes, since we do not want the
 * client to break the templates we have assigned.
 */
function bk_hide_meta_box_attributes( $hidden, $screen ) {
	$hidden[] = 'pageparentdiv';
	return $hidden;
}

if ( $bk_production ) {
	add_action( 'admin_menu', 'bk_remove_menus' );
	add_filter( 'hidden_meta_boxes', 'bk_hide_meta_box_attributes', 10, 2 );
	add_filter( 'acf/settings/show_admin', '__return_false' );
}

?>