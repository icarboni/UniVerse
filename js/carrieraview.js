 Vue.component ( 'exam', {
    props: {
      titolo : {
        type: String,
        required : true
      },
      sem : {
        type: Number,
        required : true
      },
      cfu : {
        type: Number,
        required : true
      },
      cod : {
        type: Number,
        required : true
      },
      d : {
        type: Number,
        required : true
      },
      rate : {
        type: Number,
        required : true
      },
      star : {
        type: Number,
        required : true
      },
      rated : {
        type: Number,
        required : true
      }
    } ,
    template:`<div class="col pt-5 px-4">
                <div class="card" style="width: 30rem;">
                  <div class="card-body">
                    <button class="main-btn card-String centered" v-on:click="openrec()">{{ titolo }}</button> <b>{{ cfu }} CFU</b>
                    <br>
                    <b>Cod</b>: {{ cod }}
                    <br> <p class="card-String"> {{ sem }}° Semestre
                    <br> <b>Rating</b>: {{ rate }} <img v-bind:src="starimg" height='22' width='32'> </p>
                    <button class="btn" v-on:click="addexam()" v-if="todo==1">Segna come Svolto</button>
                    <button class="dark-btn" v-on:click="remexam()" v-else >Rimuovi da Svolti</button>
                    <button v-bind:id="id" v-on:click="rateex()" v-bind:disabled="rated==1" class="light-btn position-absolute">Lascia una valutazione</button>
                  </div>
                </div>
              </div>`,
    data: function () {
        return {
          ref: '../pages/recensionim.php?codex='+this.cod,
          todo: this.d,
          image: '../images/white-back.jpg',
          starimg: '../images/'+this.star+'.jpg',
          id: 'btn-'+this.cod
        };
      },
    methods: {
        addexam : function () {
          toggleinsertexam(this.cod)
      },
        remexam : function () {
          toggleremoveexam(this.cod);
      },
        rateex : function () {
        $('#inseriscival').modal('show');
        document.getElementById("triggerval").setAttribute("onclick", "rate("+this.cod+")");
      },
        openrec : function ()  {
            $('#internoBox').load(this.ref);
      }
    }
});

var Esami1 = new Vue ({
  el: '#Esami1',
  });
var Esami2 = new Vue ({
  el: '#Esami2',
  });
var Esami3 = new Vue ({
  el: '#Esami3',
  });
var Esamitd = new Vue ({
  el: '#Esamitodo',
  });
var Esamid = new Vue ({
  el: '#Esamidone',
  });