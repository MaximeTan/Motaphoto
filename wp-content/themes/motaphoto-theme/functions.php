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
    wp_enqueue_style('style-single', get_template_directory_uri() . '/assets/css/single.css', array(), '0.1');
}
add_action('wp_enqueue_scripts', 'assets');

function script()
{
    wp_enqueue_script('modal', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('burger', get_template_directory_uri() . '/assets/js/menu_burger.js', array('jquery'), '1.0', true);

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