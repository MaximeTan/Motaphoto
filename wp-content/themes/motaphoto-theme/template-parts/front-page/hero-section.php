<section class="hero">
    <div class="hero__banner">
        <?php query_posts(
            array(
                'post_type' => 'photos',
                'showposts' => 1,
                'orderby' => 'rand',
            )
        ); ?>
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <img class="hero__banner--image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" <?php endwhile;
                                                                                                                    endif; ?>>
                <img class="hero__banner--title" src="<?php echo get_template_directory_uri(); ?> '/assets/images/photoevent.png' " alt="photoevent">
    </div>
</section>