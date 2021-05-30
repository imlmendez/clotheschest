<?php 

/* PLUGINS REQUIRED  THEME */

add_action('admin_notices', 'showAdminMessages');

function showAdminMessages()
{
    $plugin_messages = array();
    $aRequired_plugins = array();

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    $aRequired_plugins = array(
                                array('name'=>'WP Rocket', 'download'=>'', 'path'=>'wp-rocket/wp-rocket.php'),
                                array('name'=>'Yoast SEO', 'download'=>'', 'path'=>'wordpress-seo/wp-seo.php'),
                                //array('name'=>'Optimus HD', 'download'=>'', 'path'=>'optimus/optimus.php'), 
                                array('name'=>'Imagify', 'download'=>'', 'path'=>'imagify/imagify.php'),                      
    );

    foreach($aRequired_plugins as $aPlugin){
        // Check if plugin exists
        if(!is_plugin_active( $aPlugin['path'] ))
        {
            $plugin_messages[] = $aPlugin['name'];
        }
    }

    if(count($plugin_messages) > 0)
    {
        echo '<div class="notice notice-error">';
        echo '<br>'.'Este tema necessita los siguientes plugins:'.'<br>';
        echo '<ul>';

            foreach($plugin_messages as $message)
            {
                echo '<li>- '.$message.'</li>';
            }

        echo '<br>'.'</ul></div>';
    }

}