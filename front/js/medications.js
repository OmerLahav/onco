
function timeChecker() {
    var d = new Date();
    var n = d.getHours();
    alert(n);
     if(n>=6 && n<=12)
     {
     document.getElementById("card-morrning").style.backgroundColor = "#e6e600"; 
    }
    else if (n>12 && n<=18)
    {
      document.getElementById("card-afternoon").style.backgroundColor = "#ff9900"; 
    }
    else if (n>18 && n<=24)
    {
      document.getElementById("card-evening").style.backgroundColor = "#4747d1"; 
    }
    else
    {
          document.getElementById("card-morrning").style.backgroundColor = "#3d3d5c"; 
    }
}
