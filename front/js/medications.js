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
    }
}

 

