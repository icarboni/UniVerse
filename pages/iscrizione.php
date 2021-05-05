<link rel="stylesheet" href="../css/bacheca4.css" type="text/css">

<?php
    session_start();
    include "./../php/connect.php";


    ?>
<div class="row mr-3 ml-3">
    <h5 class="card-title">Benvenuto/a <?php echo $utente["nome"]; ?></h5>
</div>



<script>

    var uni;
    var corso;
    var anno;
    function mostraCorso(str) {
        uni = str;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Devi selezionare un'universita.";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("corso").innerHTML = this.responseText;
        }
        };

        xmlhttp.open("GET","../php/getUni.php?q="+str,true);
        xmlhttp.send();
     }
    }

    function mostraAnno(str) {
        corso=str;
    if (str == "") {
        document.getElementById("anno").innerHTML = "Devi selezionare un corso di studi.";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("anno").innerHTML = this.responseText;
        }
        };

        xmlhttp.open("GET","../php/getAnno.php?q="+str,true);
        xmlhttp.send();
     }
    }

    function mostraContinua(str) {
        anno=str;
    if (str == "") {
        document.getElementById("txt").innerHTML = "Devi selezionare l'anno che stai frequentando.";
        return;
    } else {
        document.getElementById("iscrizione").innerHTML = "<br><button type='button' class='dark-btn btn' onClick='iscrizione()'>Continua</button>";
        
        }
     }

    function iscrizione() {
       
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText==1) {
                
                $("#internoBox").load( "./esami.php" );
                //window.location.href = "box.php";
        }
        if (this.responseText==0) {
              alert("Errore");
        }
            
        };
        }

        xhttp.open("POST", "../php/post_iscrizione.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("uni="+uni+"&corso="+corso+"&anno="+anno);
        
    }
    


</script>

<div class="row mr-3 ml-3">
    <div class="col-12 col-lg main shadow p-3 mb-3 mr-md-2 bg-body rounded" style="height: 90vh;">
        <h4 class="card-title">Grazie di esserti iscritto a Universe!</h4>
        <br>
        <h5>Abbiamo bisogno di alcune informazioni aggiuntive sui tuoi studi.</h5>
        <h5>Rispondi alle seguenti domande per proseguire</h5>
        <br>
        <h6> Seleziona la tua universita tra quelle proposte:</h6>
        <form>
            <div class="select">
            <select name="uni" id="uni" class="form-select form-select-lg select" onchange="mostraCorso(this.value)">
                <option value=""></option>
            <?php 

                
                $sql_uni = "SELECT cod_uni, nome FROM universita" ;
                $result = $conn->query($sql_uni);
                while ($uni = $result->fetch_assoc()) {
                    echo "<option value='".$uni['cod_uni']."'>".$uni['nome']."</option>";
                    }
                ?>
            </select>
            </div>
            <b><div id="corso"></div></b>
            <b><div id="anno"></div></b>
            <b><div id="txt"></div></b>
            <div id="iscrizione"></div>
        </form>
    </div>
   


    

