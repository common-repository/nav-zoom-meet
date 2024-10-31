<?php 
/************* Create Meeting Frontend Ajax function **********************/
add_action( 'wp_ajax_nzmpnt_createMeeting_submit', 'nzmpnt_createMeeting_submit' );
add_action( 'wp_ajax_nopriv_nzmpnt_createMeeting_submit', 'nzmpnt_createMeeting_submit' );
if(!function_exists('nzmpnt_createMeeting_admin')) {
function nzmpnt_createMeeting_submit(){
    $zoomplan = sanitize_text_field($_POST['zoomplan']);
    $form_firstname = sanitize_text_field($_POST['form_firstname']);
    $form_lastname = sanitize_text_field($_POST['form_lastname']);
    $form_email = sanitize_email($_POST['form_email']);
    $form_subject = sanitize_text_field($_POST['form_subject']);
    $form_date = sanitize_text_field($_POST['form_date']);
    $form_time = sanitize_text_field($_POST['form_time']);

    $fulltime = esc_html($form_date)."T".esc_html($form_time).":00";
    $jwt_token = NZMPNT_ZOOM_TOKEN;
    $zoom_user_id = NZMPNT_ZOOM_USER_EMAIL;
    $slot_duration = NZMPNT_SLOT_DURATION;
    $pass = rand(100001,999999);

    $para = array(
          'topic'     =>esc_html($form_subject),
          'start_time'  =>esc_html($fulltime),
          'duration'   =>esc_html($slot_duration),
          'password'    =>esc_html($pass),
          'type'   => '2',
          'settings' => array("approval_type"=>"1","join_before_host"=> "true"),
        );
    $register_para = array(
          'first_name' => esc_html($form_firstname),
          'last_name' => esc_html($form_lastname),
          'email' => esc_html($form_email),
          'auto_approve' => true
        );
    $fulltimez = $fulltime."Z";
    $checkMeet = nzmpnt_get_meeting_scheduled($fulltimez);

    if($checkMeet == 0){
      $meet_id = nzmpnt_wpapi_createMeeting($para);
      if(!empty($meet_id->id)){
        $mid = $meet_id->id;
        $join_urll = $meet_id->join_url;
        $meeting_topic = $meet_id->topic;
        if($zoomplan != 1){
          $res = nzmpnt_wpapi_addMeetingRegistar($register_para, $mid);
          $response = json_decode($res);
          if($response->success){
            echo json_encode(array('success'=>true, 'message'=>__('Meeting Created Successfully. Please Check Your Email')));
          }else{
            echo $res;
          }
        }else if($zoomplan == 1){
            $to = $form_email;
            $subject = 'Congratulations! Your Meeting is Scheduled!!';
            $message = 'Dear '.esc_html($form_firstname).' '.esc_html($form_lastname).',<br><br>Congratulations!<br><br>This is to confirm the booking of your meeting as per the time and date specified by you.<br><br>Details of zoom call-<br> 
                      Meeting ID: '.esc_html($mid).'<br>
                      Meeting Topic: '.esc_html($meeting_topic).'<br>
                      Join Url: '.esc_url($join_urll).'<br>
                      Meeting Start Time: '.esc_html(date("d-m-Y H:i",strtotime($fulltime))).'<br>
                      Meeting Duration: '.esc_html($slot_duration).' minutes<br><br> 
                      Look forward to seeing you.';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($to, $subject, $message, $headers);

            /*************** Meeting Email to admin ************************/
            $to = get_option('admin_email');
            $subject = 'Meeting Scheduled by '.esc_html($form_firstname).' '.esc_html($form_lastname).': '.esc_html(date("d/m/Y H:i",strtotime($fulltime)));
            $message = 'Hello Admin,<br><br>
                      ALERT- Meeting Scheduled just now.
                      <br><br>
                      Scheduled Person name- '.esc_html($form_firstname).' '.esc_html($form_lastname).'
                      <br><br>Details of meeting zoom call--<br>Date: '.esc_html(date("d/m/Y",strtotime($fulltime))).'<br>Time: '.esc_html(date("H:i",strtotime($fulltime))).'<br>Meeting ID: '.esc_html($mid).'<br>Meeting Topic: '.esc_html($meeting_topic).'<br>Join Url: '.esc_html($join_urll).'<br>Meeting Duration: '.esc_html($slot_duration).' minutes<br><br>Person details--<br>Email: '.esc_html($form_email).'<br>Name: '.esc_html($form_firstname).' '.esc_html($form_lastname);
          $headers = array('Content-Type: text/html; charset=UTF-8');
          wp_mail($to, $subject, $message, $headers);
          echo json_encode(array('success'=>true, 'message'=>__('Meeting Created Successfully. Please Check Your Emails')));
        }
      }else{
          echo json_encode(array('code'=>false, 'message'=>__('Meeting not created. Something went wrong')));
      }
    }else if($checkMeet == 1){
      echo json_encode(array('code'=>false,'message'=>__('Meeting already Scheduled on this time. Check other time')));
    }
  wp_die();
}
}

