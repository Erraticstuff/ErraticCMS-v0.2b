  function phpinf() {
    var x = document.getElementById("phpinfo");
    if (x.style.display === "none") {
      x.style = "display: block; background-color: white; color: black; padding: 15px; width: 100%; height: 75%; overflow: scroll; border: 1px solid #ccc; max-width: 600px; min-width: 300px; width:auto; max-height: 600px; min-height: 300px; height:auto; overflow: scroll;";
    } else {
      x.style.display = "none";
    }
  }

  function exportaction() {
    document.getElementById('event-loading').innerHTML = "Exporting...";
    setTimeout(document.getElementById('warning').innerHTML = "Warning! It may take a few minutes! Don't close this page!<br>PLEASE NOTE : WE RECOMMENDED TO INCREASE Maximum execution time VALUE!", 25000);
  }