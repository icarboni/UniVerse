<!DOCTYPE html>
<html lang="en">
<head>
  <title>LTW</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!---
https://colors.muz.li/color/99087e
https://colors.muz.li/palette/8c65ea/6246a4/e5dbff/ccb6ff/ccb6ff
https://mycolor.space/
https://coolors.co/feecf6-ebebeb-99087e-fbc5e5-c20a75
-->


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/home3.css" type="text/css">
  <script src="js/home2.js"></script>
  <?php include('php/connect.php'); ?> <!---mychange
-->
  

</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-light fixed-top" >
        <a class="navbar-brand justify-align-start" style="width: 60%"  href="#" >
        <img src="link-icon.png" alt="" width="30" height="30"  class="d-inline-block align-text-top">
        LTW
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler" >
        <!--
        <ul class="nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>

        </ul>
    -->
            <div class="d-flex justify-content-center mt-md-0 mt-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <a style="width: 5px;"></a>
                    <button class="btn dark-btn" type="submit">Cerca</button>
                </form>
                <a style="width: 20px;"></a>
                <button class="btn dark-btn" type="submit">Accedi</button>
                <a style="width: 5px;"></a>
                <button class="btn dark-btn" type="submit" onclick="$('#regModal').modal('toggle')">Registrati</button>
            </div>
        </div>
    </nav>

    <div class="container-fluid home-cont">
        <div class="row">
            <div class="col-md-8 col-12 homesx"></div>
            <div class="col-md-4 homedx">
                <div class="row">
                    <div class="col-2"></div>

                    <div class="col-8 text-center">
                        <div class="border rounded log text-center">
                            <form method="POST">
                                <div class="form-group">
                                    <input type="email"   class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="E-mail">
                                    <br>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                                <span>Hai dimenticato la password? <a href="www.google.it">Clicca qui</a></span>
                                <br><br>
                                <button id="accedi" type="Accedi" name="accedi" class="btn dark-btn">Accedi</button>
                            </form>
                        </div>
                        <br>
                        <span class="testo">Sei un nuovo utente?
                        <button id="registrati" type="button" onclick="$('#regModal').modal('toggle')" class="btn dark-btn">Registrati</button></span>

                        <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registrazione</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <form method="post" action="php/registrazione.php">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text prefix">Nome</span>
                                                    </div>
                                                    <input type="text" aria-label="Nome" placeholder="Nome" class="form-control" id="input-nome" name="nome" value="<?php echo $nome; ?>"  onblur="verificatoNome()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="nome-check" src="images/checked.png"></img></span>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text prefix">Cognome</span>
                                                    </div>
                                                    <input type="text" aria-label="Cognome" placeholder="Cognome" class="form-control" name="cognome" value="<?php echo $cognome; ?>" onblur="verificatoCognome()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="cognome-check" src="images/checked.png"></img></span>
                                                </div> 
                                                <br>

                                                <div class="input-group">
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text prefix">E-Mail</span>
                                                    </div>
                                                    <input type="text" aria-label="E-Mail" placeholder="E-mail" class="form-control" name="mail" value="<?php echo $mail; ?>" onblur="verificatoMail()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="mail-check" src="images/checked.png"></img></span>
                                                </div>
                                                <br>

                                                <div class="input-group" id="grp-psw">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text prefix">Password</span>
                                                    </div>
                                                    <input type="password" aria-label="Password" placeholder="Password" class="form-control" name="psw" value="<?php echo $psw; ?>" onblur="verificatoPsw()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="psw-check" src="images/checked.png"></img></span>
                                                </div>

                                                <div class="input-group" id="grp-psw">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text prefix">Password</span>
                                                    </div>
                                                    <input type="password" aria-label="Password" placeholder="Conferma password" class="form-control" name="psw-conf" value="<?php echo $psw2; ?>" onblur="verificatoPswConf()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="psw-check-conf" src="images/checked.png"></img></span>
                                                </div>

                                                <span class="check"><input type="checkbox" class="form-check-input" id="accettoCheck">Accetto le condizioni d'uso di questa pagina web</span>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="registrati" class="btn dark-btn" onclick="">Registrati</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-2"></div>

            </div>
        </div>
    </div>
</div>


</body>
</html>
