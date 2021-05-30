<?php

//GOOGLE Analytics
global $analytics;
$enable_analytics = 'yes';  //$enable_analytics = yes / $enable_analytics = no . Change this parameter if analytics code is active in analytics.php

if($enable_analytics == 'no'){
    //misatge a la administracio que falta el codi analytics aquest codi s'ha de posar a analytics.php y modificar el valor de la variable.
    function google_notice(){
        echo '<div class="notice notice-error"><br>Falta el código de GOOGLE Analytics en el fichero analtytics.php<br><br></div>';
    }
    add_action('admin_notices', 'google_notice');
}


//Definir THUMBNAILS
/*add_image_size( 'eventos-y-promos', 362, 175 );*/
add_image_size('single-tiendas',500,500,array('center','center'));
add_image_size('evento-home',425,425,array('center','center'));
add_image_size('reforma',208,208,array('center','center'));
add_image_size('reforma-ficha',945,900,array('center','center'));


// Inicialitzar el tema, dominis de traducció, etc
include_once(get_stylesheet_directory() . '/src/inc/initialization.php');

// Carregar scripts js i css i concatenar el style.css
include_once(get_stylesheet_directory() . '/src/inc/load_scripts.php');

/**
 * Register widget area.
**/
function wp_bootstrap_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'clotheschest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'clotheschest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'clotheschest' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'clotheschest' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'clotheschest' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'clotheschest' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Mensaje cookies', 'clotheschest' ),
        'id'            => 'popup-cookies',
        'description'   => esc_html__( 'Add widgets here.', 'clotheschest' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );



/**
 * Custom template tags.
 */
require get_template_directory() . '/src/inc/template-tags.php';

/**
 * Carregar compatibilitat amb plugins
 */
require get_template_directory() . '/src/inc/plugin-compatibility.php';

/**
 * Converteix menú de Wordpress en menú de Bootstrap.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/src/inc/wp_bootstrap_navwalker.php');
}

/**
 * Avis plugins necessaris del tema
 */
include_once(get_stylesheet_directory() . '/src/inc/required-plugins.php');

/**
 * Modificacions de seguretat
 */
include_once(get_stylesheet_directory() . '/security.php');


/**
 * Load Custom Post Types
 */


/***********************************
 * Button functions for all themes *
 **********************************/


//FUNCIONS UTILS PER TEXT//
// funcio per seleccionar un limit de paraules
function string_limit_words($string, $word_limit) {
    return wp_trim_words($string, $word_limit);
}


//FUNCIONS UTILS PER IMATGES//
// Ruta de la imagen destacada. Retorna la url completa
function featured_image_page(){
  global $post;
  $thumbID = get_post_thumbnail_id( $post->ID );
  $imgDestacada = wp_get_attachment_url( $thumbID );
  return $imgDestacada;
}






function paginate($query){

    $big = 999999999; // need an unlikely integer

    echo '<nav class="wp-navi" >';

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $query->max_num_pages,
        'prev_text'    => __('<span>&lt;</span>'),
        'next_text'    => __('<span>&gt;</span>'),
    ) );

    wp_reset_postdata();
    $query = null;
    echo '</nav>';

}






function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

//add custom styles to the WordPress editor
function my_custom_styles( $init_array ) {
    $style_formats = array(
        // These are the custom styles
        array(
            'title' => 'Numeració Títol',
            'block' => 'span',
            'classes' => 'clotheschest-numbers',
            'wrapper' => true,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );



add_filter( 'register_post_type_args', 'activar_bloques_ctp', 10, 2 );

function activar_bloques_ctp( $args, $post_type ) { 
 if ( 'tiendas' != $post_type &&  'restaurantes' != $post_type) 
    return $args;
    $args['show_in_rest'] =  true;
 return $args;
}

 /**
 * Funcions especifiques només per aquest tema
 */
include_once(get_stylesheet_directory() . '/src/inc/special-functions.php');