/************* Create Meeting Ajax function **********************/
add_action( 'wp_ajax_nzmpnt_createMeeting_admin', 'nzmpnt_createMeeting_admin' );
add_action( 'wp_ajax_nopriv_nzmpnt_createMeeting_admin', 'nzmpnt_createMeeting_admin' );
if(!function_exists('nzmpnt_createMeeting_admin')) {
function nzmpnt_createMeeting_admin(){
    $form_password = sanitize_text_field($_POST['form_password']);
    $form_subject = sanitize_text_field($_POST['form_subject']);
    $form_date = sanitize_text_field($_POST['form_date']);
    $form_time = sanitize_text_field($_POST['form_time']);

    $fulltime = $form_date."T".$form_time.":00";
    $slot_duration = NZMPNT_SLOT_DURATION;
    $pass = rand(100001,999999);
    if(empty($form_password)){ $form_password = $pass; }

    $para = array(
          'topic'     =>esc_html($form_subject),
          'start_time'  =>esc_html($fulltime),
          'duration'   =>esc_html($slot_duration),
          'password'    =>esc_html($form_password),
          'type'   => '2',
          'settings' => array("approval_type"=>"1","join_before_host"=> "true"),
        );

    $meet_id = nzmpnt_wpapi_createMeeting($para);
    if(!empty($meet_id->id)){
        echo json_encode(array('success'=>true, 'message'=>__('Meeting Created Successfully. Please Add Participant')));
    }else{
        echo json_encode(array('success'=>false, 'message'=>__('Meeting not created. Something went wrong')));
    }
    wp_die();
}
}

/**************** Create Meeting on Zoom ****************************/
if(!function_exists('nzmpnt_wpapi_createMeeting')) {
function nzmpnt_wpapi_createMeeting($paramter){
    $jwt_token = NZMPNT_ZOOM_TOKEN;
    $url = "https://api.zoom.us/v2/users/me/meetings";
    $args = array(
      'body'    => json_encode($paramter),
      'headers' => array(
          'Authorization' => 'Bearer '.$jwt_token,
          'content-type' => 'application/json',
      ),
      'method' => 'POST',
    );
    $response = wp_remote_post( $url, $args );
    $http_code = wp_remote_retrieve_response_code( $response );
    $body = wp_remote_retrieve_body( $response );
    return json_decode($body);
}
}

/************* Update Meeting Ajax function **********************/
add_action( 'wp_ajax_nzmpnt_updateMeeting_admin', 'nzmpnt_updateMeeting_admin' );
add_action( 'wp_ajax_nopriv_nzmpnt_updateMeeting_admin', 'nzmpnt_updateMeeting_admin' );
if(!function_exists('nzmpnt_updateMeeting_admin')) {
function nzmpnt_updateMeeting_admin(){
    $mid = sanitize_text_field($_POST['mid']);
    $form_password = sanitize_text_field($_POST['form_password']);
    $form_subject = sanitize_text_field($_POST['form_subject']);
    $form_date = sanitize_text_field($_POST['form_date']);
    $form_time = sanitize_text_field($_POST['form_time']);

    $fulltime = $form_date."T".$form_time.":00";
    $slot_duration = NZMPNT_SLOT_DURATION;
    $pass = rand(100001,999999);
    if(empty($form_password)){ $form_password = $pass; }

    $para = array(
          'topic'     =>esc_html($form_subject),
          'start_time'  =>esc_html($fulltime),
          'duration'   =>esc_html($slot_duration),
          'password'    =>esc_html($form_password),
          'type'   => '2',
          'settings' => array("approval_type"=>"1","join_before_host"=> "true"),
        );

    $meet_id = nzmpnt_wpapi_updateMeeting($para,$mid);

    if($meet_id == '204'){
      echo json_encode(array('success'=>true, 'message'=>__('Meeting Updated Successfully.')));
    }else{
      echo json_encode(array('success'=>false, 'message'=>__('Meeting not updated. Something went wrong')));
    }
    wp_die();

}
}

