//check the part of the day
function timeChecker() {
    var d = new Date();
    var n = d.getHours();
     if(n>=6 && n<=12)
     {
     document.getElementById("card-morrning").style.backgroundColor = "rgb(0,200,200)"; 
        
       
                $('#morning-big').attr('src', "images/medication-time/morning-2.png");

         
    }
    else if (n>12 && n<=18)
    {
      document.getElementById("card-afternoon").style.backgroundColor = "rgb(0,200,200)"; 
        
      

               $('#afternoon-big').attr('src', "images/medication-time/afternoon-2.png");

               


    }
    else if (n>18 && n<=24)
    {
      document.getElementById("card-evening").style.backgroundColor = "rgb(0,200,200)"; 
      
  
       $('#evening-big').attr('src', "images/medication-time/evening-2.png");


    }
    
    else 
    {
          document.getElementById("card-night").style.backgroundColor = "rgb(0,200,200)"; 
       
        
               $('#night-big').attr('src', "images/medication-time/night-2.png");
 
    }
}





//date and time

function updateTime() {
  var dateInfo = new Date();

  /* time */
  var hr,
    _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
    sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds(),
    ampm = (dateInfo.getHours() >= 12) ? "PM" : "AM";

  // replace 0 with 12 at midnight, subtract 12 from hour if 13–23
  if (dateInfo.getHours() == 0) {
    hr = 12;
  } else if (dateInfo.getHours() > 12) {
    hr = dateInfo.getHours() - 12;
  } else {
    hr = dateInfo.getHours();
  }

  var currentTime = hr + ":" + _min + ":" + sec;

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


