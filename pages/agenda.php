<link rel="stylesheet" href="../css/calendario.css" type="text/css">

<script>

        var dataSel = {
            giorno: 0,
            mese: 0,
            anno: 0
        };

        var giorniMese= [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
        var esami;
        var studio;

        function dataSelezionata() {
            var ms;
            var gg;
            if (dataSel.mese<9) {
                ms= '-0' + (parseInt(dataSel.mese)+1);
            } else ms='-' + (parseInt(dataSel.mese)+1);
            if (dataSel.giorno<10) {
                gg = '-0' + dataSel.giorno;
            } else gg = '-' +dataSel.giorno;
            return dataSel.anno + ms + gg; 
           
        }

        function caricaForm(n) {
            if (n==1) {
                document.getElementById("dataEsame").value = dataSelezionata();
            } else if (n==2) {
                document.getElementById("datastudiare").value = dataSelezionata();
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (n==1) {
                    document.getElementById("selezionaEsame").innerHTML = this.responseText;
                } else if (n==2) {
                    document.getElementById("selezionaEsame2").innerHTML = this.responseText;
                } 
                
            }
            };
            
            xmlhttp.open("GET","../php/selezionaEsame.php", true);
            xmlhttp.send();
        }

        
                

        function carica() {
            setTimeout(function(){  
            var mese = dataSel.mese;
            
            esami = [];
            esami = localStorage.getItem("ex-" + mese + "-" + dataSel.anno);
            if (esami==null) {
                localStorage.setItem("ex-" + mese + "-" + dataSel.anno, "{}");
            } else {
                esami = JSON.parse(esami);
            }
            var x;
            if (mese==11) {
                x= new Date(dataSel.anno, 0, 0).getDate();
            } else x= new Date(dataSel.anno, mese+1, 0).getDate();
             
                for (var i=1; i<=x; i++) {
               
                if (esami[i] != null) {
                  document.getElementById("id"+i).style.visibility = "visible";
                  document.getElementById("id"+i).innerHTML = esami[i];
                } else {
                  document.getElementById("id"+i).style.visibility = "hidden";
                  document.getElementById("id"+i).innerHTML = "";
                }
            }

            studio = [];
            studio = localStorage.getItem("st-" + mese + "-" + dataSel.anno);
            if (studio==null) {
                localStorage.setItem("st-" + mese + "-" + dataSel.anno, "{}");
            } else {
                studio = JSON.parse(studio);
            }

            for (var c=1; c<=x;  c++) {
               
               if (studio[c] != null) {
                  document.getElementById("2id"+c).style.visibility = "visible";
                  document.getElementById("2id"+c).innerHTML = studio[c];
               } else {
                  document.getElementById("2id"+c).style.visibility = "hidden";
                  document.getElementById("2id"+c).innerHTML = "";
                   }
               }

            }, 300);
        }

       
        function aggiungiEsame() {
           
            var d = document.getElementById("dataEsame").value.split("-");
            if (d[1][0] == "0") d[1]= d[1][1];
            if (d[2][0] == "0") d[2]= d[2][1];
            d[1] = parseInt(d[1])-1; 
            esami[d[2]] = document.getElementById("esame").value;
            document.getElementById("id"+d[2]).style.visibility = "visible";
            document.getElementById("id"+d[2]).innerHTML = esami[d[2]];
            localStorage.setItem("ex-" + d[1] + "-" + d[0], JSON.stringify(esami));
            esami = [];
            esami = JSON.parse(localStorage.getItem("ex-" + d[1] + "-" + d[0]));
            
        }

        function rimuoviEsame() {

                    document.getElementById("id"+dataSel.giorno).style.visibility = "hidden";
                    document.getElementById("id"+dataSel.giorno).innerHTML = "";
                    esami[dataSel.giorno] = null;
                    localStorage.setItem("ex-" + dataSel.mese + "-" + dataSel.anno, JSON.stringify(esami));
                    esami = JSON.parse(localStorage.getItem("ex-" + dataSel.mese + "-" + dataSel.anno));
            
        }
           
        function aggiungiStudio() {
            
                    var d = document.getElementById("datastudiare").value.split("-");
                    if (d[1][0] == "0") d[1]= d[1][1];
                    if (d[2][0] == "0") d[2]= d[2][1];
                    d[1] = parseInt(d[1])-1; 
                    studio[d[2]] = document.getElementById("esame").value;
                    document.getElementById("2id"+d[2]).style.visibility = "visible";
                    document.getElementById("2id"+d[2]).innerHTML = studio[d[2]];
                    localStorage.setItem("st-" + d[1] + "-" + d[0], JSON.stringify(studio));
                    studio = [];
                    studio = JSON.parse(localStorage.getItem("st-" + d[1] + "-" + d[0]));
                    
                }
        
        function rimuoviStudio() {

                    document.getElementById("2id"+dataSel.giorno).style.visibility = "hidden";
                    document.getElementById("2id"+dataSel.giorno).innerHTML = "";
                    studio[dataSel.giorno] = null;
                    localStorage.setItem("st-" + dataSel.mese + "-" + dataSel.anno, JSON.stringify(studio));
                    studio = JSON.parse(localStorage.getItem("st-" + dataSel.mese + "-" + dataSel.anno));
            
        }



