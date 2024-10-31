<?php 
$current_page = admin_url("admin.php?page=".sanitize_text_field($_GET["page"]));
if(!empty(get_option('nzmpnt_zoom_token')) && !empty(get_option('nzmpnt_zoom_user_email'))){
$res = nzmpnt_wpapi_getMeetingList('upcoming_meetings');
if(!empty($res)){ $meetList = $res->meetings; }
}
?>
<style>.notice { display: none; }</style>
<div class="container-fluid nzmpnt_setting_div">
<div class="nzmpnt_preloader active"><img src="<?php echo esc_url(NZMPNT_PLUGIN_PATH.'images/loader.gif'); ?>"></div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
<h1 class="nzmpnt_title_h1">Upcoming Meetings <a id="add_meeting" class="nzmpnt_button add_meeting">Create Meeting</a></h1>
<table id="nzmpnt_dataTable" class="display nzmpnt_dataTable">
<thead>
<tr>
    <th>S.No</th>
    <th>Meeting ID</th>
    <th>Topic</th>
    <th>Start Time</th>
    <th>Duration</th>
    <th>Created Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
    <?php $p=1; if(!empty($meetList)){
    foreach($meetList as $result){ 
            ?>
    <tr>
    <td><?php echo esc_html($p); $cid = esc_html($result->id);?></td>
    <td><?php echo esc_html($result->id); ?></td>
    <td><?php echo esc_html($result->topic); ?></td>
    <td><?php echo esc_html(nzmpnt_format_time_from_UTC($result->start_time)); ?></td>
    <td><?php echo esc_html($result->duration); ?></td>
    <td><?php echo esc_html(nzmpnt_format_time_from_UTC($result->created_at)); ?></td>
    <td><a href="<?php echo esc_attr($current_page).'&id='.esc_attr($cid); ?>" class="nzmpnt_button_table nzmpnt-mr-10"><abbr title="View Meeting"><i class="fas fa-eye" aria-hidden="true"></i></abbr></a><?php if(NZMPNT_ZOOM_PLAN != '1'){ ?><a href="" class="nzmpnt_button_table nzmpnt-mr-10 addParticipant" data-id="<?php echo esc_attr($cid); ?>"><abbr title="Add Participant"><i class="fas fa-plus" aria-hidden="true"></i></abbr></a><?php } ?><a class="nzmpnt_button_table nzmpnt-mr-10 editMeeting" data-id="<?php echo esc_attr($cid); ?>"><abbr title="Edit Meeting"><i class="fas fa-pen" aria-hidden="true"></i></abbr></a><a class="nzmpnt_button_table deleteMeeting" data-id="<?php echo esc_attr($cid); ?>"><abbr title="Delete Meeting"><i class="fas fa-trash" aria-hidden="true"></i></abbr></a></td>
    </tr>
    <?php $p++; } 
}?>
</tbody>
</table>
</div>
</div>
</div>
<div id="nzmpnt_data_val" data-wstarttime="<?php if(!empty(get_option('nzmpnt_wstart_time'))){ echo esc_attr(NZMPNT_WSTART_TIME); } ?>" data-wendtime="<?php if(!empty(get_option('nzmpnt_wend_time'))){ echo esc_attr(NZMPNT_WEND_TIME); } ?>" data-slotduration="<?php if(!empty(get_option('nzmpnt_slot_duration'))){ echo esc_attr(NZMPNT_SLOT_DURATION); } ?>"></div>
<!-- Add Meeting Modal -->
  <div class="modal fade nzmpnt_modal" id="addMeeting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="nzmpnt_errordiv "></div>
        <h4 class="modal-title nzmpnt_headingh4">Create New Meeting</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" id="meeting_form" autocomplete="off">
              <div class="form-group nzmpnt_row">
                <label class="">Subject*</label>
                <input type="text" class="form-control form_subject" name="form_subject" id="form_subject" autocomplete="off">
              </div>
              <div class="form-group nzmpnt_row">
                <label class="">Meeting Password</label> 
                <input type="password" class="form-control form_password" name="form_password" id="nzmpnt_password" autocomplete="off">
              </div>
              <div class="row nzmpnt_row">
                <div class="col-md-6">
                   <div class="form-group">
                    <label class="">Date*</label>
                    <input type="text" class="form-control nzm_back_form_date" name="form_date" id="nzmpnt_date" >
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label class="">Time*</label>
                    <input type="text" class="form-control nzm_back_form_time" name="form_time" id="nzmpnt_time" >
                  </div>
                </div>
            </div>
              <button id="create-meet-submit" type="button" class="modal_button nzmpnt_submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Meeting Modal -->
  <div class="modal fade nzmpnt_modal" id="editMeeting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="nzmpnt_errordiv "></div>
        <h4 class="modal-title nzmpnt_headingh4">Update Meeting</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" id="edit_meeting_form">
              <div class="form-group nzmpnt_row">
                <label class="">Subject*</label>
                <input type="text" class="form-control edit_form_subject" name="edit_form_subject" id="edit_form_subject" value="">
                <input type="hidden" class="form-control edit_meetID" name="edit_meetID" id="edit_meetID" value="">
              </div>
              <div class="form-group nzmpnt_row">
                <label class="">Meeting Password</label> 
                <input type="password" class="form-control edit_form_password" name="edit_form_password" id="edit_nzmpnt_password" autocomplete="off">
              </div>
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group nzmpnt_row">
                    <label class="">Date*</label>
                    <input type="text" class="form-control nzm_back_form_date" name="edit_form_date" id="edit_nzmpnt_date" value="">
                  </div>
                </div>
                <div class="col-md-6 nzmpnt_row">
                   <div class="form-group">
                    <label class="">Time*</label>
                    <input type="text" class="form-control nzm_back_form_time" name="edit_form_time" id="edit_nzmpnt_time" value="">
                  </div>
                </div>
            </div>
              <button id="edit-meet-submit" type="button" class="modal_button nzmpnt_submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add Participant Modal -->
    <div class="modal fade nzmpnt_modal" id="addParticipant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="nzmpnt_errordiv "></div>
        <h4 class="modal-title nzmpnt_headingh4">Add Participant</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" id="participant_form">
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group nzmpnt_row">
                     <label class="">First Name*</label>
                     <input type="text" class="form-control form_firstname" name="form_firstname" id="part_firstname" >
                     <input type="hidden" class="form-control form_meetID" name="form_meetID" id="form_meetID" value="">
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group nzmpnt_row">
                     <label class="">Last Name*</label>
                     <input type="text" class="form-control form_lastname" name="form_lastname" id="part_lastname" >
                  </div>
                </div>
            </div>
              <div class="form-group nzmpnt_row">
                <label class="">Email Address*</label> 
                <input type="email" class="form-control form_email" name="form_email" id="part_email" >
              </div>
              <button id="add-participant-submit" type="button" class="modal_button nzmpnt_submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>