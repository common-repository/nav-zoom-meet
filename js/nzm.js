jQuery(document).ready(function() {
jQuery("#form_subject").attr("autocomplete", "off");
jQuery("#nzmpnt_password").attr("autocomplete", "off");
jQuery(".nzm_back_date").datepicker({ minDate: 0, dateFormat: 'yy-mm-dd'});
jQuery(".nzmpnt_back_time").timepicker({
	timeFormat: 'HH:mm',
	interval: 30,
	//minTime: '10',
	//defaultTime: '11',
	//startTime: '10:00',
	//maxTime: '7:00pm',
	dynamic: false,
  	dropdown: true,
  	scrollbar: true,
	zindex: 9999999
});

/***************** backend date & time **********************/
var mintime = jQuery("#nzmpnt_data_val").data("wstarttime");
var starttime = jQuery("#nzmpnt_data_val").data("wstarttime");
var maxtime  = jQuery("#nzmpnt_data_val").data("wendtime");
var slotduration  = jQuery("#nzmpnt_data_val").data("slotduration");
jQuery(".nzm_back_form_date").datepicker({ minDate: 0, dateFormat: 'yy-mm-dd'});
jQuery(".nzm_back_form_time").timepicker({
	timeFormat: 'HH:mm',
	interval: slotduration,
	minTime: mintime,
	//defaultTime: '11',
	startTime: starttime,
	maxTime: maxtime,
	dynamic: false,
    dropdown: true,
    scrollbar: true,
	zindex: 9999999
});

/***************** Plugin Setting ajax **********************/
jQuery(document).on('click','#nzm_submit_plugsetting',function(event){
	var nzmpnt_zoom_token = jQuery("#nzmpnt_zoom_token").val();
	var nzmpnt_zoom_user_email = jQuery("#nzmpnt_zoom_user_email").val();
	var nzmpnt_wstart_time = jQuery("#nzmpnt_wstart_time").val();
	var nzmpnt_wend_time = jQuery("#nzmpnt_wend_time").val();
	var nzmpnt_slot_duration = jQuery(".nzmpnt_slot_duration:checked").length;
	var nzm_slot_duration_val = jQuery("input[name='nzmpnt_slot_duration']:checked").val();
	var nzmpnt_zoom_plan = jQuery(".nzmpnt_zoom_plan:checked").length;
	var nzm_zoom_plan_val = jQuery("input[name='nzmpnt_zoom_plan']:checked").val();
	var nzmpnt_zoom_timezone = jQuery("#nzmpnt_zoom_timezone").val();
	var nzmpnt_plugin_custom_css = jQuery("#nzmpnt_plugin_custom_css").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	event.preventDefault();
	jQuery('.nzmpnt_errordiv').text('');
	if(nzmpnt_zoom_plan == 0){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Choose Zoom Plan ');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	}else if(nzmpnt_zoom_token == ""){
         jQuery('.nzmpnt_errordiv').text('');
         jQuery('.nzmpnt_errordiv').text('Zoom Token is required');
         jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	}else if(nzmpnt_zoom_user_email == ""){
		jQuery('.nzmpnt_errordiv').text('');
	    jQuery('.nzmpnt_errordiv').text('Email address is required');
	    jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		return false;
	}else if (!emailReg.test(nzmpnt_zoom_user_email)) {
	    jQuery('.nzmpnt_errordiv').text('');
	    jQuery('.nzmpnt_errordiv').text('Enter Valid Email address');
	    jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		return false;
	}else if(nzmpnt_zoom_timezone == ""){
		jQuery('.nzmpnt_errordiv').text('');
	    jQuery('.nzmpnt_errordiv').text('Timezone is required');
	    jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		return false;
	}else if(nzmpnt_wstart_time == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Choose Start time is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	}else if(nzmpnt_wend_time == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Choose End time is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	}else if(nzmpnt_slot_duration == 0){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Choose Slot duration ');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	}
	jQuery("#nzmpnt_timezone_selected").text(nzmpnt_zoom_timezone);

	var dataJS = { action: 'nzmpnt_savePluginSetting', nzmpnt_zoom_plan: nzm_zoom_plan_val, nzmpnt_zoom_token: nzmpnt_zoom_token, nzmpnt_zoom_user_email: nzmpnt_zoom_user_email,nzmpnt_zoom_timezone: nzmpnt_zoom_timezone, nzmpnt_wstart_time: nzmpnt_wstart_time, nzmpnt_wend_time: nzmpnt_wend_time, nzmpnt_slot_duration: nzm_slot_duration_val,nzmpnt_plugin_custom_css: nzmpnt_plugin_custom_css}; 

	jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: dataJS,
		success : function(data){
			if (data.success == false){
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			}else if(data.success == true){
				jQuery(".nzmpnt_errordiv").addClass('active');
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery(".nzmpnt_errordiv").text(data.message);
			}
		 }
	});

});


/***************** Open Create Meeting Modal **********************/
jQuery(document).on('click','.add_meeting',function(event){
	event.preventDefault();
	jQuery('.nzmpnt_errordiv').text('');
	jQuery('#addMeeting').modal('show');
});

/***************** Create Meeting from admin ajax **********************/
jQuery(document).on('click','#create-meet-submit',function(event){
	var form_subject = jQuery("#form_subject").val();
	var form_password = jQuery("#nzmpnt_password").val();
	var form_date = jQuery("#nzmpnt_date").val();
	var form_time = jQuery("#nzmpnt_time").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	jQuery('.nzmpnt_errordiv').text('');
	event.preventDefault();
	 if(form_subject == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Subject is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }
	 if(form_password != ''){
	     if(isNaN(form_password)){
		     jQuery('.nzmpnt_errordiv').text('');
		     jQuery('.nzmpnt_errordiv').text('Password must contain only 6 digits');
		     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			 return false;
		 }else if(form_password.length < 6){
		     jQuery('.nzmpnt_errordiv').text('');
		     jQuery('.nzmpnt_errordiv').text('Password must be at least 6 digits');
		     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			 return false;
		 }else if(form_password.length > 6){
		     jQuery('.nzmpnt_errordiv').text('');
		     jQuery('.nzmpnt_errordiv').text('Password should not more than 6 digits');
		     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			 return false;
		 }
	 }
	 if(form_date == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Date is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }
	 if(form_time == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Time is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }
	var dataJS = { action: 'nzmpnt_createMeeting_admin', form_password: form_password, form_subject: form_subject, form_date: form_date, form_time: form_time}; 
	jQuery('.nzmpnt_preloader').addClass('active');
	jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: dataJS,
		success : function(data){
			if (data.success == false){
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if(data.success == true){
				jQuery("#meeting_form")[0].reset();
				jQuery(".nzmpnt_errordiv").addClass('active');
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_preloader').removeClass('active');
				setTimeout(function(){ location.reload(); }, 6000);
			}
		 }
	});

});

