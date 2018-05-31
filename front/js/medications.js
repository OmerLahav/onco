//check the part of the day
function timeChecker() {
    var d = new Date();
    var n = d.getHours();
     if(n>=6 && n<=12)
     {
     document.getElementById("card-morrning").style.backgroundColor = "rgb(0,200,200)"; 
        document.getElementById("afternoon-akamol-one").disabled = true;
         document.getElementById("afternoon-akamol-two").disabled = true;
         document.getElementById("evening-akamol-one").disabled = true;
         document.getElementById("evening-akamol-two").disabled = true;
         document.getElementById("night-akamol-one").disabled = true;
         document.getElementById("night-akamol-two").disabled = true;
         $(".afternoon-box, .night-box, .evening-box").click(function() {
              alert("Now it is morning time");
            });
               
         
         $('#mecication-submit').click(function () {
        if (!$("input[name='morning-acamol']:checked").val()) {
            alert('You must select the right meducatcation');
        } 
        });

         
    }
    else if (n>12 && n<=18)
    {
      document.getElementById("card-afternoon").style.backgroundColor = "rgb(0,200,200)"; 
        document.getElementById("morning-akamol-one").disabled = true;
         document.getElementById("morning-akamol-two").disabled = true;
         document.getElementById("evening-akamol-one").disabled = true;
         document.getElementById("evening-akamol-two").disabled = true;
         document.getElementById("night-akamol-one").disabled = true;
         document.getElementById("night-akamol-two").disabled = true;
        $(".morning-box, .night-box, .evening-box").click(function() {
              alert("Now it is afternoon time");
            });

             
  $('#mecication-submit').click(function () {
        if (!$("input[name='afternoon-acamol']:checked").val()) {
            alert('You must select the right meducatcation');
        } 
        });
               


    }
    else if (n>18 && n<=24)
    {
      document.getElementById("card-evening").style.backgroundColor = "rgb(0,200,200)"; 
       document.getElementById("morning-akamol-one").disabled = true;
         document.getElementById("morning-akamol-two").disabled = true;
         document.getElementById("afternoon-akamol-one").disabled = true;
         document.getElementById("afternoon-akamol-two").disabled = true;
         document.getElementById("night-akamol-one").disabled = true;
         document.getElementById("night-akamol-two").disabled = true;
        $(".morning-box, .night-box, .afternoon-box").click(function() {
              alert("Now it is evening time");
            });
        
         $('#mecication-submit').click(function () {
        if (!$("input[name='evening-acamol']:checked").val()) {
            alert('You must select the right meducatcation');
        } 
        });
            
      


    }
    
    else 
    {
          document.getElementById("card-night").style.backgroundColor = "rgb(0,200,200)"; 
        document.getElementById("morning-akamol-one").disabled = true;
         document.getElementById("morning-akamol-two").disabled = true;
         document.getElementById("afternoon-akamol-one").disabled = true;
         document.getElementById("afternoon-akamol-two").disabled = true;
         document.getElementById("evening-akamol-one").disabled = true;
         document.getElementById("evening-akamol-two").disabled = true;
        $(".afternoon-box, .evening-box, .morning-box").click(function() {
              alert("Now it is night time");
            });
         $('#mecication-submit').click(function () {
        if (!$("input[name='night-akamol']:checked").val()) {
            alert('You must select the right meducatcation');
        } 
        });
            
              
 
    }
}


//date and time

function updateTime() {
  var dateInfo = new Date();

  /* time */
  var hr,
    _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
  
    ampm = (dateInfo.getHours() >= 12) ? "PM" : "AM";

  // replace 0 with 12 at midnight, subtract 12 from hour if 13–23
  if (dateInfo.getHours() == 0) {
    hr = 12;
  } else if (dateInfo.getHours() > 12) {
    hr = dateInfo.getHours() - 12;
  } else {
    hr = dateInfo.getHours();
  }

  var currentTime = hr + ":" + _min ;

  // print time
  document.getElementsByClassName("hms")[0].innerHTML = currentTime;
  document.getElementsByClassName("ampm")[0].innerHTML = ampm;

  /* date */
  var dow = [
      "Sunday",
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    month = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ],
    day = dateInfo.getDate();

  // store date
  var currentDate = dow[dateInfo.getDay()] + ", " + month[dateInfo.getMonth()] + " " + day;

  document.getElementsByClassName("date")[0].innerHTML = currentDate;
};

// print time and date once, then update them every second
updateTime();
setInterval(function() {
  updateTime()
}, 1000);

