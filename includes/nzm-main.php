<style>.notice { display: none; }</style>
<div class="container-fluid nzmpnt_setting_div">
<div class="nzmpnt_preloader active"><img src="<?php echo esc_url(NZMPNT_PLUGIN_PATH.'images/loader.gif'); ?>"></div>
<h2 class="nzmpnt_headingh2">NZM Plugin Settings</h2>

<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
<div class="nzmpnt-12"><div class="nzmpnt_errordiv"></div></div>	
<form method="post" action="" enctype="multipart/form-data">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="nzmpntzoom-tab" data-bs-toggle="tab" data-bs-target="#nzmpntzoom" type="button" role="tab" aria-controls="nzmpntzoom" aria-selected="true">Zoom Setting</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="nzmpntmeeting-tab" data-bs-toggle="tab" data-bs-target="#nzmpntmeeting" type="button" role="tab" aria-controls="nzmpntmeeting" aria-selected="false">Meeting Setting</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="nzmpntstyles-tab" data-bs-toggle="tab" data-bs-target="#nzmpntstyles" type="button" role="tab" aria-controls="nzmpntstyles" aria-selected="false">Styles</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="nzmpntshortcode-tab" data-bs-toggle="tab" data-bs-target="#nzmpntshortcode" type="button" role="tab" aria-controls="nzmpntshortcode" aria-selected="false">Shortcode</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="nzmpntzoom" role="tabpanel" aria-labelledby="nzmpntzoom-tab">

<h3 class="nzmpnt_headingh3">Zoom Setting</h3>
			<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="nzmpnt_zoom_plan">Choose Your Zoom Plan<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<input type="radio" name="nzmpnt_zoom_plan" class="nzmpnt_zoom_plan nzmpnt_radio" id="nzm_zoom_plan1" value="1" <?php if(!empty(get_option('nzmpnt_zoom_plan'))){ if(esc_html(NZMPNT_ZOOM_PLAN) == '1'){ echo 'checked' ;} }?>><label for="nzm_zoom_plan1">BASIC</label>
						<input type="radio" name="nzmpnt_zoom_plan" class="nzmpnt_zoom_plan nzmpnt_radio" id="nzm_zoom_plan2" value="2" <?php if(!empty(get_option('nzmpnt_zoom_plan'))){ if(esc_html(NZMPNT_ZOOM_PLAN) == '2'){ echo 'checked' ;} }?>><label for="nzm_zoom_plan2">PRO</label>
						<input type="radio" name="nzmpnt_zoom_plan" class="nzmpnt_zoom_plan nzmpnt_radio" id="nzm_zoom_plan3" value="3" <?php if(!empty(get_option('nzmpnt_zoom_plan'))){  if(esc_html(NZMPNT_ZOOM_PLAN) == '3'){ echo 'checked' ;} }?>><label for="nzm_zoom_plan3">BUSINESS</label>
						<input type="radio" name="nzmpnt_zoom_plan" class="nzmpnt_zoom_plan nzmpnt_radio" id="nzm_zoom_plan4" value="4" <?php if(!empty(get_option('nzmpnt_zoom_plan'))){  if(esc_html(NZMPNT_ZOOM_PLAN) == '4'){ echo 'checked' ;} }?>><label for="nzm_zoom_plan4">ENTERPRISE</label>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="nzmpnt_zoom_token">Zoom Token<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<input name="nzmpnt_zoom_token" id="nzmpnt_zoom_token" type="text"  value="<?php if(!empty(get_option('nzmpnt_zoom_token'))){ echo esc_html(NZMPNT_ZOOM_TOKEN); } ?>" class="form-control nzmpnt_back_field" required/>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="nzmpnt_zoom_user_email">Zoom User Email ID<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<input name="nzmpnt_zoom_user_email" id="nzmpnt_zoom_user_email" type="email"  value="<?php if(!empty(get_option('nzmpnt_zoom_user_email'))){ echo esc_html(NZMPNT_ZOOM_USER_EMAIL); } ?>" class="form-control nzmpnt_back_field" required/>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="nzm_zoom_timezones">Select Timezone<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<select name="nzmpnt_zoom_timezone" id="nzmpnt_zoom_timezone" class="nzmpnt_back_field" required>