/***************** Open Add Participant Modal **********************/
jQuery(document).on('click','.addParticipant',function(event){
	var mid = jQuery(this).data('id');
	jQuery("#form_meetID").val(mid);
	event.preventDefault();
	jQuery('.nzmpnt_errordiv').text('');
	jQuery('#addParticipant').modal('show');
});

/***************** Add Participant from admin ajax **********************/
jQuery(document).on('click','#add-participant-submit',function(event){
	var mid = jQuery("#form_meetID").val();
	var part_firstname = jQuery("#part_firstname").val();
	var part_lastname = jQuery("#part_lastname").val();
	var part_email = jQuery("#part_email").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	event.preventDefault();
	jQuery('.nzmpnt_errordiv').text('');
	if(part_firstname == ''){
         jQuery('.nzmpnt_errordiv').text('');
         jQuery('.nzmpnt_errordiv').text('First Name is required');
         jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(part_lastname == ''){
         jQuery('.nzmpnt_errordiv').text('');
         jQuery('.nzmpnt_errordiv').text('Last Name is required');
         jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(part_email == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Email is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if (!emailReg.test(part_email)) {
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Enter Valid Email address');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }

	var dataJS = { action: 'nzmpnt_addRegistrant', mid: mid, form_firstname: part_firstname, form_lastname: part_lastname, form_email: part_email}; 
	jQuery('.nzmpnt_preloader').addClass('active');
	jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: dataJS,
		success : function(data){
			console.log(data);
			if (data.success == false){
				if(data.http_code == '400'){
					jQuery(".nzmpnt_errordiv").text("Not Added. Due to Bad Request");
				}else{
					jQuery(".nzmpnt_errordiv").text(data.response.message);
				}
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if(data.success == true){
				jQuery("#participant_form")[0].reset();
				jQuery(".nzmpnt_errordiv").addClass('active');
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_preloader').removeClass('active');
				setTimeout(function(){ location.reload(); }, 6000);
			}
		 }
	});

});

/***************** Open Edit Meeting Modal **********************/
jQuery(document).on('click','.editMeeting',function(event){
	var mid = jQuery(this).data('id');
	jQuery("#edit_meetID").val(mid);
	event.preventDefault();
	jQuery('#editMeeting').modal('show');
	jQuery('.nzmpnt_preloader').addClass('active');
	jQuery('.nzmpnt_errordiv').text('');
	var dataJS = { action: 'nzmpnt_getMeetingDetail', mid: mid}; 
	jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: dataJS,
		success : function(data){
			if (data.success == false){
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if(data.success == true){
				jQuery('#edit_form_subject').val(data.message.topic);
				jQuery('#edit_nzmpnt_password').val(data.message.password);
				jQuery('#edit_nzmpnt_date').val(data.message.start_date);
				jQuery('#edit_nzmpnt_time').val(data.message.start_time);
				jQuery('.nzmpnt_preloader').removeClass('active');
			}
		 }
	});
	
});

/***************** Update Meeting from admin ajax **********************/
jQuery(document).on('click','#edit-meet-submit',function(event){
	var mid = jQuery("#edit_meetID").val();
	var form_subject = jQuery("#edit_form_subject").val();
	var form_password = jQuery("#edit_nzmpnt_password").val();
	var form_date = jQuery("#edit_nzmpnt_date").val();
	var form_time = jQuery("#edit_nzmpnt_time").val();
	event.preventDefault();
	jQuery('.nzmpnt_errordiv').text('');
	  if(form_subject == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Subject is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }
	 if(form_password != ''){
	     if(isNaN(form_password)){
		     jQuery('.nzmpnt_errordiv').text('');
		     jQuery('.nzmpnt_errordiv').text('Password must contain only 6 digits');
		     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			 return false;
		 }else if(form_password.length < 6){
		     jQuery('.nzmpnt_errordiv').text('');
		     jQuery('.nzmpnt_errordiv').text('Password must be at least 6 digits');
		     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			 return false;
		 }else if(form_password.length > 6){
		     jQuery('.nzmpnt_errordiv').text('');
		     jQuery('.nzmpnt_errordiv').text('Password should not more than 6 digits');
		     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
			 return false;
		 }
	 }
	 if(form_date == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Date is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }
	 if(form_time == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Time is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }

	var dataJS = { action: 'nzmpnt_updateMeeting_admin', mid: mid, form_subject: form_subject, form_password: form_password, form_date: form_date, form_time: form_time}; 
	jQuery('.nzmpnt_preloader').addClass('active');
	jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: dataJS,
		success : function(data){
			if (data.success == false){
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if(data.success == true){
				jQuery("#edit_meeting_form")[0].reset();
				jQuery(".nzmpnt_errordiv").addClass('active');
				jQuery(".nzmpnt_errordiv").addClass('nzmpnt-mb-10');
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_preloader').removeClass('active');
				setTimeout(function(){ location.reload(); }, 6000);
			}
		 }
	});

});

/**************** Delete Ajax *********************/
jQuery(document).on('click','.deleteMeeting',function(event){
	var mid = jQuery(this).data('id');
	event.preventDefault();
    if(confirm("Are you sure? You want to delete this meeting?")){
        deleteAdminAjax(mid);
    }
    else{
        return false;
    }
});

/************* Delete Ajax Call *******************/
function deleteAdminAjax(mid){
	var dataJS = { action: 'nzmpnt_deleteMeeting_admin', mid: mid}; 
	jQuery('.nzmpnt_preloader').addClass('active');
    jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: dataJS,
		success : function(data){
			if(data.success == false){
				alert(data.message);
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if(data.success == true){
				alert(data.message);
				jQuery('.nzmpnt_preloader').removeClass('active');
				setTimeout(function(){ location.reload(); }, 500);
			}
		}
	});
}

jQuery('#nzmpnt_dataTable').DataTable({
	responsive: true,
	ordering: false
});

jQuery('.nzmpnt_preloader').removeClass('active');   
});