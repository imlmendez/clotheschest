<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header title-single-post">
		<?php
        the_title( '<h1 class="entry-title title title-subratllat">', '</h1>' );
        $page_subtitle = get_post_meta(get_the_ID(),'page_subtitle',true);
        if (!empty($page_subtitle)) {
            echo "<h2 class='subtitle'>".esc_html($page_subtitle)."</h2>";
        }
        ?>

	</header><!-- .entry-header -->
	<div class="entry-content">
	</div><!-- .entry-content -->


</article><!-- #post-## -->
