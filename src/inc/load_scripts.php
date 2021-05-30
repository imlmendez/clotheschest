<?php

function theme_enqueue_styles() {

    wp_register_style( 'main', get_template_directory_uri() .'/css/main.css', false, '1.0' );
    wp_enqueue_style( 'main' ); 
    wp_register_style( 'font_file', get_template_directory_uri() .'/src/fonts/font_file.css', false, '1.0' );
	wp_enqueue_style( 'font_file' );/* font del tema */

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 25 );


// Register Script
function custom_scripts() {

    wp_enqueue_script('jquery');


    wp_deregister_script( 'utils' );
	wp_register_script( 'utils', get_template_directory_uri() .'/src/js/utils.js','',time());
    wp_enqueue_script( 'utils' );

	wp_deregister_script( 'global' );
	wp_register_script( 'global', get_template_directory_uri() .'/src/js/global.js','',time());
    wp_enqueue_script( 'global' );

    wp_localize_script( 'global', 'ajax', array(
            'url' => admin_url( 'admin-ajax.php' )
        )
    );

	wp_enqueue_script('popper',get_template_directory_uri() .'/src/js/popper.min.js',false);

	wp_deregister_script( 'bootstrap' );
	wp_register_script( 'bootstrap', get_template_directory_uri() .'/src/js/bootstrap.min.js', false);
    wp_enqueue_script( 'bootstrap' );

    wp_deregister_script( 'slick' );
	wp_register_script( 'slick', get_template_directory_uri() .'/src/js/slick.min.js', false);
    wp_enqueue_script( 'slick' );

    wp_deregister_script( 'aos' );
	wp_register_script( 'aos', get_template_directory_uri() .'/src/js/aos.js', false);
    wp_enqueue_script( 'aos' );

    wp_deregister_script( 'blowup' );
	wp_register_script( 'blowup', get_template_directory_uri() .'/src/js/blowup.min.js', false);
    wp_enqueue_script( 'blowup' );

    wp_deregister_script( 'jqueryui' );
	wp_register_script( 'jqueryui', get_template_directory_uri() .'/src/js/jquery-ui.min.js', false);
    wp_enqueue_script( 'jqueryui' );


//	wp_enqueue_script('sb-bundle',get_template_directory_uri() .'/src/js/sb.bundle.js', false);


    if(is_front_page() || is_home()){
        wp_enqueue_script('home',get_template_directory_uri() .'/src/js/home.js','',time());
    }
    if(is_404()){
        wp_enqueue_script('404',get_template_directory_uri() .'/src/js/404.js','',time());
    }

    if (is_page_template('templates/politica.php')) {
        wp_enqueue_script('politica',get_template_directory_uri() .'/src/js/politica.js','',time());
    }

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// change jQuery in template for CDN jQuery
function modify_jquery() {

	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', false, '3.4.1');
		wp_enqueue_script('jquery');

	}
	
}
add_action('init', 'modify_jquery');


/*********************** PUJADOR DE IMATGES *****************/

add_action('admin_enqueue_scripts', 'my_admin_scripts');

function my_admin_scripts() {

    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script('upload-file-js',get_template_directory_uri() .'/src/js/upload-file2.js', array('jquery'));

    global $typenow;
    if( ($typenow == 'catalogo') ) {
        wp_enqueue_media();

        wp_register_script( 'meta-image', get_template_directory_uri() . '/src/js/media-uploader.js', array( 'jquery' ) );
        wp_localize_script( 'meta-image', 'meta_image',
            array(
                'title' => 'Upload an Image',
                'button' => 'Use this Image',
            )
        );
        wp_enqueue_script( 'meta-image' );
    }
}


