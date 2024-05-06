<?php
// LOAD MORE
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts() {
    $paged = $_POST['page'];

    $gallery = new WP_Query(array(
        'post_type' => 'photos',
        'posts_per_page' => 8,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged
    ));

    if ($gallery->have_posts()) {
        while ($gallery->have_posts()) : $gallery->the_post();
            get_template_part('/template-parts/single-photo');
        endwhile;
    }

    wp_die();
}

// FILTERS AND SORT

function ajaxFilter() {
    $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
    $format = isset($_POST['format']) ? $_POST['format'] : '';
    $sortByDate = isset($_POST['sortByDate']) ? $_POST['sortByDate'] : '';

    // Check if any filters are selected

    $gallery_args = array(
        'post_type' => 'photos',
        'posts_per_page' => -1,
        'order' => ($sortByDate === 'ASC') ? 'ASC' : 'DESC',
        'orderby' => 'date',
        'post_status' => 'publish',
        'paged' => 1,
    );

    if ($categorie && $categorie !== 'all') {
        $gallery_args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $categorie,
        );
    }

    if ($format && $format !== 'all') {
        $gallery_args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    $query = new WP_Query($gallery_args);

    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            get_template_part('/template-parts/single-photo');
        endwhile;
        $content = ob_get_clean();
        echo $content;
    }

    die();
}
add_action('wp_ajax_ajaxFilter', 'ajaxFilter');
add_action('wp_ajax_nopriv_ajaxFilter', 'ajaxFilter'); // For non-logged in users

?>