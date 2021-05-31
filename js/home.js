var no_completi = false;
var s5;

function registrazione() {
    if (no_completi==false) {
        header("Location: ./pages/box.php");
    } else alert("Tutti i campi devono essere completi");
}

function verificatoNome(e) {
    var s = document.getElementById("nome-reg").value;
    if (s!="") {
        no_completi=false;

        document.getElementById('nome-check').style.display="inline";
        
    } else no_completi= true;
}

function verificatoCognome(e) {
   var s1 = document.getElementById("cognome-reg").value;
   if (s1!="") {
        no_completi=false;
        
        document.getElementById('cognome-check').style.display="inline";
        
    } else no_completi= true;
    
}

function verificatoMail(e) {
  var s2 = document.getElementById("mail-reg").value;
  if (s2!="") {
    no_completi=false;
    if (s2.includes("@") && s2.includes(".")) {
      document.getElementById('mail-check').style.display="inline";
      } else alert("Email non valida.");
  } else no_completi= true;
  
}

function verificatoPsw(e) {
  var s3 = document.getElementById("psw-reg").value;
  
  if (s3!="") {
    no_completi=false;
    if (s3.length>5) {
      document.getElementById('psw-check').style.display="inline";
    }

} else no_completi= true;
  
}

function verificatoPswConf(e) {
  var s4 = document.getElementById("psw-reg-conf").value;
  if (s4!="") {
    no_completi=false;
    if (s4==document.getElementById("psw-reg").value) {
      document.getElementById('psw-check-conf').style.display="inline";
    }
  } else no_completi= true;
    
  }
  
  