/****************** Update Meeting on Zoom ******************************/
if(!function_exists('nzmpnt_wpapi_updateMeeting')) {
function nzmpnt_wpapi_updateMeeting($paramter,$mid){
  $jwt_token = NZMPNT_ZOOM_TOKEN;
  $url = "https://api.zoom.us/v2/meetings/".$mid;
  $args = array(
    'body'    => json_encode($paramter),
    'timeout'     => '5',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers' => array(
        'Authorization' => 'Bearer '.$jwt_token,
        'content-type' => 'application/json',
    ),
    'method' => 'PATCH',
  );
 $response = wp_remote_post( $url, $args );
 $http_code = wp_remote_retrieve_response_code( $response );
 return $http_code;
}
}

/******************** Add More Participant in the meeting ********************************/
add_action( 'wp_ajax_nzmpnt_addRegistrant', 'nzmpnt_addRegistrant' );
add_action( 'wp_ajax_nopriv_nzmpnt_addRegistrant', 'nzmpnt_addRegistrant' );
if(!function_exists('nzmpnt_addRegistrant')) {
function nzmpnt_addRegistrant(){
  $mid = sanitize_text_field($_POST['mid']);
  $form_firstname = sanitize_text_field($_POST['form_firstname']);
  $form_lastname = sanitize_text_field($_POST['form_lastname']);
  $form_email = sanitize_email($_POST['form_email']);

  $register_para = array('first_name' => esc_html($form_firstname),'last_name' => esc_html($form_lastname),'email' => esc_html($form_email),'auto_approve' => true);
  if(!empty($mid)){
      echo nzmpnt_wpapi_addMeetingRegistar($register_para, $mid);
  }else{
        echo json_encode(array('success'=>false, 'message'=>__('Meeting ID is Empty. Something went wrong')));
  }
  wp_die();
}
}

/******************* Curl Add Participant in the meeting ******************/
if(!function_exists('nzmpnt_wpapi_addMeetingRegistar')) {
function nzmpnt_wpapi_addMeetingRegistar($paramter, $m_id){
  $jwt_token = NZMPNT_ZOOM_TOKEN;
  $url = "https://api.zoom.us/v2/meetings/".$m_id."/registrants";
  $args = array(
      'body'    => json_encode($paramter),
      'headers' => array(
          'Authorization' => 'Bearer '.$jwt_token,
          'content-type' => 'application/json',
      ),
      'method' => 'POST',
    );
    $response = wp_remote_post( $url, $args );
    $http_code = wp_remote_retrieve_response_code( $response );
    $body = wp_remote_retrieve_body( $response );
    $presponse = json_decode($body);
    if($http_code == '201'){
      $result['success'] = true;
      $result['http_code'] = $http_code;
      $result['message'] = 'Participant Added Successfully';
    }else{
      $result['success'] = false;
      $result['http_code'] = $http_code;
      $result['message'] = '';
    }
  $result['response'] = $presponse;
  return json_encode($result);
}
}

/******************* get upcoming or past meeting list from zoom ******************/
if(!function_exists('nzmpnt_wpapi_getMeetingList')) {
function nzmpnt_wpapi_getMeetingList($type){
  $presponse = '';
  $jwt_token = NZMPNT_ZOOM_TOKEN;
  $zoom_user_id = sanitize_email(NZMPNT_ZOOM_USER_EMAIL);
  $url = "https://api.zoom.us/v2/users/".$zoom_user_id."/meetings/?page_size=300&type=".$type;
  $args = array(
    'headers' => array(
        'Authorization' => 'Bearer '.$jwt_token,
        'content-type' => 'application/json'
    )
  );
 $response = wp_remote_get( $url, $args );
 $http_code = wp_remote_retrieve_response_code( $response );
 $body = wp_remote_retrieve_body( $response );
 if($http_code == '200'){
   $presponse = json_decode($body);
   return $presponse;
 }else{
   return $presponse;
 }
}
}

/******************** getMeetingDetail Ajax ********************************/
add_action( 'wp_ajax_nzmpnt_getMeetingDetail', 'nzmpnt_getMeetingDetail' );
add_action( 'wp_ajax_nopriv_nzmpnt_getMeetingDetail', 'nzmpnt_getMeetingDetail' );
if(!function_exists('nzmpnt_getMeetingDetail')) {
function nzmpnt_getMeetingDetail(){
  $result = array();
  $mid = sanitize_text_field($_POST['mid']);
  $register_para = nzmpnt_wpapi_getMeetingDetails($mid);
    if(!empty($register_para)){
      $result['topic'] = $register_para->topic;
      $start_time = nzmpnt_format_time_from_UTC($register_para->start_time);
      $ex_starttime = explode(" ",$start_time);
      $result['start_date'] = $ex_starttime[0];
      $result['start_time'] = $ex_starttime[1];
      $result['password'] = $register_para->h323_password;
      echo json_encode(array('success'=>true, 'message'=>$result));
    }else{
      echo json_encode(array('success'=>false, 'message'=>'Meeting not fetch'));
    }
  wp_die();
}
}

