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
                    echo "<script>bacheca();</script>";
                  
                } else echo "<script>iscrizione();</script>";
    ?>

</head>
<body>


<!-- Codice originale sidebar: https://www.codeply.com/p/Nkp8O77PFS -->


<div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-lg-3 col-xl-2 px-lg-2 px-0 bg-light d-flex sticky-top ">
            <div class="d-flex flex-lg-column flex-row flex-grow-1 align-items-center align-items-lg-start px-3 pt-2 text-black">
                <a href="/" class="d-flex align-items-center pb-lg-3 mb-lg-0 me-lg-auto text-white text-decoration-none">
                    <!-- <span class="fs-5">B<span class="d-none d-lg-inline">rand</span></span>-->
                    <img src="../images/logo-viola-piccolo.png" alt="" width="150" height="38"  class="d-inline-block align-text-top">
                </a>
                <ul class="nav nav-pills flex-lg-column flex-row flex-nowrap flex-shrink-1 flex-lg-grow-0 flex-grow-1 mb-lg-auto mb-0 justify-content-center align-items-center align-items-lg-start" id="menu">
                <li class="nav-item">
                        <a onClick="bacheca()" class="nav-link px-lg-0 px-2">
                        <i class="bi-house-fill"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Bacheca</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="carriera()" class="nav-link px-lg-0 px-2">
                        <i class="icons bi-ui-checks"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Carriera</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="orario()" class="nav-link px-lg-0 px-2">
                            <i class="icons bi-clock-fill"></i><span class="ms-1 d-none d-lg-inline txt nav-txt">Orario</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="organizzazione()" class="nav-link px-lg-0 px-2">
                            <i class="icons bi-calendar-event-fill"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Organizzazione</span>
                        </a>
                    </li>

                    <li>
                        <a onClick="impostazioni()" class="nav-link px-lg-0 px-2">
                            <i class="icons bi-gear-fill"></i><span  class="ms-1 d-none d-lg-inline txt nav-txt">Impostazioni</span>
                        </a>
                    </li>
        
                </ul>


                <div class="dropdown py-lg-4 mt-lg-auto ms-auto ms-lg-0 flex-shrink-1">
                        <!--<a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> -->
                        <a class="nav-link dropdown-toggle px-lg-0 px-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="40" height="40" class="rounded-circle">
                            <span class="d-none d-lg-inline mx-1" style="color: black;"><?php echo $utente["nome"]. " " . $utente["cognome"]; ?></span>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Cambia immagine del profilo</a></li>
                                <li><a class="dropdown-item" href="#">Cambia lingua</a></li>
                                <li><a class="dropdown-item" href="#">Cambia...</a></li>
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
