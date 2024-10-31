<?php
$nzmpnt_zoom_token = '';
if(!empty(get_option('nzmpnt_zoom_token'))){
  $nzmpnt_zoom_token = get_option('nzmpnt_zoom_token');
}
$nzmpnt_zoom_user_email = '';
if(!empty(get_option('nzmpnt_zoom_user_email'))){
  $nzmpnt_zoom_user_email = get_option('nzmpnt_zoom_user_email');
}
$nzmpnt_wstart_time = '';
if(!empty(get_option('nzmpnt_wstart_time'))){
  $nzmpnt_wstart_time = get_option('nzmpnt_wstart_time');
}
$nzmpnt_wend_time = '';
if(!empty(get_option('nzmpnt_wend_time'))){
  $nzmpnt_wend_time = get_option('nzmpnt_wend_time');
}
$nzmpnt_slot_duration = '';
if(!empty(get_option('nzmpnt_slot_duration'))){
  $nzmpnt_slot_duration = get_option('nzmpnt_slot_duration');
}
define('NZMPNT_ZOOM_TOKEN',$nzmpnt_zoom_token);
define('NZMPNT_ZOOM_USER_EMAIL',$nzmpnt_zoom_user_email);
define('NZMPNT_WSTART_TIME',$nzmpnt_wstart_time);
define('NZMPNT_WEND_TIME',$nzmpnt_wend_time);
define('NZMPNT_SLOT_DURATION',$nzmpnt_slot_duration);
?>