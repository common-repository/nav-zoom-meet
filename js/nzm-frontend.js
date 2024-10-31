jQuery(document).ready(function() {
var mintime = jQuery("#nzmpnt_data_val").data("wstarttime");
var starttime = jQuery("#nzmpnt_data_val").data("wstarttime");
var maxtime  = jQuery("#nzmpnt_data_val").data("wendtime");
var slotduration  = jQuery("#nzmpnt_data_val").data("slotduration");
jQuery("#nzmpnt_date").datepicker({ minDate: 0, dateFormat: 'yy-mm-dd'});
jQuery("#nzmpnt_time").timepicker({
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

jQuery('.nzmpnt_errordiv').removeClass('nzmpnt-mb-10'); 
jQuery(document).on('click','.nzmpnt_submit',function(event) {
	   var zoomplan = jQuery("#nzmpnt_data_val").data("zoomplan");	
       var form_firstname = jQuery("#nzmpnt_firstname").val();
       var form_lastname = jQuery("#nzmpnt_lastname").val();
       var form_email = jQuery("#nzmpnt_email").val();
       var form_subject = jQuery("#nzmpnt_subject").val();
       var form_date = jQuery("#nzmpnt_date").val();
       var form_time = jQuery("#nzmpnt_time").val();
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       event.preventDefault();
     if(form_firstname == ''){
         jQuery('.nzmpnt_errordiv').text('');
         jQuery('.nzmpnt_errordiv').text('First Name is required');
         jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(form_lastname == ''){
         jQuery('.nzmpnt_errordiv').text('');
         jQuery('.nzmpnt_errordiv').text('Last Name is required');
         jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(form_email == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Email is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if (!emailReg.test(form_email)) {
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Enter Valid Email address');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(form_subject == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Meeting Title/Subject is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(form_date == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Date is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }else if(form_time == ''){
	     jQuery('.nzmpnt_errordiv').text('');
	     jQuery('.nzmpnt_errordiv').text('Time is required');
	     jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
		 return false;
	 }
    
    jQuery(".nzmpnt_preloader").addClass('active');
	jQuery.ajax({
		url: nzmpnt_ajax_object.ajaxurl,
		type: 'POST',
		dataType: "json",
		data: { action: 'nzmpnt_createMeeting_submit', zoomplan: zoomplan, form_firstname: form_firstname, form_lastname: form_lastname, form_email: form_email, form_subject: form_subject, form_date: form_date, form_time: form_time},
		success : function(data){
			if (data.success == false){
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if (data.code == false){
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery('.nzmpnt_preloader').removeClass('active');
			}else if(data.success == true){
				jQuery("#meeting_form")[0].reset();
				jQuery(".nzmpnt_errordiv").addClass('active');
				jQuery('.nzmpnt_errordiv').addClass('nzmpnt-mb-10');
				jQuery(".nzmpnt_errordiv").text(data.message);
				jQuery('.nzmpnt_preloader').removeClass('active');
			}
		 }
	});
  
});

});