/******************* get meeting details from zoom ******************/
if(!function_exists('nzmpnt_wpapi_getMeetingDetails')) {
function nzmpnt_wpapi_getMeetingDetails($mid){
  $presponse = '';
  $jwt_token = NZMPNT_ZOOM_TOKEN;
  $url = "https://api.zoom.us/v2/meetings/".$mid;
  $args = array(
    'headers' => array(
        'Authorization' => 'Bearer '.$jwt_token,
        'content-type' => 'application/json'
    )
  );
 $response = wp_remote_get( $url, $args );
 $http_code = wp_remote_retrieve_response_code( $response );
 $body = wp_remote_retrieve_body( $response );
 if($http_code == '200'){
   $presponse = json_decode($body);
   return $presponse;
 }else{
   return $presponse;
 }
}
}

/******************* get Registrant list from zoom ******************/
if(!function_exists('nzmpnt_wpapi_getRegistrant')) {
function nzmpnt_wpapi_getRegistrant($mid,$next_token){
  $presponse = '';
  $jwt_token = NZMPNT_ZOOM_TOKEN;
  if(!empty($next_token)){
    $url = "https://api.zoom.us/v2/meetings/".$mid."/registrants/?page_size=300&next_page_token=".$next_token;
  }else{
    $url = "https://api.zoom.us/v2/meetings/".$mid."/registrants/?page_size=300";
  }
  $args = array(
    'headers' => array(
        'Authorization' => 'Bearer '.$jwt_token,
        'content-type' => 'application/json'
    )
  );
 $response = wp_remote_get( $url, $args );
 $http_code = wp_remote_retrieve_response_code( $response );
 $body = wp_remote_retrieve_body( $response );
 if($http_code == '200'){
   $presponse = json_decode($body);
   return $presponse;
 }else{
   return $presponse;
 }
}
}

if(!function_exists('nzmpnt_get_full_registrant_list')) {
function nzmpnt_get_full_registrant_list($mid){
 $result = array(); 
 $next_page_token = '';
 do{
    $data = nzmpnt_wpapi_getRegistrant($mid,$next_page_token);
    if(!empty($data->registrants)){
      foreach($data->registrants as $step=>$val){
          array_push($result,$val);
      }
      $next_page_token = $data->next_page_token;
    }
 }while(!empty($next_page_token));

 return $result;
}
}

/************* Delete Meeting Ajax function **********************/
add_action( 'wp_ajax_nzmpnt_deleteMeeting_admin', 'nzmpnt_deleteMeeting_admin' );
add_action( 'wp_ajax_nopriv_nzmpnt_deleteMeeting_admin', 'nzmpnt_deleteMeeting_admin' );
if(!function_exists('nzmpnt_deleteMeeting_admin')) {
function nzmpnt_deleteMeeting_admin(){
    $mid = sanitize_text_field($_POST['mid']);
    echo nzmpnt_wpapi_deleteMeeting($mid);
    wp_die();
}
}

/****************** Delete Meeting on Zoom ******************************/
function nzmpnt_wpapi_deleteMeeting($mid){
  $result = array();
  $jwt_token = NZMPNT_ZOOM_TOKEN;
  $url = "https://api.zoom.us/v2/meetings/".$mid."/?cancel_meeting_reminder=true";
  $args = array(
    'headers' => array(
        'Authorization' => 'Bearer '.$jwt_token,
        'content-type' => 'application/json',
    ),
    'method' => 'DELETE',
  );
 $response = wp_remote_get( $url, $args );
 $http_code = wp_remote_retrieve_response_code( $response );
 if($http_code == '204'){
   $result['success'] = true;
   $result['message'] = 'Meeting Deleted Successfully';
 }else{
    $result['success'] = false;
    $result['message'] = 'Meeting not deleted';
 }
 return json_encode($result);
}

