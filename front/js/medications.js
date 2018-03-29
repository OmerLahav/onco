function  showDate(){
 var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;
} 

today = dd+'/'+mm+'/'+yyyy;
return today;
  
 }  


function  showNextDate(){
var next= new Date();
tomorrow.setDate(today.getDate()+1);
return next;
}

function  showPreviousDate(){
var previous= new Date();
tomorrow.setDate(today.getDate()-1);
previous=tomorrow.setDate(today.getDate()-1);
return previous;
}


    document.getElementById("current").innerHTML = showDate();
 document.getElementById("next").innerHTML = showNextDate();
 document.getElementById("previous").innerHTML = showPreviousDate();
