<?php
/**
 * Template Name: Home
 */

get_header();
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
    <!-- <div id="primary" class="content-area">
        <div id="main" class="site-main" role="main"> -->
            <!-- <h1 class="h1-seo">Welcome to the future of shopping</h1> -->
            <h3 class="h1-seo">Welcome to the future of shopping</h3>
             <video width="640" height="480" controls>
                <source src="<?php echo get_template_directory_uri().'/images/minvideo.mp4' ?>" type="video/mp4">
                Your browser does not support the video tag.
                </video>             
                
                 <ul class="products">
                    <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 4
                            );
                        $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) {
                            while ( $loop->have_posts() ) : $loop->the_post();
                                wc_get_template_part( 'content', 'product' );
                            endwhile;
                        } 
                        wp_reset_postdata();
                    ?>
                    </ul>
        <!-- </div>
    </div> -->
        </main>
    </section>

<?php
get_footer();
