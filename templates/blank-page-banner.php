<?php
/**
 * Template Name: Blank with Container Banner
 */

get_header();
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main <?php echo $post->post_name; ?>" role="main">
            <div class="container">
                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'templates/content/content', 'notitle' );
                endwhile; // End of the loop.
                ?>
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->
         

<?php
get_footer();
