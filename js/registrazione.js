function registrazione() {
    if (document.getElementById("accettoCheck").checked == true) {
        document.getElementById("checktext").style.color = "black";
    var xhttp;
       
      var nome = document.getElementById("nome-reg").value;
      var cognome= document.getElementById("cognome-reg").value;
      var mail = document.getElementById("mail-reg").value;
      var psw = document.getElementById("psw-reg").value;
      var psw2 = document.getElementById("psw-reg-conf").value;

      
     
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==1) {
           window.location.href = "pages/bacheca.php";
        } 
        //else document.getElementById("message").innerHTML = "Mail o password non corretti.<br>";
            
        };
    }
        xhttp.open("POST", "php/registrazione.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("nome="+nome+"&cognome="+cognome+"&mail="+mail+"&psw="+psw);
    } else {
        document.getElementById("checktext").style.color = "red";
    }
}
