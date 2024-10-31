<?php 

/****** Create Meeting Form Shortcode start ************/
add_shortcode('nzmpnt_zoom_meeting_form', 'nzmpnt_meeting_form_shortcode');
if(!function_exists('nzmpnt_meeting_form_shortcode')) {
function nzmpnt_meeting_form_shortcode()
{
    $return_html = '';
    $datavar = '';
    if(!empty(get_option('nzmpnt_wstart_time'))){    
        $datavar .= ' data-wstarttime="'.NZMPNT_WSTART_TIME.'"';
    }else{
        $datavar .= ' data-wstarttime=""';
    }
    if(!empty(get_option('nzmpnt_wend_time'))){    
        $datavar .= ' data-wendtime="'.NZMPNT_WEND_TIME.'"';
    }else{
        $datavar .= ' data-wendtime=""';
    }
    if(!empty(get_option('nzmpnt_slot_duration'))){    
        $datavar .= ' data-slotduration="'.NZMPNT_SLOT_DURATION.'"';
    }else{
        $datavar .= ' data-slotduration=""';
    }
    if(!empty(get_option('nzmpnt_zoom_plan'))){    
        $datavar .= ' data-zoomplan="'.NZMPNT_ZOOM_PLAN.'"';
    }else{
        $datavar .= ' data-zoomplan=""';
    }
    if(!empty(get_option('nzmpnt_plugin_custom_css'))){
        $return_html .='<style>'.NZMPNT_PLUGIN_CUSTOMCSS.'</style>';
    }

if(!empty(get_option('nzmpnt_zoom_plan')) || !empty(get_option('nzmpnt_zoom_timezone')) || !empty(get_option('nzmpnt_zoom_token')) || !empty(get_option('nzmpnt_zoom_user_email')) || !empty(get_option('nzmpnt_wstart_time')) || !empty(get_option('nzmpnt_wend_time')) || !empty(get_option('nzmpnt_slot_duration'))){
    $return_html .='<form id="meeting_form" name="meeting_form" class="nzmpnt_form" action="" method="post">
        <div class="nzmpnt_preloader"><img src="'.NZMPNT_PLUGIN_PATH.'images/loader.gif"></div>
        <div class="nzmpnt-12"><div class="nzmpnt_errordiv"></div>';
    $return_html .='<div id="nzmpnt_data_val" '.$datavar.' ></div>';
    $return_html .='</div><div class="nzmpnt-12">
        <div class="fullwidth"> 
            <input type="text" id="nzmpnt_firstname" name="form_firstname" value="" placeholder="First Name" required="" class="nzmpnt_field">
        </div>
        <div class="fullwidth"> 
            <input type="text" id="nzmpnt_lastname" name="form_lastname" value="" placeholder="Last Name" required="" class="nzmpnt_field">
        </div>
        <div class="fullwidth"> 
            <input type="email" id="nzmpnt_email" name="form_email" value="" placeholder="Email address" required="" class="nzmpnt_field">
        </div>     
        <div class="fullwidth"> 
            <input type="text" id="nzmpnt_subject" name="form_subject" value="" placeholder="Meeting Title/Subject" required="" class="nzmpnt_field">
        </div>      
        <div class="fullwidth"> 
            <input type="text" id="nzmpnt_date" name="form_date" value="" placeholder="Date" required="" class="nzmpnt_field">
        </div>
        <div class="fullwidth"> 
            <input type="text" id="nzmpnt_time" name="form_time" value="" placeholder="Time" required="" class="nzmpnt_field">
        </div>
        <div class="nzmpnt-12">
        <button class="nzmpnt_submit">Submit</button>
        </div>
    </form>';
  }else{
    $return_html .='<p>Alert: Complete Plugin Setting</p>';
  }
  return $return_html;
}
}
/****** Create Meeting Form Shortcode end ************/

?>