<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

$categories = get_the_category();
$date = get_the_date('d / m / Y');

$author = get_post_meta($post->ID,'author',true);

$class_author = "";

if($author!=''){ //per aplicar estils al primer paragraf
    $class_author = "author";                   
}

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="container">
            </article><!-- #post-## -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