</script>


<div class="row mr-3 ml-3">
    <div class="col-12 col-lg main shadow p-3 mb-3 mr-md-2 bg-body rounded" >

        <div id="app">

            <!--<div class="float-button"   data-bs-toggle="modal" data-bs-target="#aggiungiModal"><i class="bi bi-plus"></i></div>  -->

            <div class="fab-container">
                <div class="fab fab-icon-holder">
                    <i class="bi bi-plus"></i>
                </div>
        
                <ul class="fab-options">
                    <li>
                        <span class="fab-label">Esame</span>
                        <div onClick="caricaForm(1); $('#aggiungiEsame').modal('toggle');" class="fab-icon-holder">
                            <i  class="bi bi-calendar2-plus"></i>
                        </div>
                    </li>
                    <li>
                        <span class="fab-label">Studio</span>
                        <div onClick="caricaForm(2); $('#aggiungiStudio').modal('toggle');" class="fab-icon-holder">
                            <i class="bi bi-book"></i>
                        </div>
                    </li>
                    
                    </li>
                </ul>
            </div>


            <div class="modal fade" id="aggiungiEsame" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Aggiungi Esame</h5>
                   
                    </div>
                    <div class="modal-body">
                        <div id="selezionaEsame"> </div>
                            <br>
                            <div style="display:inline-block;" >
                                <input class="aggiungi" type="date" id="dataEsame" name=""
                                min="2021-01-01" max="2022-12-31">
                            </div>
               
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="aggiungiEsame(); $('#aggiungiEsame').modal('toggle');">Salva</button>
                    </div>
                </div>
                </div>
            </div>


            <div class="modal fade" id="rimuoviEsame" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Rimuovi Esame</h5>
                   
                    </div>
                    <div class="modal-body">
                    
                        <div>Sicuro di voler rimuovere l'esame selezionato?</div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="rimuoviEsame(); $('#rimuoviEsame').modal('toggle');">Rimuovi</button>
                    </div>
                </div>
                </div>
            </div>


            <div class="modal fade" id="aggiungiStudio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Aggiungi giornata di studio</h5>
                   
                    </div>
                    <div class="modal-body">
                        <div id="selezionaEsame2"> </div>
                            <br>
                            <div style="display:inline-block;" >
                                <input class="aggiungi" type="date" id="datastudiare" name=""
                                min="2021-01-01" max="2022-12-31">
                            </div>
               
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="aggiungiStudio(); $('#aggiungiStudio').modal('toggle');">Salva</button>
                    </div>
                </div>
                </div>
            </div>


            <div class="modal fade" id="rimuoviStudio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Rimuovi Esame</h5>
                   
                    </div>
                    <div class="modal-body">
                    
                        <div>Sicuro di voler rimuovere cancellare la giornata di studio?</div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="rimuoviStudio(); $('#rimuoviStudio').modal('toggle');">Rimuovi</button>
                    </div>
                </div>
                </div>
            </div>

            <div class="d-flex justify-content-around" id="mese"> 
                <div class="mesebarra" id="f_sinistra" v-on:click="precedente();" onclick=" carica();" ><i class="bi arrow bi-arrow-left-circle-fill"></i></div>
                <div class="mesebarra" id="txt_mese" > {{ mesi[currentDate.mese] }} {{ currentDate.anno }}</div>
                <div class="mesebarra" id="f_destra" v-on:click="successivo();"  onclick=" carica();" ><i class="bi arrow bi-arrow-right-circle-fill"></i></div>
            </div>
            <br>
            
            
            <div class="d-none d-md-block">
            <div class="weekdays d-flex justify-content-around">
                <div class="weekday" v-for="(giornoSettimana, index) in giorniSettimanaInteri" :key="index">
                    {{ giornoSettimana }}
                </div>
            </div>
            </div>
            <div class="weekdays d-flex justify-content-around d-block d-md-none">
                <div class="weekday" v-for="(giornoSettimana, index) in giorniSettimana" :key="index">
                    {{ giornoSettimana }}
                </div>
            </div>

            <br>
            <div class="date">
                <div class="day-hidden giorno" v-for="(n, index) in (primoGiorno -1)" :key="'prev'+index">
                    <div class="numero"> {{ (giorniMesePrecedente +1) - primoGiorno + n }} </div>
                </div>
                <div class="day giorno" 
                    :class="{ active: n === currentDate.giorno}"
                    @click="currentDate.giorno = n"
                    v-for="(n, index) in numGiorniMese" 
                    :key="'day'+index"
                    >
                    <div class="numero">{{ n }}</div>
                    <div class="esame" style="visibility:hidden" :id="'id'+n" onclick="$('#rimuoviEsame').modal('toggle');"></div>
                    <div class="studio" style="visibility:hidden" :id="'2id'+n" onclick="$('#rimuoviStudio').modal('toggle');"></div>
                    
                </div>
                <div class="day-hidden giorno" v-for="(n, index) in (43 - (numGiorniMese + primoGiorno))" :key="'next'+index">
                    <div class="numero">{{ n }}</div>
                </div>
            </div>


        
        </div>

    </div>
