<?php 
/************* Plugin functions **********************/
if(!function_exists('nzmpnt_plugin_menu')) {
function nzmpnt_plugin_menu() {
    add_menu_page( 'Zoom Meet', 'Zoom Meet', 'manage_options', 'zoom-setting', 'nzmpnt_zoomSetting' );
    add_submenu_page( 'zoom-setting', 'Upcoming Meetings', 'Upcoming Meeting', 'manage_options', 'meeting_list', 'nzmpnt_upcoming_meeting');
    add_submenu_page( 'zoom-setting', 'Past Meetings', 'Past Meeting', 'manage_options', 'past_meeting', 'nzmpnt_past_meeting');
}
}

if(!function_exists('nzmpnt_zoomSetting')) {
function nzmpnt_zoomSetting() {
    if(!current_user_can('manage_options')){
     wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    nzmpnt_backend_style_script(); 
    include(NZMPNT_PLUGIN_ABS_PATH.'includes/nzm-main.php');
}
}

if(!function_exists('nzmpnt_upcoming_meeting')) {
function nzmpnt_upcoming_meeting(){
    if(!current_user_can('manage_options')){
     wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    nzmpnt_backend_style_script();
    if(isset($_REQUEST['id'])){
       $id = sanitize_text_field($_REQUEST['id']);
       include(NZMPNT_PLUGIN_ABS_PATH.'includes/nzm-meeting-single.php');
    }else{ 
       include(NZMPNT_PLUGIN_ABS_PATH.'includes/nzm-meeting.php');
    }
}
}

if(!function_exists('nzmpnt_past_meeting')) {
function nzmpnt_past_meeting(){
    if(!current_user_can('manage_options')){
     wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    nzmpnt_backend_style_script();
    if(isset($_REQUEST['id'])){
       $id = sanitize_text_field($_REQUEST['id']);
       include(NZMPNT_PLUGIN_ABS_PATH.'includes/nzm-meeting-single.php');
    }else{ 
       include(NZMPNT_PLUGIN_ABS_PATH.'includes/nzm-past-meeting.php');
    }
}
}


if(!function_exists('nzmpnt_admin_warning')) {
function nzmpnt_admin_warning(){ 
    $errMessage = '';
    ?>
    <div class="error">
    <?php if(empty(get_option('nzmpnt_zoom_plan'))){ $errMessage .= "Zoom Plan, "; } 
    if(empty(get_option('nzmpnt_zoom_token'))){  $errMessage .= "Zoom JWT Token, "; } 
    if(empty(get_option('nzmpnt_zoom_user_email'))){ $errMessage .= "Zoom user email, ";  } 
    if(empty(get_option('nzmpnt_zoom_timezone'))){ $errMessage .= "Timezone, "; } 
    if(empty(get_option('nzmpnt_wstart_time'))){ $errMessage .= "Start Time, "; } 
    if(empty(get_option('nzmpnt_wend_time'))){ $errMessage .= "End Time, "; } 
    if(empty(get_option('nzmpnt_slot_duration'))){ $errMessage .= "Slot duration "; }
    if(!empty($errMessage)){ $errMessage .= "is required."; }?>
    <p><span style="color:red;">Alert from NZM Plugin: </span><?php _e( $errMessage, 'my-text-domain' ); ?></p>
    </div>
   <?php 
}
}

?>