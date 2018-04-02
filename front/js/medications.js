
function myFunction() {
    var d = new Date();
    var n = d.getHours();
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
      document.getElementById("card-morrning").style.backgroundColor = "#804d00"; 
    }
    else
    {
          document.getElementById("card-morrning").style.backgroundColor = "#3d3d5c"; 
    }
}