</div>

<script>

var app = new Vue ({
    el: '#app',
    
    data: {
        giorniSettimana: ['Lun','Mar','Mer','Gio','Ven','Sab','Dom'],
        giorniSettimanaInteri: ['Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Domenica'],
        mesi: [
          'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio',
          'Agosto','Settembre','Ottobre','Novembre','Dicembre'
        ],
        currentDate: dataSel,
  
    },
    computed: {
      giorniMesePrecedente() {
        let anno = this.currentDate.mese === 0 ? this.currentDate.anno - 1 : this.currentDate.anno;
        let mese = this.currentDate.mese === 0 ? 12 : this.currentDate.mese;
        return new Date(anno, mese, 0).getDate();
      },
      primoGiorno() {
        let primo = new Date(this.currentDate.anno, this.currentDate.mese, 1).getDay();
        if(primo === 0) primo = 7;
        return primo;
      },
      giornoSelezionato() {
        return new this.currentDate.anno + "-" + this.currentDate.mese + "-" + this.currentDate.giorno;
      },
      numGiorniMese() {
        return new Date(this.currentDate.anno, this.currentDate.mese +1, 0).getDate();
      }
    },

    methods: {
      getDataOggi: function() {
        let oggi = new Date();
        this.currentDate.giorno = oggi.getDate();
        this.currentDate.mese = oggi.getMonth();
        this.currentDate.anno = oggi.getFullYear();
      },
    
      successivo: function() {
        if(this.currentDate.mese === 11) {
          this.currentDate.mese = 0;
          this.currentDate.anno += 1;
        }
        else {
          this.currentDate.mese += 1;
        }        
      },

      precedente: function() {
        if(this.currentDate.mese === 0) {
          this.currentDate.mese = 11;
          this.currentDate.anno -= 1;
        }
        else {
          this.currentDate.mese -= 1;
        } 
    
      },

  },

  created() {
    this.getDataOggi();
  }
});

carica();

</script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
