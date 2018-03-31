var d = new Date();

function next(){
var nextDay=new Date(d);
var dateValue = nextDay.getDate() + 1;
nextDay.setDate(dateValue);
return nextDay;
document.getElementById("current").innerHTML = nextDay.toLocaleString();

}

function prev(){
var prevDay=new Date(d);
var dateValue = prevDay.getDate() - 1;
prevDay.setDate(dateValue);
return prevDay;
document.getElementById("current").innerHTML = prevDay.toLocaleString();

}

document.getElementById("current").onload = curr();

function curr() {
    document.getElementById("current").innerHTML = d.toLocaleString();
}

