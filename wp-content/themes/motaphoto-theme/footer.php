        
        <footer>
            <?php
            wp_footer(); ?>
            <div class="menu_footer">
                <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer']) ?>

            </div>
            <?php get_template_part('/template-parts/lightbox'); ?>
            
        </footer>
    </body>
</html>