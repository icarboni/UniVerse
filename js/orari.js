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

function setdate() {
    var d =  new Date();
    var nummese = d.getMonth(); var mese; if(nummese==0) mese="Gennaio"; else if(nummese==1) mese="Febbraio"; else if(nummese==2) mese="Marzo"; else if(nummese==3) mese="Aprile"; 
    else if(nummese==4) mese="Maggio"; else if(nummese==5) mese="Giugno"; else if(nummese==6) mese="Luglio"; else if(nummese==7) mese="Agosto"; else if(nummese==8) mese="Settembre"; 
    else if(nummese==9) mese="Ottobre"; else if(nummese==10) mese="Novembre"; else mese="Dicembre";
    document.getElementById("main").innerHTML = mese+" "+d.getFullYear();
    var daynum = d.getDay();
    var day = d.getDate();
    document.getElementById(daynum).setAttribute("class", "day current");
    if (daynum==1) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+day;
        document.getElementById("2").innerHTML = "Martedì"+" "+(day+1);
        document.getElementById("3").innerHTML = "Mercoledì"+" "+(day+2);
        document.getElementById("4").innerHTML = "Giovedì"+" "+(day+3);
        document.getElementById("5").innerHTML = "Venerdì"+" "+(day+4);
        document.getElementById("6").innerHTML = "Sabato"+" "+(day+5);
        document.getElementById("7").innerHTML = "Domenica"+" "+(day+6);
    }
    if (daynum==2) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+(day-1);
        document.getElementById("2").innerHTML = "Martedì"+" "+day;
        document.getElementById("3").innerHTML = "Mercoledì"+" "+(day+1);
        document.getElementById("4").innerHTML = "Giovedì"+" "+(day+2);
        document.getElementById("5").innerHTML = "Venerdì"+" "+(day+3);
        document.getElementById("6").innerHTML = "Sabato"+" "+(day+4);
        document.getElementById("7").innerHTML = "Domenica"+" "+(day+5);
    }
    if (daynum==3) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+(day-2);
        document.getElementById("2").innerHTML = "Martedì"+" "+(day-1);
        document.getElementById("3").innerHTML = "Mercoledì"+" "+day;
        document.getElementById("4").innerHTML = "Giovedì"+" "+(day+1);
        document.getElementById("5").innerHTML = "Venerdì"+" "+(day+2);
        document.getElementById("6").innerHTML = "Sabato"+" "+(day+3);
        document.getElementById("7").innerHTML = "Domenica"+" "+(day+4);
    }
    if (daynum==4) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+(day-3);
        document.getElementById("2").innerHTML = "Martedì"+" "+(day-2);
        document.getElementById("3").innerHTML = "Mercoledì"+" "+(day-1);
        document.getElementById("4").innerHTML = "Giovedì"+" "+day;
        document.getElementById("5").innerHTML = "Venerdì"+" "+(day+1);
        document.getElementById("6").innerHTML = "Sabato"+" "+(day+2);
        document.getElementById("7").innerHTML = "Domenica"+" "+(day+3);
    }
    if (daynum==5) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+(day-4);
        document.getElementById("2").innerHTML = "Martedì"+" "+(day-3);
        document.getElementById("3").innerHTML = "Mercoledì"+" "+(day-2);
        document.getElementById("4").innerHTML = "Giovedì"+" "+(day-1);
        document.getElementById("5").innerHTML = "Venerdì"+" "+day;
        document.getElementById("6").innerHTML = "Sabato"+" "+(day+1);
        document.getElementById("7").innerHTML = "Domenica"+" "+(day+2);
    }
    if (daynum==6) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+(day-5);
        document.getElementById("2").innerHTML = "Martedì"+" "+(day-4);
        document.getElementById("3").innerHTML = "Mercoledì"+" "+(day-3);
        document.getElementById("4").innerHTML = "Giovedì"+" "+(day-2);
        document.getElementById("5").innerHTML = "Venerdì"+" "+(day-1);
        document.getElementById("6").innerHTML = "Sabato"+" "+day;
        document.getElementById("7").innerHTML = "Domenica"+" "+(day+1);
    }
    if (daynum==7) {
        document.getElementById("1").innerHTML = "Lunedì"+" "+(day-6);
        document.getElementById("2").innerHTML = "Martedì"+" "+(day-5);
        document.getElementById("3").innerHTML = "Mercoledì"+" "+(day-4);
        document.getElementById("4").innerHTML = "Giovedì"+" "+(day-3);
        document.getElementById("5").innerHTML = "Venerdì"+" "+(day-2);
        document.getElementById("6").innerHTML = "Sabato"+" "+(day-1);
        document.getElementById("7").innerHTML = "Domenica"+" "+day;
    }
}

function changeview(e) {
    var v = e.target.getAttribute("id");
    var a = v[4];
    $('#inernoBox').load('../pages/orari.php?anno='+a);
    window.location.href = '../pages/orari.php?anno='+a;
}

function changefirst() {
    var i;
    var ssex = document.getElementsByName("secondsem");
    for (i=0; i< ssex.length; i++) {
        ssex[i].style.display = "none";
    }
    var fsex = document.getElementsByName("firstsem");
    for (i=0; i< fsex.length; i++) {
        fsex[i].style.display = "block";
    }
}

function changesecond() {
    var i;
    var fsex = document.getElementsByName("firstsem");
    for (i=0; i< fsex.length; i++) {
        fsex[i].style.display = "none";
    }
    var ssex = document.getElementsByName("secondsem");
    for (i=0; i< ssex.length; i++) {
        ssex[i].style.display = "block";
    }
}