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
      }
    } ,
    template:`<div class="col pt-5 px-4">
                <div class="card" style="width: 30rem;">
                  <div class="card-body">
                    <div class="card-String centered">{{ titolo }}</div> <b>{{ cfu }} CFU</b>
                    <br>
                    <b>Cod</b>: {{ cod }}
                    <br>
                    <p class="card-String">{{ sem }}° Semestre  <br>
                    </p>
                    <button class="btn" v-on:click="addexam()" v-if="todo==1">Segna come Svolto</button>
                    <button class="dark-btn" v-on:click="remexam()" v-else >Rimuovi da Svolti</button>
                    <a v-bind:href="ref" class="card-link position-absolute">Lascia una valutazione</a>
                  </div>
                </div>
              </div>`,
    data: function () {
        return {
          ref: '../pages/recensionim.php?codex='+this.cod,
          todo: this.d,
          image: '../images/white-back.jpg'
        };
      },
    methods: {
        addexam : function () {
          toggleinsertexam(this.cod)
      },
        remexam : function () {
          toggleremoveexam(this.cod);
      },
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