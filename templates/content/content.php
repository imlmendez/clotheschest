<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

	// S'hauria d'aprofitar tant per l'slider com pel loop de la pagina d'ofertes
	$post_date_start = get_post_meta($post->ID,"post_date_start",true);
	$post_date_start = DateTime::createFromFormat('Y-m-d H', $post_date_start . ' 12');

	$post_date_finish = get_post_meta($post->ID,"post_date_finish",true);
	$post_date_finish = DateTime::createFromFormat('Y-m-d H', $post_date_finish . ' 12');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="ofertes-events-container">
		<div class="post-thumbnail img-principal">
			<?php the_post_thumbnail(); ?>
                <div class="oferta-caducidad">
                    <?php get_template_part('templates/parts/caducidad') ?>
                </div>
		</div> 
		<!-- barra dies -->
        <?php if (has_category(array('ofertas','offers'))): ?>
        <div class="row">
            <div class="col-lg">
                <header class="entry-header">
                    <?php
                    if ( is_single() ) :
                        the_title( '<h2 class="entry-title title-events-ofertes">', '</h2>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    ?>
                </header><!-- .entry-header -->
                <?php if ($post_date_start && $post_date_finish): ?>
                    <div class="oferta-date">
                        <?php echo date_i18n(_x('j \d\e F \d\e Y','format  data','clotheschest'),$post_date_start->getTimestamp()) . " - " . date_i18n(_x('j \d\e F \d\e Y','format  data','clotheschest'),$post_date_finish->getTimestamp()) ?>
                    </div>
                <?php endif; ?>
                <div class="entry-content content-events-ofertes">
                    <?php
                    if ( is_single() ) :
                        the_content();
                    else :
                        the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'clotheschest' ) );
                    endif;

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'clotheschest' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            </div>
            <div class="col-lg-auto logo-oferta-container">
                <?php
                $shop = get_post_meta($post->ID,"shop_post",true);

                if ($shop && ($tiendas_logo = get_post_meta($shop,'tiendas_logo',true))): ?>
                        <a href="<?php echo get_the_permalink($shop) ?>">
                    <div class="logo-oferta">
                            <?php echo wp_get_attachment_image($tiendas_logo,'full',false,array('alt'=>get_the_title($shop))); ?>
                    </div>
                        </a>
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>
            <header class="entry-header">
                <?php
                if ( is_single() ) :
                    the_title( '<h2 class="entry-title title-events-ofertes">', '</h2>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

                ?>
            </header><!-- .entry-header -->
            <?php if ($post_date_start && $post_date_finish): ?>
                <div class="oferta-date">
                    <?php echo date_i18n(_x('j \d\e F \d\e Y','format  data','clotheschest'),$post_date_start->getTimestamp()) . " - " . date_i18n(_x('j \d\e F \d\e Y','format  data','clotheschest'),$post_date_finish->getTimestamp()) ?>
                </div>
            <?php endif; ?>
            <div class="entry-content content-events-ofertes">
                <?php
                if ( is_single() ) :
                    the_content();
                else :
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'clotheschest' ) );
                endif;

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'clotheschest' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
        <?php endif; ?>
	</div>
</article><!-- #post-## -->
