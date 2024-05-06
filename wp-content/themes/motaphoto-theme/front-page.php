<?php get_header() ?>

<?php include_once "template-parts/front-page/hero-section.php"; ?>

<section class="galerie">

    <?php include_once "template-parts/front-page/filters.php"; ?>

    <div class="galerie__photos">
        <?php
        $paged = 1;
        $gallery = array(
            'post_type' => 'photos',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',

            'paged' => $paged,
        );

        $query = new WP_Query($gallery);

        if ($query->have_posts()) {
            while ($query->have_posts()) : $query->the_post();
                get_template_part('/template-parts/single-photo');
            endwhile;
        }
        ?>
    </div>
    <div class="center-btn">
        <button class="cta-btn" id="load-more">Charger plus</button>
    </div>
</section>

<?php get_footer() ?>