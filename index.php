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


</script>
<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/home.css" type="text/css">
  <script src="js/home.js"></script>

  <script src="js/login.js"></script>
  <script src="js/registrazione.js"></script>

  

  

</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-light fixed-top" >
        <a class="navbar-brand justify-align-start" style="width: 60%"  href="#" >
        <img src="images/logo-viola-piccolo.png" alt="" width="119" height="30"  class="d-inline-block align-text-top">
        
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
 
            <div class="d-flex justify-content-right mt-md-0 mt-3">
                <!--<form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <a style="width: 5px;"></a>
                    <button class="btn dark-btn" type="submit">Cerca</button>
                </form> -->
                <a style="width: 300px; height: 0px;"></a>
                <button class="btn dark-btn" type="submit">Accedi</button>
                <a style="width: 5px;"></a>
                <button class="btn dark-btn" type="submit" onclick="$('#regModal').modal('toggle')">Registrati</button>
            </div>
        </div>
    </nav>

    <div class="container-fluid home-cont">
        <div class="row pt-5 mt-md-5">
            <div class="col-lg-8 col-12 homesx ">
                <div class="row pt-5 pl-5 pr-5">
                    <div class="col-12 ">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-5 main shadow p-3 mb-3  bg-body rounded" >

                                <div class="blocco align-middle">
                                    <div class="blocco-img ">
                                        <img class="image" src="images/books.png" ></img>
                                    </div>    
                                    <div class="blocco-txt">
                                        <div class="tit">Seleziona il tuo corso di studi</div>
                                        <div class="txt">Iscriviti e seleziona l'universita e il corso di studi che stai frequentando per accedere a tutte le funzionalita di Universe!l</div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-1 hidden-sm padd"></div>
                            <div class="col-12 col-md-5 main shadow p-3 mb-3  bg-body rounded " >
                                
                                    <div class="blocco align-middle">
                                        <div class="blocco-img ">
                                            <img class="image" src="images/presentacion.png" ></img>
                                        </div>
                                        <div class="blocco-txt">
                                            <div class="tit">Visualizza i tuoi progressi</div>
                                            <div class="txt">Attraverso la bacheca potrai vedere i tuoi progressi negli esami, per tenere sempre tutto sotto controllo.</div>
                                        </div>
                                    
                                    </div>
                            </div>
                        </div>
                    </div>
                  
                </div>    
                <div class="row pb-lg-5 pl-5 pr-5">
                    <div class="col-12">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-5 main shadow p-3 mb-3  bg-body rounded" >
                                <div class="blocco align-middle">
                                    <div class="blocco-img  ">
                                        <img class="image" src="images/comments.png" ></img>
                                    </div>
                                    <div class="blocco-txt">
                                        <div class="tit">Confrontati con altri studenti</div>
                                        <div class="txt">Visualizza i commenti degli altri studenti del tuo corso di studio e confrontati con loro per essere piú sicuro nei futuri esami.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 hidden-sm padd"></div>
                            <div class="col-12 col-md-5 main shadow p-3 mb-3  bg-body rounded" >
                                <div class="blocco align-middle">
                                    <div class="blocco-img  ">
                                        <img class="image" src="images/calendario.png" ></img>
                                    </div>
                                    <div class="blocco-txt">
                                        <div class="tit">Organizza il tuo studio</div>
                                        <div class="txt">Prepara il tuo planning personale per organizzare i tuoi giorni di studio in base ai prossimi esami.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>

            </div>

            <div class="col-lg-4 homedx mt-lg-5">
                <div class="row pt-5 mt-lg-5">
                    <div class="col-1 col-lg-2 pt-5"></div>

                    <div class="col-10 col-lg-8 text-center mt-lg-5">
                        <div class="border shadow bg-body rounded log text-center">
                            <form id="login-form" method="GET" >
                                <div class="form-group">
                                    <div id="message"></div>
                                    <input type="text" id="mail-login" name="mail-login" class="form-control" id="mail-login" aria-describedby="emailHelp" placeholder="E-mail">
                                    <br>
                                    <input type="password" id="psw-login" name="psw-login" class="form-control" id="psw-login" placeholder="Password">
                                </div>
                                <span>Hai dimenticato la password? <a href="www.google.it">Clicca qui</a></span>
                                <br><br>
                                
                                <button id="btn-login" type="button" name="btn-login" class="btn dark-btn" onClick="login()">Accedi</button>
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
                                        <form method="post"  onSubmit="">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text prefix">Nome</span>
                                                    </div>
                                                    <input type="text" aria-label="Nome" placeholder="Nome" class="form-control" name="nome" id="nome-reg" value=""  onblur="verificatoNome()">
                                                    <span class="input-group-text suffix" ><img class="reg-check" id="nome-check" src="images/checked.png"></img></span>
                                                </div>
                                                
                                                <br>
                                                <div class="input-group">
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text prefix">Cognome</span>
                                                    </div>
                                                    <input type="text" aria-label="Cognome" placeholder="Cognome" class="form-control" name="cognome" id="cognome-reg" value="" onblur="verificatoCognome()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="cognome-check" src="images/checked.png"></img></span>
                                                </div> 
                                                <br>

                                                <div class="input-group">
                                                    <div class="input-group-prepend" >
                                                        <span class="input-group-text prefix">E-Mail</span>
                                                    </div>
                                                    <input type="text" aria-label="E-Mail" placeholder="E-mail" class="form-control" name="mail" id="mail-reg" value="" onblur="verificatoMail()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="mail-check" src="images/checked.png"></img></span>
                                                </div>
                                                <br>

                                                <div class="input-group" id="grp-psw">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text prefix">Password</span>
                                                    </div>
                                                    <input type="password" aria-label="Password" placeholder="Password" class="form-control" name="psw" id="psw-reg" value="" onblur="verificatoPsw()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="psw-check" src="images/checked.png"></img></span>
                                                </div>

                                                <div class="input-group" id="grp-psw">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text prefix">Password</span>
                                                    </div>
                                                    <input type="password" aria-label="Password" placeholder="Conferma password" class="form-control" name="psw-conf" id="psw-reg-conf" value="" onblur="verificatoPswConf()">
                                                    <span class="input-group-text suffix"><img class="reg-check" id="psw-check-conf" src="images/checked.png"></img></span>
                                                </div>

                                                <div><input type="checkbox" class="form-check-input" id="accettoCheck"><span id="checktext">Accetto le condizioni d'uso di questa pagina web</span></div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="registrati" class="btn dark-btn" onClick="registrazione()" >Registrati</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-1 col-lg-2"></div>

            </div>
        </div>
    </div>
</div>


</body>
</html>
