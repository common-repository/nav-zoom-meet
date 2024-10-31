<?php 
$registrats = '';
$current_page = admin_url("admin.php?page=".sanitize_text_field($_GET["page"]));
$mid = sanitize_text_field($_REQUEST["id"]);
if(!empty($mid)){ 
  if(esc_html(NZMPNT_ZOOM_PLAN) != '1'){ 
   $registrats = nzmpnt_get_full_registrant_list($mid);
 }
}

$MeetingDetails = nzmpnt_wpapi_getMeetingDetails($mid);
if(!empty($MeetingDetails)){ $meetList = $MeetingDetails; }
?>
<style>.notice { display: none; }</style>
<div class="container-fluid nzm_single nzmpnt_center">
<div class="nzmpnt_preloader active"><img src="<?php echo esc_url(NZMPNT_PLUGIN_PATH.'images/loader.gif'); ?>"></div> 
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
<div class="row">
 <div class="nzmpnt_head_div"><h1 class="nzmpnt_headingh1"><?php if(!empty($meetList)){ echo esc_html($meetList->topic); } ?></h1></div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 nzmpnt_left">
   <h3 class="nzmpnt_headingh3 nzmpnt-mb-15 nzmpnt-mt-10">All Participants</h3>
   <table id="nzmpnt_dataTable" class="display nzmpnt_dataTable">
   <thead>
   <tr>
       <th>S.No</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Email</th>
       <th>Register On</th>
   </tr>
   </thead>
   <tbody>
       <?php $p=1; if(!empty($registrats)){
       foreach($registrats as $result){ 
               ?>
       <tr>
       <td><?php echo esc_html($p); $cid = esc_html($result->id);?></td>
       <td><?php echo esc_html($result->first_name); ?></td>
       <td><?php echo esc_html($result->last_name); ?></td>
       <td><?php echo esc_html($result->email); ?></td>
       <td><?php echo esc_html(nzmpnt_format_time_from_UTC($result->create_time)); ?></td>
       </tr>
       <?php $p++; } 
   } 
?>
   </tbody>
   </table>
</div>

 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 nzmpnt_left">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nzmpnt-mt-10">
 <span class="nzmpnt_single_bullet"><strong>Meeting ID:</strong> <?php if(!empty($mid)){ echo esc_html($mid); } ?></span>
</div>  
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="nzmpnt_single_bullet"><strong>Start Date:</strong> <?php if(!empty($meetList)){ $st_time = nzmpnt_format_time_from_UTC($meetList->start_time); echo esc_html(date("M d, Y",strtotime($st_time))); } ?></span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="nzmpnt_single_bullet"><strong>Start Time:</strong> <?php if(!empty($meetList)){  echo esc_html(date("H:i a",strtotime($st_time))); } ?></span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="nzmpnt_single_bullet"><strong>Duration:</strong> <?php if(!empty($meetList)){ echo esc_html($meetList->duration); } ?> minutes</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="nzmpnt_single_bullet"><strong>Password:</strong> <?php if(!empty($meetList)){ echo esc_html($meetList->h323_password); } ?></span>
</div>
<?php if(!empty(get_option('nzmpnt_zoom_plan'))){ if(NZMPNT_ZOOM_PLAN != '1'){  ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="nzmpnt_single_bullet"><strong>Registration:</strong> <?php if(!empty($registrats)){ echo esc_html(count($registrats)); } ?></span>
</div>
<?php } } ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <span class="nzmpnt_single_bullet"><strong>Join Url:</strong> <?php if(!empty($meetList)){ echo esc_url($meetList->join_url); } ?></span>
</div>
</div>

</div>
</div>
</div>
</div>