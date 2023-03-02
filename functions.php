<?php

function load_lr_theme_styles() { 
    wp_enqueue_style('main-css', get_template_directory_uri().'/style.css' , array(), 'all');
    // wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css',array(), 'all');
}
add_action('wp_enqueue_scripts', 'load_lr_theme_styles');

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_media();
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '1.0.0' );
    wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/lr-theme.js', array(), '1.0.0', true );

}


function lr_theme_setup() {
    register_nav_menus( array( 
        'lr_primary_menu' => __( 'Primary Menu(LR)' ),
        'lr_footer_menu'  => __( 'Footer Menu(LR)' ),
    ) );
   }
  
add_action( 'after_setup_theme', 'lr_theme_setup' );

// OUR SERVICE CUSTOM POST TYPE:
function lr_service_custom_postType(){
    register_post_type('our-services', [
        'label'         => __('Our Service', 'lrtheme'),
        'public'        => true,
        'menu_position' => 10,
        'menu_icon'     => 'dashicons-sticky',
        'supports'      => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
        'show_in_rest'  => true,
        'rewrite'       => ['slug' => 'our-services'],
        'labels' => [
            'singular_name'      => __('Our Service', 'lrtheme'),
            'add_new_item'       => __('Add new Our Service', 'lrtheme'),
            'new_item'           => __('New Our Service', 'lrtheme'),
            'view_item'          => __('View Our Service', 'lrtheme'),
            'not_found'          => __('No Menu found', 'lrtheme'),
            'not_found_in_trash' => __('No Menu found in trash', 'lrtheme'),
            'all_items'          => __('All Our Service', 'lrtheme'),
            'insert_into_item'   => __('Insert into Our Service', 'lrtheme')
        ],		
    ]);
}
add_action( 'init', 'lr_service_custom_postType' );


// OUR SERVICE CUSTOM POST TYPE:
function company_logo_custom_postType(){
    register_post_type('marketing-company', [
        'label'         => __('Marketing Company', 'lrtheme'),
        'public'        => true,
        'menu_position' => 10,
        'menu_icon'     => 'dashicons-cover-image',
        'supports'      => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
        'show_in_rest'  => true,
        'rewrite'       => ['slug' => 'marketing-company'],
        'labels' => [
            'singular_name'      => __('Marketing Company', 'lrtheme'),
            'add_new_item'       => __('Add new Marketing Company', 'lrtheme'),
            'new_item'           => __('New Marketing Company', 'lrtheme'),
            'view_item'          => __('View Marketing Company', 'lrtheme'),
            'not_found'          => __('No Menu found', 'lrtheme'),
            'not_found_in_trash' => __('No Menu found in trash', 'lrtheme'),
            'all_items'          => __('All Marketing Company', 'lrtheme'),
            'insert_into_item'   => __('Insert into Marketing Company', 'lrtheme')
        ],		
    ]);
}
add_action( 'init', 'company_logo_custom_postType' );

// OUR SERVICE CUSTOM POST TYPE:
function mobile_company_custom_postType(){
    register_post_type('our-partner', [
        'label'         => __('Our Partner', 'lrtheme'),
        'public'        => true,
        'menu_position' => 10,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
        'show_in_rest'  => true,
        'rewrite'       => ['slug' => 'our-partner'],
        'labels' => [
            'singular_name'      => __('Our Partner', 'lrtheme'),
            'add_new_item'       => __('Add new Our Partner', 'lrtheme'),
            'new_item'           => __('New Our Partner', 'lrtheme'),
            'view_item'          => __('View Our Partner', 'lrtheme'),
            'not_found'          => __('No Menu found', 'lrtheme'),
            'not_found_in_trash' => __('No Menu found in trash', 'lrtheme'),
            'all_items'          => __('All Our Partner', 'lrtheme'),
            'insert_into_item'   => __('Insert into Our Partner', 'lrtheme')
        ],		
    ]);
}
add_action( 'init', 'mobile_company_custom_postType' );

