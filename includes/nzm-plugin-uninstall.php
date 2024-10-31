<?php 
/****** register_uninstall_hook callback function start ************/
if(!function_exists('nzmpnt_plugin_uninstall')) {
function nzmpnt_plugin_uninstall()
{      
   if ( ! current_user_can( 'activate_plugins' ) )
   return;
   delete_option('nzmpnt_zoom_plan');
   delete_option('nzmpnt_zoom_token');
   delete_option('nzmpnt_zoom_user_email');
   delete_option('nzmpnt_zoom_timezone');
   delete_option('nzmpnt_wstart_time');
   delete_option('nzmpnt_wend_time');
   delete_option('nzmpnt_slot_duration');
   delete_option('nzmpnt_plugin_custom_css');
} 
}

/****** register_uninstall_hook callback function end ************/
?>