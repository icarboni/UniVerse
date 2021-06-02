function valutaex () {
    $('#inseriscival').modal('show');
}

function removecomment(idcomm) {
    var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==1) {
          window.location.reload();
        }
        else { 
          alert('something went wrong!');
            }
 
        }
      };
      xhttp.open("POST", "../php/rimuovicommento.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("idcommento="+idcomm);

}

function reply(idcommento, codexam) {
    document.getElementById("replycommentText").value = "";
    document.getElementById("rispondibtn").setAttribute("onclick", "comment("+codexam+","+idcommento+")");
    var resetbtn = document.getElementsByClassName("dark-btn");
    var i;
    for (i=0; i<resetbtn.length; i++) {
        if (resetbtn[i].getAttribute("id") != "repbtnto"+idcommento) resetbtn[i].innerHTML = "Rispondi";
    }
    if (document.getElementById("repbtnto"+idcommento).innerHTML == "Rispondi") {
        var s = document.getElementById("replyarea");
        s.setAttribute("style", "display:inline");
        $('#'+idcommento).append(s);
        document.getElementById("repbtnto"+idcommento).innerHTML = "Annulla";
    }
    else {
        var s = document.getElementById("replyarea");
        s.setAttribute("style", "display:none");
        document.getElementById("repbtnto"+idcommento).innerHTML = "Rispondi";
    }
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
            document.getElementById("valutabtn").disabled = true;
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

function disable() {
  document.getElementById("valutabtn").disabled = true;
}