<option value="Pacific/Midway" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Midway"){ echo "selected"; } }?>>Midway Island, Samoa</option>
<option value="Pacific/Pago_Pago" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Pago_Pago"){ echo "selected"; } }?>>Pago Pago</option>
<option value="Pacific/Honolulu" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Honolulu"){ echo "selected"; } }?>>Hawaii</option>
<option value="America/Anchorage" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Anchorage"){ echo "selected"; } }?>>Alaska</option>
<option value="America/Vancouver" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Vancouver"){ echo "selected"; } }?>>Vancouver</option>
<option value="America/Los_Angeles" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Los_Angeles"){ echo "selected"; } }?>>Pacific Time (US and Canada)</option>
<option value="America/Tijuana" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Tijuana"){ echo "selected"; } }?>>Tijuana</option>
<option value="America/Edmonton" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Edmonton"){ echo "selected"; } }?>>Edmonton</option>
<option value="America/Denver" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Denver"){ echo "selected"; } }?>>Mountain Time (US and Canada)</option>
<option value="America/Phoenix" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Phoenix"){ echo "selected"; } }?>>Arizona</option>
<option value="America/Mazatlan" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Mazatlan"){ echo "selected"; } }?>>Mazatlan</option>
<option value="America/Winnipeg" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Winnipeg"){ echo "selected"; } }?>>Winnipeg</option>
<option value="America/Regina" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Regina"){ echo "selected"; } }?>>Saskatchewan</option>
<option value="America/Chicago" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Chicago"){ echo "selected"; } }?>>Central Time (US and Canada)</option>
<option value="America/Mexico_City" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Mexico_City"){ echo "selected"; } }?>>Mexico City</option>
<option value="America/Guatemala" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Guatemala"){ echo "selected"; } }?>>Guatemala</option>
<option value="America/El_Salvador" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/El_Salvador"){ echo "selected"; } }?>>El Salvador</option>
<option value="America/Managua" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Managua"){ echo "selected"; } }?>>Managua</option>
<option value="America/Costa_Rica" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Costa_Rica"){ echo "selected"; } }?>>Costa Rica</option>
<option value="America/Montreal" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Montreal"){ echo "selected"; } }?>>Montreal</option>
<option value="America/New_York" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/New_York"){ echo "selected"; } }?>>Eastern Time (US and Canada)</option>
<option value="America/Indianapolis" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Indianapolis"){ echo "selected"; } }?>>Indiana (East)</option>
<option value="America/Panama" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Panama"){ echo "selected"; } }?>>Panama</option>
<option value="America/Bogota" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Bogota"){ echo "selected"; } }?>>Bogota</option>
<option value="America/Lima" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Lima"){ echo "selected"; } }?>>Lima</option>
<option value="America/Halifax" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Halifax"){ echo "selected"; } }?>>Halifax</option>
<option value="America/Puerto_Rico" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Puerto_Rico"){ echo "selected"; } }?>>Puerto Rico</option>
<option value="America/Caracas" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Caracas"){ echo "selected"; } }?>>Caracas</option>
<option value="America/Santiago" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Santiago"){ echo "selected"; } }?>>Santiago</option>
<option value="America/St_Johns" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/St_Johns"){ echo "selected"; } }?>>Newfoundland and Labrador</option>
<option value="America/Montevideo" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Montevideo"){ echo "selected"; } }?>>Montevideo</option>
<option value="America/Araguaina" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Araguaina"){ echo "selected"; } }?>>Brasilia</option>
<option value="America/Argentina/Buenos_Aires" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Argentina/Buenos_Aires"){ echo "selected"; } }?>>Buenos Aires, Georgetown</option>
<option value="America/Godthab" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Godthab"){ echo "selected"; } }?>>Greenland</option>
<option value="America/Sao_Paulo" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Sao_Paulo"){ echo "selected"; } }?>>Sao Paulo</option>
<option value="Atlantic/Azores" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Atlantic/Azores"){ echo "selected"; } }?>>Azores</option>
<option value="Canada/Atlantic" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Canada/Atlantic"){ echo "selected"; } }?>>Atlantic Time (Canada)</option>
<option value="Atlantic/Cape_Verde" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Atlantic/Cape_Verde"){ echo "selected"; } }?>>Cape Verde Islands</option>
<option value="UTC" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "UTC"){ echo "selected"; } }?>>Universal Time UTC</option>
<option value="Etc/Greenwich" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Etc/Greenwich"){ echo "selected"; } }?>>Greenwich Mean Time</option>
<option value="Europe/Belgrade" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Belgrade"){ echo "selected"; } }?>>Belgrade, Bratislava, Ljubljana</option>
<option value="CET" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "CET"){ echo "selected"; } }?>>Sarajevo, Skopje, Zagreb</option>
<option value="Atlantic/Reykjavik" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Atlantic/Reykjavik"){ echo "selected"; } }?>>Reykjavik</option>
<option value="Europe/Dublin" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Dublin"){ echo "selected"; } }?>>Dublin</option>
<option value="Europe/London" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/London"){ echo "selected"; } }?>>London</option>
<option value="Europe/Lisbon" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Lisbon"){ echo "selected"; } }?>>Lisbon</option>
<option value="Africa/Casablanca" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Casablanca"){ echo "selected"; } }?>>Casablanca</option>
<option value="Europe/Oslo" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Oslo"){ echo "selected"; } }?>>Oslo</option>
<option value="Europe/Copenhagen" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Copenhagen"){ echo "selected"; } }?>>Copenhagen</option>
<option value="Europe/Brussels" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Brussels"){ echo "selected"; } }?>>Brussels</option>
<option value="Europe/Berlin" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Berlin"){ echo "selected"; } }?>>Amsterdam, Berlin, Rome, Stockholm, Vienna</option>
<option value="Europe/Helsinki" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Helsinki"){ echo "selected"; } }?>>Helsinki</option>
<option value="Europe/Amsterdam" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Amsterdam"){ echo "selected"; } }?>>Amsterdam</option>
<option value="Europe/Rome" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Rome"){ echo "selected"; } }?>>Rome</option>
<option value="Europe/Stockholm" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Stockholm"){ echo "selected"; } }?>>Stockholm</option>
<option value="Europe/Vienna" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Vienna"){ echo "selected"; } }?>>Vienna</option>
<option value="Europe/Luxembourg" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Luxembourg"){ echo "selected"; } }?>>Luxembourg</option>
<option value="Europe/Paris" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Paris"){ echo "selected"; } }?>>Paris</option>
<option value="Europe/Zurich" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Zurich"){ echo "selected"; } }?>>Zurich</option>
<option value="Europe/Madrid" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Madrid"){ echo "selected"; } }?>>Madrid</option>
<option value="Africa/Bangui" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Bangui"){ echo "selected"; } }?>>West Central Africa</option>
<option value="Africa/Algiers" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Algiers"){ echo "selected"; } }?>>Algiers</option>
<option value="Africa/Tunis" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Tunis"){ echo "selected"; } }?>>Tunis</option>
<option value="Africa/Harare" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Harare"){ echo "selected"; } }?>>Harare, Pretoria</option>
<option value="Africa/Nairobi" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Nairobi"){ echo "selected"; } }?>>Nairobi</option>
<option value="Europe/Warsaw" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Warsaw"){ echo "selected"; } }?>>Warsaw</option>
<option value="Europe/Prague" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Prague"){ echo "selected"; } }?>>Prague Bratislava</option>
<option value="Europe/Budapest" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Budapest"){ echo "selected"; } }?>>Budapest</option>
<option value="Europe/Sofia" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Sofia"){ echo "selected"; } }?>>Sofia</option>
<option value="Europe/Istanbul" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Istanbul"){ echo "selected"; } }?>>Istanbul</option>
<option value="Europe/Athens" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Athens"){ echo "selected"; } }?>>Athens</option>
<option value="Europe/Bucharest" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Bucharest"){ echo "selected"; } }?>>Bucharest</option>
<option value="Asia/Nicosia" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Nicosia"){ echo "selected"; } }?>>Nicosia</option>
<option value="Asia/Beirut" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Beirut"){ echo "selected"; } }?>>Beirut</option>
<option value="Asia/Damascus" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Damascus"){ echo "selected"; } }?>>Damascus</option>
<option value="Asia/Jerusalem" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Jerusalem"){ echo "selected"; } }?>>Jerusalem</option>
<option value="Asia/Amman" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Amman"){ echo "selected"; } }?>>Amman</option>
<option value="Africa/Tripoli" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Tripoli"){ echo "selected"; } }?>>Tripoli</option>
<option value="Africa/Cairo" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Cairo"){ echo "selected"; } }?>>Cairo</option>
<option value="Africa/Johannesburg" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Johannesburg"){ echo "selected"; } }?>>Johannesburg</option>
<option value="Europe/Moscow" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Moscow"){ echo "selected"; } }?>>Moscow</option>
<option value="Asia/Baghdad" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Baghdad"){ echo "selected"; } }?>>Baghdad</option>
<option value="Asia/Kuwait" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Kuwait"){ echo "selected"; } }?>>Kuwait</option>
<option value="Asia/Riyadh" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Riyadh"){ echo "selected"; } }?>>Riyadh</option>
<option value="Asia/Bahrain" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Bahrain"){ echo "selected"; } }?>>Bahrain</option>
<option value="Asia/Qatar" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Qatar"){ echo "selected"; } }?>>Qatar</option>
<option value="Asia/Aden" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Aden"){ echo "selected"; } }?>>Aden</option>
<option value="Asia/Tehran" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Tehran"){ echo "selected"; } }?>>Tehran</option>
<option value="Africa/Khartoum" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Khartoum"){ echo "selected"; } }?>>Khartoum</option>
<option value="Africa/Djibouti" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Djibouti"){ echo "selected"; } }?>>Djibouti</option>
<option value="Africa/Mogadishu" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Africa/Mogadishu"){ echo "selected"; } }?>>Mogadishu</option>
<option value="Asia/Dubai" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Dubai"){ echo "selected"; } }?>>Dubai</option>
<option value="Asia/Muscat" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Muscat"){ echo "selected"; } }?>>Muscat</option>
<option value="Asia/Baku" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Baku"){ echo "selected"; } }?>>Baku, Tbilisi, Yerevan</option>
<option value="Asia/Kabul" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Kabul"){ echo "selected"; } }?>>Kabul</option>
<option value="Asia/Yekaterinburg" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Yekaterinburg"){ echo "selected"; } }?>>Yekaterinburg</option>
<option value="Asia/Tashkent" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Tashkent"){ echo "selected"; } }?>>Islamabad, Karachi, Tashkent</option>
<option value="Asia/Calcutta" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Calcutta"){ echo "selected"; } }?>>India</option>
<option value="Asia/Kathmandu" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Kathmandu"){ echo "selected"; } }?>>Kathmandu</option>
<option value="Asia/Novosibirsk" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Novosibirsk"){ echo "selected"; } }?>>Novosibirsk</option>
<option value="Asia/Almaty" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Almaty"){ echo "selected"; } }?>>Almaty</option>
<option value="Asia/Dacca" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Dacca"){ echo "selected"; } }?>>Dacca</option>
<option value="Asia/Krasnoyarsk" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Krasnoyarsk"){ echo "selected"; } }?>>Krasnoyarsk</option>
<option value="Asia/Dhaka" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Dhaka"){ echo "selected"; } }?>>Astana, Dhaka</option>
<option value="Asia/Bangkok" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Bangkok"){ echo "selected"; } }?>>Bangkok</option>
<option value="Asia/Saigon" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Saigon"){ echo "selected"; } } ?>>Vietnam</option>
<option value="Asia/Jakarta" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Jakarta"){ echo "selected"; } } ?>>Jakarta</option>
<option value="Asia/Irkutsk" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Irkutsk"){ echo "selected"; } } ?>>Irkutsk, Ulaanbaatar</option>
<option value="Asia/Shanghai" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Shanghai"){ echo "selected"; } } ?>>Beijing, Shanghai</option>
<option value="Asia/Hong_Kong" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Hong_Kong"){ echo "selected"; } } ?>>Hong Kong</option>
<option value="Asia/Taipei" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Taipei"){ echo "selected"; } } ?>>Taipei</option>
<option value="Asia/Kuala_Lumpur" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Kuala_Lumpur"){ echo "selected"; } } ?>>Kuala Lumpur</option>
<option value="Asia/Singapore" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Singapore"){ echo "selected"; } } ?>>Singapore</option>
<option value="Australia/Perth" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Australia/Perth"){ echo "selected"; } } ?>>Perth</option>
<option value="Asia/Yakutsk" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Yakutsk"){ echo "selected"; } } ?>>Yakutsk</option>
<option value="Asia/Seoul" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Seoul"){ echo "selected"; } } ?>>Seoul</option>
<option value="Asia/Tokyo" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Tokyo"){ echo "selected"; } } ?>>Osaka, Sapporo, Tokyo</option>
<option value="Australia/Darwin" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Australia/Darwin"){ echo "selected"; } } ?>>Darwin</option>
<option value="Australia/Adelaide" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Australia/Adelaide"){ echo "selected"; } } ?>>Adelaide</option>
<option value="Asia/Vladivostok" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Vladivostok"){ echo "selected"; } } ?>>Vladivostok</option>
<option value="Pacific/Port_Moresby" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Port_Moresby"){ echo "selected"; } } ?>>Guam, Port Moresby</option>
<option value="Australia/Brisbane" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Australia/Brisbane"){ echo "selected"; } } ?>>Brisbane</option>
<option value="Australia/Sydney" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Australia/Sydney"){ echo "selected"; } } ?>>Canberra, Melbourne, Sydney</option>
<option value="Australia/Hobart" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Australia/Hobart"){ echo "selected"; } } ?>>Hobart</option>
<option value="Asia/Magadan" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Magadan"){ echo "selected"; } } ?>>Magadan</option>
<option value="SST" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "SST"){ echo "selected"; } } ?>>Solomon Islands</option>
<option value="Pacific/Noumea" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Noumea"){ echo "selected"; } } ?>>New Caledonia</option>
<option value="Asia/Kamchatka" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Kamchatka"){ echo "selected"; } } ?>>Kamchatka</option>
<option value="Pacific/Fiji" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Fiji"){ echo "selected"; } } ?>>Fiji Islands, Marshall Islands</option>
<option value="Pacific/Auckland" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Auckland"){ echo "selected"; } } ?>>Auckland, Wellington</option>
<option value="Asia/Kolkata" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Asia/Kolkata"){ echo "selected"; } }?>>Mumbai, Kolkata, New Delhi</option>
<option value="Europe/Kiev" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Europe/Kiev"){ echo "selected"; } } ?>>Kiev</option>
<option value="America/Tegucigalpa" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "America/Tegucigalpa"){ echo "selected"; } } ?>>Tegucigalpa</option>
<option value="Pacific/Apia" <?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ if(esc_html(NZMPNT_ZOOM_TIMEZONE) == "Pacific/Apia"){ echo "selected"; } } ?>>Independent State of Samoa</option>
</select> <span id="nzmpnt_timezone_selected"><?php if(!empty(get_option('nzmpnt_zoom_timezone'))){ echo "Your selected timezone value is <strong>".esc_html(NZMPNT_ZOOM_TIMEZONE)."</strong>"; } ?></span>
					</td>
				</tr>
					
			</tbody>
		</table>
	<p><strong>Note</strong>: Set Your <strong>Timezone</strong>, <strong>Date</strong> format in "yyyy-mm-dd" and <strong>Time</strong> in 24-hour format. <br/>To set login into your zoom account. Check in left side for personal in which you will see profile tab. Check screen shot below.<br/><br/><strong>Screenshot</strong></p>
	<img src="<?php echo esc_url(NZMPNT_PLUGIN_PATH.'images/zoom_profile.png'); ?>" class="nzmpnt_screenshot_image">
 


  </div>
  <div class="tab-pane fade" id="nzmpntmeeting" role="tabpanel" aria-labelledby="nzmpntmeeting-tab">
  	
      <h3 class="nzmpnt_headingh3">Meeting Setting</h3>
      <table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="nzmpnt_wstart_time">Start Time<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<input name="nzmpnt_wstart_time" id="nzmpnt_wstart_time" type="text"  value="<?php if(!empty(get_option('nzmpnt_wstart_time'))){ echo esc_html(NZMPNT_WSTART_TIME); } ?>" class="form-control nzmpnt_back_time" required/>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="nzmpnt_wend_time">End Time<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<input name="nzmpnt_wend_time" id="nzmpnt_wend_time" type="text"  value="<?php if(!empty(get_option('nzmpnt_wend_time'))){  echo esc_html(NZMPNT_WEND_TIME); } ?>" class="form-control nzmpnt_back_time" required/>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="nzmpnt_slot_duration">Select Slot Duration<span class="nzmpnt_req_span">*</span></label>
					</th>
					<td>
						<input type="radio" name="nzmpnt_slot_duration" class="nzmpnt_slot_duration nzmpnt_radio" id="nzm_slot_duration1" value="30" <?php if(!empty(get_option('nzmpnt_slot_duration'))){ if(esc_html(NZMPNT_SLOT_DURATION) == '30'){ echo 'checked' ;} } ?>><label for="nzm_slot_duration1">30 Minutes</label>
						<input type="radio" name="nzmpnt_slot_duration" class="nzmpnt_slot_duration nzmpnt_radio" id="nzm_slot_duration2" value="60" <?php if(!empty(get_option('nzmpnt_slot_duration'))){ if(esc_html(NZMPNT_SLOT_DURATION) == '60'){ echo 'checked' ;} } ?>><label for="nzm_slot_duration2">60 Minutes</label>
					</td>
				</tr>
					
			</tbody>
		</table>

  </div>
  <div class="tab-pane fade" id="nzmpntstyles" role="tabpanel" aria-labelledby="nzmpntstyles-tab">
  	
