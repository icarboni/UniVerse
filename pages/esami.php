<link rel="stylesheet" href="../css/bacheca4.css" type="text/css">
<script type="text/javascript" src="../js/box.js"></script>

<script>
    var cod_ex;
    var voto;
        function inserisci(str) {
            cod_ex=str;
            $('#inserisciModal').modal('toggle');
        
       }

        function bacheca() {
            
        $('#internoBox').load('./bacheca.php');
        

}

       function inserisciVoto() {
           voto = document.getElementById("voto").value;
            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                if (this.responseText==1) {
                    
                    document.getElementById(cod_ex).innerHTML= "<img src='./../images/checked.png' style='width: 30px; height:30px'>";
                    $('#inserisciModal').modal('hide');
                }
                if (this.responseText==0) {
                        alert(cod_ex);
                        alert(voto);
                }
           
       };
    }
       xhttp.open("POST", "../php/inserisci.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("esame="+cod_ex+"&voto="+voto);
       
   }
    
       
   </script>

<div class="row mr-3 ml-3">
    <h5 class="card-title">Benvenuto/a <?php echo $utente["nome"]; ?></h5>
</div>

<div class="row mr-3 ml-3">
    <div class="col-12 col-lg main shadow p-3 mb-3 mr-md-2 bg-body rounded" >
        <h4 class="card-title">Inizia ad inserire gli esami in carriera</h4>
        <br>
        <h5>Seleziona gli esami che hai gia svolto e inserisci il voto ottenuto.</h5>
        <br>

        <?php 
        session_start();
        include "../php/connect.php";
        $corso =  $_SESSION['cod_corso'];
        $anno = $_SESSION['anno'];
        $sql_esami5 = "SELECT * FROM esami WHERE corso= '$corso' and anno<='$anno' ORDER BY anno";
        $esami5 = $conn->query($sql_esami5);
        
        while($esame5 = $esami5->fetch_assoc()) {
        
            echo '<li class="list-group-item d-flex justify-content-between esame-gruppo">
                  <div class="info-esame ">
                  <div class="nome-esame">'.$esame5['nome'].'</div>
                  <div class="prof">'.$esame5['professore'].'</div>
                  </div>
                
                  <div class="d-flex justify-content-between">
                  <div class="cfu" style="width: 150px; padding-left: 20px;">'.$esame5['crediti'].' CFU</div>
                  <div class="cfu" style="width: 150px; padding-left: 20px;">'.$esame5['anno'].' anno</div>
                  <div class="ins" id="'.$esame5['cod_esame'].'"><button class="btn dark-btn" value="'.$esame5['cod_esame'].'" onClick="inserisci(this.value)">Inserisci</button></div>
                  
                  </div>
                  </li>'; 
            }
           ?>
           <br>
           
        <button type='button' class='dark-btn btn' onClick='bacheca()'>Continua</button>
            </div>
    </div>
   


    <!-- Modal -->
    <div class="modal fade" id="inserisciModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Inserisci esame</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post"  onSubmit="">
        <div class="modal-body">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend" >
                            <span class="input-group-text prefix">Voto</span>
                    </div>
                    <input type="text" aria-label="Voto" placeholder="Voto" class="form-control" name="voto" id="voto" value="" >
                    
                </div>
            <br>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn dark-btn" data-bs-dismiss="modal" onClick="inserisciVoto()">Inserisci</button>
        </div>
        </form>
        </div>
    </div>
    </div>

