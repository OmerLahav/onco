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
                $('#morning-big').attr('src', "images/medication-time/morning-2.png");

         
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

               $('#afternoon-big').attr('src', "images/medication-time/afternoon-2.png");

               


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
       $('#evening-big').attr('src', "images/medication-time/evening-2.png");


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
        $(".afternoon-box, .night-box, .morning-box").click(function() {
              alert("Now it is night time");
            });
               $('#night-big').attr('src', "images/medication-time/night-2.png");
 
    }
}


