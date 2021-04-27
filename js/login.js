function login() {
    var xhttp;
        document.getElementById("message").innerHTML = "";
      var mail = document.getElementById("mail-login").value;
      var psw = document.getElementById("psw-login").value;

      if ((mail=="") || (psw=="")) {
        alert("Inserire email e password prima di continuare.");
      } else {
     
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==1) {
           window.location.href = "pages/bacheca.php";
        } else document.getElementById("message").innerHTML = "Mail o password non corretti.<br>";
            
        };
        }
        xhttp.open("POST", "php/login.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("mail="+mail+"&psw="+psw);
}
}