

$( "#cron" ).click(function() {
  $.ajax({
      type: "get",
      xhrFields: { withCredentials:true },
      url: 'http://med.dev.webstorm.co.il/cron-jobs/patient-tratment-status',
      success: function(data)
      {
        console.log("cron ok");
      }
      
})
  
    
});


