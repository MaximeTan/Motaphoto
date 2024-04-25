<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathalie Mota</title>
    <?php wp_head(); ?>
</head>
    <body>
        <header>
        <div class="home-bar">
            <button class="nav-toggler" type="button" aria-label="toggle curtain navigation">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>
        </div>
        <?php the_custom_logo()  ?>

        <nav id="header">
            <?php wp_nav_menu(array('theme_location' => 'header')); ?>
        </nav>



        <?php include_once "template-parts/modale.php"; ?>
        </header>

