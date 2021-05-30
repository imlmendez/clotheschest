<?php


add_action("admin_init", "add_page");
add_action('save_post_page', 'update_page_meta');
function add_page(){
    add_meta_box("page_details", "Subtítulo", "page_options", "page", "normal", "high");
}
function page_options(){
    global $post;
    $page_subtitle = get_post_meta($post->ID,'page_subtitle',true);



    ?>
    <div id="tiendas-options">
        <ul>

            <li style="float:left; margin-right:20px; margin-top:5px; margin-bottom:15px;"><label style="display:block;"><b>Subtítulo:</b> </label><input name="page_subtitle" value="<?php echo esc_attr($page_subtitle); ?>" />&nbsp;&nbsp;</li>



        </ul>
        <div style="clear:both;"></div>

        <!-- fi nova part -->

    </div><!--end portfolio-options-->
    <?php
}

function update_page_meta() {
    global $post;

    if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit'])) return;

    update_post_meta($post->ID, "page_subtitle", $_POST["page_subtitle"]);
}