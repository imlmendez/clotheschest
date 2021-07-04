<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
//get_template_part('templates/parts/cookies');

?>
</div>
<footer id="site-footer" class="site-footer" role="contentinfo">
<!-- <footer id="site-footer" class="site-footer" > -->
<!-- <div id="site-footer" class="site-footer"  role="contentinfo" > -->

    <div class="content-footer">
        <p class="footer-info">Copyright 2021, clotheschest. <br><?php _e("Tots els drets reservats","clotheschest"); ?></p>
        <?php
            wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => '',
                'container_class' => 'menu-container legal-menu-container',
                'menu'         => "footer",
                'depth'           => 2,
            ));
        ?>
    </div>    
    <div class="social-links">
        <a class="social-link" target="_blank" href=""><i class="icon-instagram"></i></a>
        <a class="social-link" target="_blank" href=""><i class="icon-facebook"></i></a>
        <a class="social-link" target="_blank" href=""><i class="icon-twitter"></i></a>
    </div>
<!-- </div> -->
</footer>
<?php
wp_footer(); 
?>

</body>
</html>
