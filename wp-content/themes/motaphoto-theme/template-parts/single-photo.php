
<div class="galerie__photos--single" data-photo-src="<?php echo get_the_post_thumbnail_url(); ?>" 
                            data-photo-prev="<?php echo esc_url(get_permalink(get_previous_post())); ?>" 
                            data-photo-next="<?php echo esc_url(get_permalink(get_next_post())); ?>"
                            data-photo-ref="<?php echo esc_attr(get_field('reference')); ?>"
                            data-photo-categorie="<?php echo esc_attr(get_the_terms(get_the_ID(), 'categorie')[0]->name); ?>">
    <img class="photo-single" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Photo">
    <div class="fadedbox">
        <a class="fadedbox__eye icon"href="<?php echo get_the_permalink(); ?>" >
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eye.png" alt="Ouvrir la page de la photo">
        </a>
        <img class="fadedbox__fullscreen icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen.png" alt="Voir l'image en plein écran">
        <p class="fadedbox__ref fadedbox__text"><?php echo esc_attr(get_field('reference')); ?></p>
        <p class="fadedbox__cat fadedbox__text"><?php echo get_the_terms(get_the_ID(), 'categorie')[0]->name; ?></p>
    </div>
</div>