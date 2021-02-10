<template>
  <div style="margin: 15px 0;">  
    <div class="form-group row">
      <div class="col-10">
        <autocomplete
            placeholder      = "Digite o nome da Cidade para pesquisar"
            input-class      = "form-control-lg"
            :source          = "getEndPointCidades"
            results-property = "items"
            results-display  = "label"
            @selected        = "cidadeSelecionada"
            @clear           = "valueSel=null"
            >        
          </autocomplete> 
      </div>
      <div class="col-2">
        <button @click="pesquisaCidadeSelecionada" class="btn btn-success btn-lg active mb-2">
          <i class="fa fa-search" aria-hidden="true"></i>
          Buscar
        </button> 
      </div>
    </div>

    <div class="row" v-if="previsoes">
      <!-- Componente que lista o clima dos proximos dias -->
      <previsao 
        :previsoes = "previsoes"
        :patch_img = "patch_img"
      />
    </div>
  </div>
</template>

<script>
export default {
  
  props: ['patch_img'],

  data: function(){
    return {
      valueSel: null, //id da cidade selecionada
      previsoes:[],
    }
  },

  methods: {
    
    // retorna o endpoint para consulta
      getEndPointCidades($event){        
        return '/cidade/getLike/' + $event
      },

    // é chamado no evento @selected
      cidadeSelecionada(val){
        this.valueSel = val.value;
      },
    
    // pesquisa as previsões dos ultimos 7 dias da cidade selecionada
      async pesquisaCidadeSelecionada(){

        if(this.valueSel != null && this.valueSel > 0){

          const res = await axios.get('/cidade/getById/'+this.valueSel);
          
          this.previsoes = res.data;
          console.log(res.data);

        }
      
      }
    
  }

};
</script>
