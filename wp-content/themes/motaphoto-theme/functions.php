<?php add_action('admin_init', function () {
    if (!isset($_GET['updated'])) {
        return;
    }
    $nonce = $_GET['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'update-core')) {
        wp_die('Security check failed');
    }
}, 100);
?>
<?
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');


function assets()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    // wp_enqueue_style('style-single', get_template_directory_uri() . '/assets/css/single.css', array(), '0.1');
    wp_enqueue_style('select2-style', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', '4.1.0-rc.0', false);

}
add_action('wp_enqueue_scripts', 'assets');

function script()
{   
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '1.0', true);
    wp_enqueue_script('modal', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.1', true);
    wp_enqueue_script('burger', get_template_directory_uri() . '/assets/js/menu-burger.js', array('jquery'), '1.2', true);
    wp_enqueue_script('select2-script', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '4.1.0-rc.0', true);
    wp_enqueue_script('select2', get_template_directory_uri() . '/assets/js/select2.js', array('jquery'), '4.1.0-rc.0', true);
}
add_action('wp_enqueue_scripts', 'script');


function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
        ));
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}
add_action('after_setup_theme', 'montheme_supports');
?>

<!-- MISE EN PLACE DES CPT UI -->
<? function cptui_register_my_cpts() {

/**
 * Post Type: photos.
 */

$labels = [
    "name" => esc_html__( "photos", "custom-post-type-ui" ),
    "singular_name" => esc_html__( "photo", "custom-post-type-ui" ),
];

$args = [
    "label" => esc_html__( "photos", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => [ "slug" => "photos", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "photos", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: categories.
	 */

	$labels = [
		"name" => esc_html__( "categories", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "categorie", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'categorie', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "categorie",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "categorie", [ "photos" ], $args );

	/**
	 * Taxonomy: formats.
	 */

	$labels = [
		"name" => esc_html__( "formats", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "format", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "formats", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'format', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "format",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "format", [ "photos" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
?>

