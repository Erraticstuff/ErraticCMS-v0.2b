//Variables
var getkey = localStorage.getItem("theme");
var div = document.querySelector("body");

//MAIN
if (getkey == "undefined") {
  localStorage.setItem("theme", "white");
}
                
function toggleclr(div) {
  if (getkey == "white") {
    localStorage.removeItem("theme");
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.removeItem("theme");
    localStorage.setItem("theme", "white");
  }
  alert("Note : Please refresh this page to save the changes");
} 
                
if (getkey !== "white") {
    div.style = "color: white; background-color: black;";
    document.getElementById('txt').innerHTML = '<i class="glyphicon glyphicon-adjust"></i> Switch to white mode</a>'
} else {
    div.style = "color: black; background-color: white;";
    document.getElementById('txt').innerHTML = '<i class="glyphicon glyphicon-adjust"></i> Switch to dark mode</a>'
}
//END