<h3 class="nzmpnt_headingh3">Styles</h3>
      <p>You can add css to design meeting form just copy and paste your css here will apply on the form.</p>
      <textarea id="nzmpnt_plugin_custom_css" class="form-control nzmpnt_plugin_custom_css" placeholder="/* write your CSS code here */"><?php if(!empty(get_option('nzmpnt_plugin_custom_css'))){  echo esc_html(NZMPNT_PLUGIN_CUSTOMCSS); }?></textarea>

  </div>
<div class="tab-pane fade" id="nzmpntshortcode" role="tabpanel" aria-labelledby="nzmpntshortcode-tab">
	<h3 class="nzmpnt_headingh3">Shortcode</h3>
      
      <?php if(!empty(get_option('nzmpnt_zoom_token')) && !empty(get_option('nzmpnt_zoom_user_email')) && !empty(get_option('nzmpnt_zoom_timezone')) && !empty(get_option('nzmpnt_wstart_time')) && !empty(get_option('nzmpnt_wend_time')) && !empty(get_option('nzmpnt_slot_duration'))){ ?>
      <p>Use this shortcode on any page or post to display zoom meeting form</p>
      <blockquote>[nzmpnt_zoom_meeting_form]</blockquote>
      <?php }else{ ?>
      	<p>Complete plugin setting to view shortcode</p>
      <?php } ?>
</div>

</div>
<p class="submit"><input type="submit" name="submit" id="nzm_submit_plugsetting" class=" button button-primary nzmpnt_submit" value="Save Changes"></p>
</form>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-0 nzmpnt_adarea nzmpnt-mt-20">

</div>
</div>
</div>