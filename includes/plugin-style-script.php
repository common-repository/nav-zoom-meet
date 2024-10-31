<?php 
/************* Plugin functions **********************/
function nzmpnt_backend_style_script() {
    wp_enqueue_style('nzmpnt-main',NZMPNT_PLUGIN_PATH.'css/nzm.css',array(),'1.0.0');
    wp_enqueue_style('nzmpnt-jquery-ui',NZMPNT_PLUGIN_PATH.'css/jquery-ui.css',array(),'1.13.1');
    wp_enqueue_style('nzmpnt-jquery-timepicker',NZMPNT_PLUGIN_PATH.'css/jquery.timepicker.min.css',array(),'1.3.5');
    wp_enqueue_style('nzmpnt-dataTables',NZMPNT_PLUGIN_PATH.'css/jquery.dataTables.min.css',array(),'1.11.3');
    wp_enqueue_script('nzmpnt-bootstrap',NZMPNT_PLUGIN_PATH.'js/bootstrap.min.js',array(),'5.1.3');
    wp_enqueue_script('nzmpnt-jquery-ui',NZMPNT_PLUGIN_PATH.'js/jquery-ui.js', array('jquery'),'1.13.1');
    wp_enqueue_script('nzmpnt-jquery-timepicker',NZMPNT_PLUGIN_PATH.'js/jquery.timepicker.min.js', array('jquery'),'1.3.5');
    wp_enqueue_script('nzmpnt-dataTables',NZMPNT_PLUGIN_PATH.'js/jquery.dataTables.min.js', array('jquery'),'1.11.3');
    wp_enqueue_script('nzmpnt-main',NZMPNT_PLUGIN_PATH.'js/nzm.js', array('jquery'),'1.0.0');
    wp_localize_script('nzmpnt-main', 'nzmpnt_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php'))); 
    wp_enqueue_style( 'nzmpnt-font-awesome',NZMPNT_PLUGIN_PATH.'css/fontawesome.min.css',array(),'5.15.4');
    wp_enqueue_style( 'nzmpnt-solid.min',NZMPNT_PLUGIN_PATH.'css/solid.min.css',array(),'5.15.4');
    wp_enqueue_style( 'nzmpnt-bootstrap',NZMPNT_PLUGIN_PATH.'css/bootstrap.min.css',array(),'5.1.3');   
}

/******** to call css & js on frontend *****************/
function nzmpnt_frontend_style_script() {
    wp_enqueue_style('nzmpnt-frontend',NZMPNT_PLUGIN_PATH.'css/nzm-frontend.css',array(),'1.0.0');
    wp_enqueue_style('nzmpnt-jquery-ui',NZMPNT_PLUGIN_PATH.'css/jquery-ui.css',array(),'1.13.1');
    wp_enqueue_style('nzmpnt-jquery-timepicker',NZMPNT_PLUGIN_PATH.'css/jquery.timepicker.min.css',array(),'1.3.5');
    wp_enqueue_script('nzmpnt-jquery-ui',NZMPNT_PLUGIN_PATH.'js/jquery-ui.js', array('jquery'),'1.13.1');
    wp_enqueue_script('nzmpnt-jquery-timepicker',NZMPNT_PLUGIN_PATH.'js/jquery.timepicker.min.js', array('jquery'),'1.3.5');
    wp_enqueue_script('nzmpnt-frontend',NZMPNT_PLUGIN_PATH.'js/nzm-frontend.js',array(),'1.0.0');
    wp_localize_script('nzmpnt-frontend', 'nzmpnt_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));     
}
add_action( 'wp_enqueue_scripts', 'nzmpnt_frontend_style_script' );

?>