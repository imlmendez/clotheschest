<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found container">
				<header class="page-header row">
					<div class="col-12">
						<div class="img-404">
							<?php echo file_get_contents(get_template_directory_uri().'/images/4.svg'); ?>  
							<img class="img-404" src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="404" />
							<?php echo file_get_contents(get_template_directory_uri().'/images/4.svg'); ?>  
						</div>
						<div class="texto-404">
							<h1><?php _e('Ups, sembla que alguna cosa ha anat malament.','clotheschest');?> </h1>
							<div class="bttn">
								<a href="<?php echo esc_url( home_url( '/' )); ?>" class="bttn-404"><?php _e("Tornar a l'inici","clotheschest");?></a>
							</div>
						</div>
					
					</div>
				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
include('analytics.php');
wp_footer(); 
