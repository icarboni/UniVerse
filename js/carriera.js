 // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches(".btn")) {
      var dropdowns = document.getElementsByClassName("dropdown-menu");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains("show")) {
          openDropdown.classList.remove("show");
        }
      }
    }
  }

  function toggleinsertexam (c) {
    document.getElementById("triggervoto").setAttribute("onclick", "insertex('"+c+"')");
    $('#inserisciEsame').modal('show');
  }

  function insertex(codesame) {
    votoesame = document.getElementById("votoesame").value;
    if (votoesame < 18 || votoesame > 31) { alert('Il valore del voto non è valido');
          return false;
          }
    else {
          var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                if (this.responseText==1) {
                  $('#inserisciEsame').modal('hide');
                  alert('Hai inserito in Carriera questo esame: '+codesame+'\nAggiornamento esami svolti');
                  window.location.reload();
                }
                else { 
                  alert('something went wrong!');
                     }
           
                }
              };
      xhttp.open("POST", "../php/inserisciesame.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("codesame="+codesame+"&votoesame="+votoesame);
      }
  }

  function toggleremoveexam(codesame) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==1) {
          $('#inserisciEsame').modal('hide');
          alert('Hai rimosso dalla Carriera questo esame: '+codesame+'\nAggiornamento esami svolti');
          window.location.reload();
        }
        else { 
          alert('something went wrong!');
            }
 
        }
      };
      xhttp.open("POST", "../php/rimuoviesame.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("codesame="+codesame);
}

  function changeesamidone() {
    document.getElementById("Esami1").setAttribute("style", "display:none");
    document.getElementById("Esami2").setAttribute("style", "display:none");
    document.getElementById("Esami3").setAttribute("style", "display:none");
    document.getElementById("Esamitodo").setAttribute("style", "display:none");
    document.getElementById("Esamidone").setAttribute("style", "display:flex");
  }
  
  function changeesamitodo() {
    document.getElementById("Esami1").setAttribute("style", "display:none");
    document.getElementById("Esami2").setAttribute("style", "display:none");
    document.getElementById("Esami3").setAttribute("style", "display:none");
    document.getElementById("Esamidone").setAttribute("style", "display:none");
    document.getElementById("Esamitodo").setAttribute("style", "display:flex");
  }

  function ondropitemclick(e) {
    var x = e.target.getAttribute("name");
    if (x=="1") {
      document.getElementById("Esami2").setAttribute("style", "display:none");
      document.getElementById("Esami3").setAttribute("style", "display:none");
      document.getElementById("Esamidone").setAttribute("style", "display:none");
      document.getElementById("Esamitodo").setAttribute("style", "display:none");
    }
    else if (x=="2") {
      document.getElementById("Esami1").setAttribute("style", "display:none");
      document.getElementById("Esami3").setAttribute("style", "display:none");
      document.getElementById("Esamidone").setAttribute("style", "display:none");
      document.getElementById("Esamitodo").setAttribute("style", "display:none");
    }
    else {
      document.getElementById("Esami1").setAttribute("style", "display:none");
      document.getElementById("Esami2").setAttribute("style", "display:none");
      document.getElementById("Esamidone").setAttribute("style", "display:none");
      document.getElementById("Esamitodo").setAttribute("style", "display:none");
    }
    document.getElementById("Esami" + x).setAttribute("style", "display:flex");
  }

function rate(c) {
  var r;
  var rates = document.getElementsByName("rate");
      for (i = 0; i < rates.length; i++) {
          if (rates[i].checked) {
            r = rates[i].value;
          }
      }
  var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==1) {
          $('#inseriscival').modal('hide');
          alert('Hai valutato questo corso con '+r+' stelle!');
          document.getElementById("btn-"+c).disabled = true;
        }
        else { 
          alert('something went wrong');
             }
        }
      };
      xhttp.open("POST", "../php/valuta.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("rate="+r+"&codexam="+c);
}