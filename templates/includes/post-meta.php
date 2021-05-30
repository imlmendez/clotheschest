<?php

/* opciones telf,url, planta, locla y del portfolio */
add_action("admin_init", "add_wpost");
add_action('save_post_post', 'update_wpost');
function add_wpost(){
    add_meta_box("wpost_details", "Campos Single Post", "wpost_meta_data", "post", "normal", "low");
}

function wpost_meta_data() {
    global $post;
    $author = get_post_meta($post->ID,"author",true);

    ?>
    <div id="wpost-options">
        <ul>
            <li style="float:left; margin-right:20px; margin-top:5px; margin-bottom:15px;width:100%;">
                <label style="display:block;"><b>Té frase inicial amb on es va publicar? (opcional):</b> </label>
                <input type="checkbox" value="author" name="author" <?php if( $author == true ) { ?>checked="checked"<?php } ?> />
            </li>
        </ul>
        <div style="clear:both;"></div>
    </div><!--end portfolio-options-->
    <?php
}

function update_wpost(){
    global $post;

    if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || ( defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']) ) return;

    update_post_meta($post->ID, "author", $_POST["author"]);

}
