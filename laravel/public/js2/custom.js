$("#add_appointment_btn").prop('disabled',true);

//Get Slots Base on Appointment Date and Medical Staff Type
$('body').on('click', '#find_slots', function (e) {
    var appointmentDate = $("#appointment_date").val();

    if(appointmentDate != "")
    {
    	//Find slots of that particular date
    	var ajaxUrl = $("#ajax_slot_fetch_url").val();
    	$.ajax({
		    url: ajaxUrl,
		    data: 'appointmentDate='+appointmentDate+'&medicalStaffType='+$("#medical_staff_type").val()+'&doctorId='+$("#doctor_id").val(),
		    type: "POST",
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      },
		      beforeSend: function () {
		        $("#page_loader").show();
		      },
		      success:function(slotRes){
		      	
		        if(slotRes.status)
		        {
		        	$("#slot_html").html(slotRes.html);
		        	$("#add_appointment_btn").prop('disabled',true);
		        }
		        else
		        {
		        	alert(slotRes.msg);
		        	$("#add_appointment_btn").prop('disabled',true);
		        }
		        $("#type").val(slotRes.type);
		      	$("#page_loader").hide();
		        
		      },
		      error:function (){
		        alert("There is some error in server side.");
		      	$("#add_appointment_btn").prop('disabled',true);
		      }
		    });

    }
    else
    {
    	alert("Please select appoontment date.");
    }

});
//Click on any slot then we get that slot time and store in input type hidden for store in database
$('body').on('click', '.slots', function (e) {
	
	$("#appointment_time").val($(this).attr('slot_time'));
	$("#add_appointment_btn").prop('disabled',false);
	$("#google_clender_btn").prop('disabled',false);
});
