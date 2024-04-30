<?php get_header() ?>

<?php include_once "template-parts/front-page/hero-section.php"; ?>

<section class="galerie">
    
    <?php include_once "template-parts/front-page/filters.php"; ?>
    
    <div class="galerie__photos">
        <?php include_once "template-parts/front-page/galerie-single.php"; ?>
    </div>

</section>

<?php get_footer() ?>