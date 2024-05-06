<?php get_header() ?>

<main class="main">

    <?
    $reference = get_field('reference');
    $type = get_field('type');
    // 
    $post_id = get_the_ID();
    $year = get_the_date('Y', $post_id);
    $title = get_the_title($post_id);
    // Taxonomies
    $categories = get_the_terms(get_the_ID(), 'categorie');
    $formats = get_the_terms(get_the_ID(), 'format');
    // Post-single navigation
    $previousPost = get_previous_post();
    $nextPost = get_next_post();
    ?>
    <section class="">
        <div class="box">
            <div class="custom-field-container">
                <h2 class="acf acf__title"><?php echo $title ?></h2>
                <ul>
                    <li class="acf acf__reference">référence : <span id="ref-value"><?php echo $reference ?></span></li>
                    <li class="acf acf__categorie">categorie : <?php if ($categories) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <?php echo $category->name; ?>
                            <?php endforeach; ?>
                        <?php endif; ?></li>
                    <li class="acf acf__format">format : <?php if ($formats) : ?>
                            <?php foreach ($formats as $format) : ?>
                                <?php echo $format->name; ?>
                            <?php endforeach; ?>
                        <?php endif; ?></li>
                    <li class="acf acf__type">type : <?php echo $type ?></li>
                    <li class="acf acf__annee">année : <?php echo $year ?></li>
                </ul>
            </div>

            <div class="post_image">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(array(500, 500)); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail" />
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
        </div>

        <!-- post content -->
        <div class="post__single--content">
            <!-- contact -->
            <div class="post__single--contact">
                <p>Cette photo vous intéresse ? </p>
                <button class="cta-btn contact-btn contact">Contact</button>
            </div>
            <div class="post__single--navigation">
                <div class="nav-links">

                    <? if ($previousPost) : ?>
                        <?php $previousPhoto = get_field('photo', $previousPost->ID); ?>
                        <a class="nav-subtitle nav-previous" href="<?php echo get_permalink($previousPost); ?>" class="arrow-link arrow-left">←</a>
                        <div class="nav-photos nav-photos-prev">
                            <img src="<?php echo get_the_post_thumbnail_url($previousPost->ID, array(80, 80)) ?>" alt="">
                        </div>
                    <? endif ?>
                    <? if ($nextPost) : ?>
                        <?php $nextPhoto = get_field('photos', $nextPost->ID); ?>
                        <a class="nav-subtitle nav-next" href="<?php echo get_permalink($nextPost); ?>" class="arrow-link arrow-left">→</a>
                        <div class="nav-photos nav-photos-next">
                            <img src="<?php echo get_the_post_thumbnail_url($nextPost->ID, array(80, 80)) ?>" alt="">
                        </div>
                    <? endif ?>
                </div>




            </div>
        </div>
    </section>
    <section class="section_aimerezaussi">
        <h3> Vous aimerez aussi </h3>
        <?php
        // On place les critères de la requête dans un Array
        $cats = array_map(function ($terms) {
            return $terms->term_id;
        }, get_the_terms(get_post(), 'categorie'));
        $args = array(
            'post__not_in' => [get_the_ID()],
            'order_by_rand' => 'rand',
            'posts_per_page' => 2,
            'post_type' => 'photos',
            'tax_query' => [
                [
                    'taxonomy' => 'categorie',
                    'terms' => $cats,
                ]
            ]
        );
        //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
        $query = new WP_Query($args);
        ?>
        <div class="photo_aleatoire">
            <!-- //On vérifie si le résultat de la requête contient des articles -->
            <?php if ($query->have_posts()) : ?>

                <!-- //On parcourt chacun des articles résultant de la requête -->
                <?php $count = 0;
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('/template-parts/single-photo');
                    endwhile;
                } else {
                ?> <p> Cette catégorie n'a pas d'autres photos. </p> <?php
                                                                    }
                                                                    wp_reset_postdata();
                                                                        ?>
        </div>
    <?php else : ?>
        <p>Désolé, aucun article ne correspond à cette requête</p>
    <?php endif;
            wp_reset_query();
    ?>
    </section>
    <div class="center-btn">
        <a href="<?php echo esc_url(home_url()); ?>">
            <button class="cta-btn cta-home">Toutes les photos</button>
        </a>
    </div>
    <script>
        const reference = document.getElementById("ref-value").innerText;
        document.getElementById("ref-photo-contact").value = reference;
    </script>

</main>


<?php get_footer() ?>