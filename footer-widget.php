<div id="footer-widget" class="container footer-content">
    <div class="row">

                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-lg-4 col-class"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <?php endif; ?>
                    <div class="col-lg-4 col-class col-mapa">
                        <h2 class="title"><?php _e('Mapa web','clotheschest'); ?></h2>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'site-map',
                            'depth'           => 1,
                        ));
                        ?>
                    </div>
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-lg-4 col-horaris"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                    <?php endif; ?>

    </div>
</div>