// OUR SERVICE CUSTOM POST TYPE:
function our_partner_custom_postType(){
    register_post_type('mobile-company', [
        'label'         => __('Mobile Company', 'lrtheme'),
        'public'        => true,
        'menu_position' => 10,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
        'show_in_rest'  => true,
        'rewrite'       => ['slug' => 'mobile-company'],
        'labels' => [
            'singular_name'      => __('Mobile Company', 'lrtheme'),
            'add_new_item'       => __('Add new Mobile Company', 'lrtheme'),
            'new_item'           => __('New Mobile Company', 'lrtheme'),
            'view_item'          => __('View Mobile Company', 'lrtheme'),
            'not_found'          => __('No Menu found', 'lrtheme'),
            'not_found_in_trash' => __('No Menu found in trash', 'lrtheme'),
            'all_items'          => __('All Mobile Company', 'lrtheme'),
            'insert_into_item'   => __('Insert into Mobile Company', 'lrtheme')
        ],		
    ]);
}
add_action( 'init', 'our_partner_custom_postType' );

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

// add_filter( 'show_admin_bar', '__return_false' );

function lrtheme_widgets_init() {
    // First footer widget area, located in the footer. Empty by default. 
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'lrtheme' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'lrtheme' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Second Footer Widget Area, located in the footer. Empty by default. 
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'lrtheme' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'lrtheme' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Third Footer Widget Area, located in the footer. Empty by default. 
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'lrtheme' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'lrtheme' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Fourth Footer Widget Area, located in the footer. Empty by default. 
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'lrtheme' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'lrtheme' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
}
add_action( 'widgets_init', 'lrtheme_widgets_init' );

// Add submenu under apperance section:
function add_lrtheme_appearnace_menu() {
    add_theme_page('LR Theme',
                   'LR Theme', 
                   'manage_options', 
                   'lr-theme-identifier', 
                   'render_lrtheme_page');
}

function render_lrtheme_page() {

    $header_setting      = ( isset( $_GET['page'] ) && 'lr-theme-identifier' == $_GET['page'] ) ? true : false;
    $footer_setting      = ( isset( $_GET['tab'] ) && 'footer-settings' == $_GET['tab'] ) ? true : false;
    // $button_setting      = ( isset( $_GET['tab'] ) && 'button-settings' == $_GET['tab'] ) ? true : false; 
    ?>
    <div style="padding-bottom: 12px;">
        <h2 class="nav-tab-wrapper">
            <a href="<?php echo admin_url( 'themes.php?page=lr-theme-identifier' ); ?>" class="nav-tab<?php if ( ! isset( $_GET['tab'] ) || isset( $_GET['tab'] )  && 'header-settings' != $_GET['tab']   &&  'footer-settings' != $_GET['tab']  &&  'button-settings' != $_GET['tab'] ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Header Settings' ); ?></a>

            <a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'footer-settings' ), admin_url( 'admin.php?page=lr-theme-identifier' ) ) ); ?>" class="nav-tab<?php if ( $footer_setting ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Footer Settings' ); ?></a> 
        </h2>
    </div> 
    <?php
    if ($footer_setting) {
        include(get_template_directory() . '/theme-settings/footer-settings.php');
    }
    else{
        include(get_template_directory() . '/theme-settings/header-settings.php');
    }
}
add_action('admin_menu', 'add_lrtheme_appearnace_menu');

function register_theme_settings()
{
    register_setting( 'footer_settings_global', 'footer_settings_data' );
    register_setting( 'header_settings_global', 'header_settings_data' );
}
add_action( 'admin_init', 'register_theme_settings' );
/* wcp is used for wp-color-picker */

add_action( 'call_mobile_post_data', 'my_footer_echo' );
function my_footer_echo(){
    $args = array( 'post_type' => 'mobile-company', 'posts_per_page' => 2 );
    $the_query = new WP_Query( $args ); 
    if($the_query->have_posts()):
        while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?> <a href="<?php  echo get_permalink( get_the_ID() );?>"><?php 
            $logo = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
            if(!empty($logo)){  ?>
            <img src="<?php  echo $logo; ?>" alt="Company Logo" title="<?php the_title();?>" height="50px" width="50px"> 
            </a>
            <?php } 
        endwhile;
    endif;
}