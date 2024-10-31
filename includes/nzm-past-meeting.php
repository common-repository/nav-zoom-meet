<?php 
$current_page = admin_url( "admin.php?page=".$_GET["page"] );
if(!empty(get_option('nzmpnt_zoom_token')) && !empty(get_option('nzmpnt_zoom_user_email'))){
$res = nzmpnt_wpapi_getMeetingList('previous_meetings');
if(!empty($res)){ $meetList = $res->meetings; }
}
?>
<style>.notice { display: none; }</style>
<div class="container-fluid nzmpnt_setting_div">
<div class="nzmpnt_preloader active"><img src="<?php echo esc_url(NZMPNT_PLUGIN_PATH.'images/loader.gif'); ?>"></div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h1 class="nzmpnt_title_h1">Past Meetings</h1>
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
    <td><a href="<?php echo esc_attr($current_page).'&id='.esc_attr($cid); ?>" class="nzmpnt_button_table nzmpnt-mr-10"><abbr title="View Meeting"><i class="fas fa-eye" aria-hidden="true"></i></abbr></a></td>
    </tr>
    <?php $p++; } 
  }?>
</tbody>
</table>
</div>
</div>
</div>