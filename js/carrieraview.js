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
    template:`<div class="col pt-5 pb-4 px-4">
                <div class="card">
                  <div class="card-body">
                    <div class="container">
                        <img src="../images/pb3.jpeg" style="width:100%;">
                        <div class="card-String centered">{{ titolo }}</div>
                    </div>
                    <br>
                    <p class="card-String">{{ sem }}° Semestre <b>{{ cfu }} CFU</b> <br> <b>Cod</b>: {{ cod }} <img class="reg-check" v-bind:src="image"/>
                    </p>
                    <button class="btn" v-on:click="addexam()" v-if="todo==1">Segna come Svolto</button>
                    <button class="dark-btn" v-on:click="remexam()" v-else >Rimuovi da Svolti</button>
                    <a href="#" class="card-link position-absolute">Lascia una valutazione</a>
                  </div>
                </div>
              </div>`,
    data: function () {
        return {
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