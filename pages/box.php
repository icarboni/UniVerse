<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bacheca</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="//code.jquery.com/jquery-3.5.0.js"></script>
   
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="../css/box.css" type="text/css">
  <script type="text/javascript" src="../js/box.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">  

  <script> 
    function bacheca() {
        $(document).ready(function(){
        $('#internoBox').load('./bacheca.php');
                });
        }

        function iscrizione() {
        $(document).ready(function(){
        $('#internoBox').load('./iscrizione.php');
                });
        }

        function carriera() {
        $(document).ready(function(){
        $('#internoBox').load('./carriera.php');
                });
        }

/*
        function esame_charge(c) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                document.getElementById("internoBox").innerHTML = this.responseText;
            }
            };

            xmlhttp.open("GET","recensionim.php?codex="+c,true);
            xmlhttp.send();

            }*/

            function esamec(c) {
                codex=c;
                <?php $_SESSION['page'] = 'esame';   ?>
                $(document).ready(function(){
                    $('#internoBox').load('./recensionim.php?codex='+codex);
                });
        }

            function agenda() {
                $(document).ready(function(){
                $('#internoBox').load('./agenda.php');
                        });
            }

            function orario() {
                $(document).ready(function(){
                $('#internoBox').load('./orario.php');
                        });
            }



    </script>

<?php

    session_start();
    
    if(!isset($_SESSION["mail"])) {
        header("Location: ./../index.php");
        } else {
            
            include "./../php/connect.php";
            
            $mail = $_SESSION["mail"];
            $sql_utente = "SELECT * FROM utenti WHERE mail = '$mail' " ;
            $result = $conn->query($sql_utente);
            if ($result->num_rows <1) {
                header("Location: ./index.php");
            } else {
                
                $utente = $result->fetch_assoc();
                $cod_utente = $utente['cod_utente'];
                $_SESSION['cod_utente'] = $cod_utente;
                $_SESSION['nome'] = $utente['nome'];
                
                $sql_corso = "SELECT * FROM corso, iscrizione WHERE iscrizione.cod_utente = '$cod_utente' and  iscrizione.corso = corso.cod_corso" ;
                $result = $conn->query($sql_corso);
                
                
                if ($result->num_rows >= 1) {
                    $corso = $result->num_rows;
                    $_SESSION['corso'] = $corso['cord_corso'];
                    $_SESSION['anno']= $corso['anno'];
                    if ($_SESSION['page'] =='carriera') {
                        echo "<script>carriera();</script>";
                    } elseif ($_SESSION['page'] =='bacheca') {
                        echo "<script>bacheca();</script>";
                    } elseif ($_SESSION['page'] =='agenda') {
                        echo "<script>agenda();</script>";
                    } elseif ($_SESSION['page'] =='orario') {
                        echo "<script>orario();</script>";
                    } else {
                        echo "<script>bacheca();</script>";
                    }
                } else echo "<script>iscrizione();</script>";
    ?>

</head>
<body>


<!-- Codice originale sidebar: https://www.codeply.com/p/Nkp8O77PFS -->


<div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-lg-3 col-xl-2 px-lg-2 px-0 bg-light d-flex sticky-top ">
            <div class="d-flex flex-lg-column flex-row flex-grow-1 align-items-center align-items-lg-start px-3 pt-2 text-black">
                <a  class="d-flex align-items-center pb-lg-3 mb-lg-0 me-lg-auto text-white text-decoration-none">
              
                    <img src="../images/logo-viola-piccolo.png" alt="" width="150" height="38"  class="d-inline-block align-text-top">
                </a>
                
                <ul class="nav nav-pills flex-lg-column flex-row flex-nowrap flex-shrink-1 flex-lg-grow-0 flex-grow-1 mb-lg-auto mb-0 justify-content-center align-items-center align-items-lg-start" id="menu">
                <li class="nav-item">
                        <a onClick="<?php $_SESSION['page']='bacheca'; echo 'bacheca();';?>" class="nav-link px-lg-0 px-2">
                        <i class="bi-house-fill"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Bacheca</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="<?php $_SESSION['page']='carriera'; echo 'carriera();';?>" class="nav-link px-lg-0 px-2">
                        <i class="icons bi-ui-checks"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Carriera</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="<?php $_SESSION['page'] = 'orario'; echo 'orario();';?>" class="nav-link px-lg-0 px-2">
                            <i class="icons bi-clock-fill"></i><span class="ms-1 d-none d-lg-inline txt nav-txt">Orario</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="<?php $_SESSION['page'] = 'agenda'; echo 'agenda();';?>" class="nav-link px-lg-0 px-2">
                            <i class="icons bi-calendar-event-fill"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Agenda</span>
                        </a>
                    </li>

                    
        
                </ul>



                <div class="dropdown py-lg-4 mt-lg-auto ms-auto ms-lg-0 flex-shrink-1">
                        <a class="nav-link dropdown-toggle px-lg-0 px-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../images/user.png" alt="userpic" width="35" height="35" class="rounded-circle">
                            <span class="d-none d-lg-inline mx-1" style="color: black;"><?php echo $utente["nome"]. " " . $utente["cognome"]; ?></span>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="navbarDropdownMenuLink">
                                
                                <li><a class="dropdown-item" href="#">Impostazioni</a></li>
                                
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Esci</a></li>
                            </ul>
                </div>



            </div>
        </div>
        <div class="col d-flex flex-column h-100">
            <main class="row overflow-scroll">
                <div id="internoBox" class="col pt-4">
                    
                    
                    
                </div>
            </main>
            
        </div>
    </div>
</div>

</body>
</html>

<?php
            
        }
}
?>