/**************** Check Meeting on same time **********************/
if(!function_exists('nzmpnt_get_meeting_scheduled')) {
  function nzmpnt_get_meeting_scheduled($start_time){
    $rest = 0;
    $res = nzmpnt_wpapi_getMeetingList('upcoming_meetings');
    if(!empty($res)){ $meetList = $res->meetings; }
    if(!empty($meetList)){
      foreach($meetList as $result){ 
        $s_time = nzmpnt_format_time_from_UTC($result->start_time);
        $st = str_replace(" ","T",$s_time).":00Z";
        if($start_time == $st){
          //echo $st ."==".$start_time."<br>";
          $rest = 1;
        }
      }
    }
    return $rest;
  }
}

/******************** Plugin Setting detail save function ajax ********************************/
add_action( 'wp_ajax_nzmpnt_savePluginSetting', 'nzmpnt_savePluginSetting' );
add_action( 'wp_ajax_nopriv_nzmpnt_savePluginSetting', 'nzmpnt_savePluginSetting' );
if(!function_exists('nzmpnt_savePluginSetting')) {
function nzmpnt_savePluginSetting(){
    $nzmpnt_zoom_plan = sanitize_text_field($_POST['nzmpnt_zoom_plan']);
    $nzmpnt_zoom_token = sanitize_text_field($_POST['nzmpnt_zoom_token']);
    $nzmpnt_zoom_user_email = sanitize_email($_POST['nzmpnt_zoom_user_email']);
    $nzmpnt_wstart_time = sanitize_text_field($_POST['nzmpnt_wstart_time']);
    $nzmpnt_wend_time = sanitize_text_field($_POST['nzmpnt_wend_time']);
    $nzmpnt_slot_duration = sanitize_text_field($_POST['nzmpnt_slot_duration']);
    $nzmpnt_zoom_timezone = sanitize_text_field($_POST['nzmpnt_zoom_timezone']);
    $nzmpnt_plugin_custom_css = sanitize_text_field($_POST['nzmpnt_plugin_custom_css']);
    update_option( 'nzmpnt_zoom_plan', esc_html($nzmpnt_zoom_plan) );
    update_option( 'nzmpnt_zoom_token', esc_html($nzmpnt_zoom_token) );
    update_option( 'nzmpnt_zoom_user_email', esc_html($nzmpnt_zoom_user_email) );
    update_option( 'nzmpnt_wstart_time', esc_html($nzmpnt_wstart_time) );
    update_option( 'nzmpnt_wend_time', esc_html($nzmpnt_wend_time) );
    update_option( 'nzmpnt_slot_duration', esc_html($nzmpnt_slot_duration) );
    update_option( 'nzmpnt_zoom_timezone', esc_html($nzmpnt_zoom_timezone) );
    update_option( 'nzmpnt_plugin_custom_css', esc_html($nzmpnt_plugin_custom_css) );

    echo json_encode(array('success'=>true, 'message'=>__('Updated Successfully...')));
    wp_die();
}
}

/****************** convert time ********************************/
/*function nzmpnt_convert_time_from_UTC($rdate){
    // create a $dt object with the UTC timezone
    $dt = new DateTime($rdate, new DateTimeZone('UTC'));
    $utc_date = DateTime::createFromFormat('Y-m-d G:i:s',$rdate,new DateTimeZone('UTC'));
    $acst_date = clone $utc_date; 
    if(!empty(get_option('nzmpnt_zoom_timezone'))){
      $nzmpnt_zoom_timezone = get_option('nzmpnt_zoom_timezone');
      $acst_date->setTimeZone(new DateTimeZone($nzmpnt_zoom_timezone));
    }else{
      $acst_date->setTimeZone(new DateTimeZone('Asia/Kolkata'));
    }
    return $acst_date->format('Y-m-d H:i');
}*/

/****************** formatted Date time ********************************/
if(!function_exists('nzmpnt_format_time_from_UTC')) {
function nzmpnt_format_time_from_UTC($udate){
    $start_time = str_replace("T"," ",$udate);
    $start_time = str_replace("Z","",$start_time);
    $date_reg= $start_time; 
    $utc_date = DateTime::createFromFormat('Y-m-d G:i:s',$date_reg,new DateTimeZone('UTC'));
    $acst_date = clone $utc_date; 
    if(!empty(get_option('nzmpnt_zoom_timezone'))){
      $nzmpnt_zoom_timezone = get_option('nzmpnt_zoom_timezone');
      $acst_date->setTimeZone(new DateTimeZone($nzmpnt_zoom_timezone));
    }else{
      $acst_date->setTimeZone(new DateTimeZone('Asia/Kolkata'));
    } 
    $start_time_gmt = $acst_date->format('Y-m-d H:i');
    return $start_time_gmt;
}
}
?>