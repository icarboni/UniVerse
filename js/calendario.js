
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

        prova: 'a',
  
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

      add: function() {
        if(this.currentDate.mese === 0) {
          this.currentDate.mese = 11;
          this.currentDate.anno -= 1;
        }
        else {
          this.currentDate.mese -= 1;
        } 

      }

  },

  created() {
    this.getDataOggi();

  }
});
