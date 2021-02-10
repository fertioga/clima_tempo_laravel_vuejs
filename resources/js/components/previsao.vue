<template>
    <div class="row justify-content-center" v-if="(dPrevisoes)">
        
        <div style="margin-top:10px;" class="text-dark">
            <h2>Clima para os Próximos 7 dias para: {{ dPrevisoes[0].cidade }}</h2>
        </div>

        <div class="d-flex justify-content-around">
            
            <div v-for="(item, index) in dPrevisoes" class="text-capitalize m-2">
                <card
                    :header="item.data_previsao  | moment('DD/MM/YYYY ddd')"
                    class_header="text-info text-center font-weight-bold"
                >
                    <div class="p-2">
                        <p class="text-center">
                            <span v-html="getImgClima(item.clima)"></span>
                            <br> 
                            {{item.clima}} 
                        </p>                        
                        Mínima: {{ item.temperatura_minima }} °C <i class="fa fa-long-arrow-down text-info" aria-hidden="true"></i> <br> 
                        Máxima: {{ item.temperatura_maxima }} °C <i class="fa fa-long-arrow-up text-danger" aria-hidden="true"></i>
                    </div>
                </card>
            </div>
        
        </div>

    </div>
</template>
<script>

export default {
    name: 'previsoes',
    props: ['previsoes','patch_img'],
    data() {
        return {
            dPrevisoes:null,
            cidade: ""
        }
    },        
    mounted() {
        this.dPrevisoes = this.dPrevisoes;             
    },  
    watch: {
        // atualiza a variavel data sempre que ouver mudança no props
        previsoes: function (newData, oldData) {
            this.dPrevisoes = newData;
        }
    },      
    methods: {

        getImgClima: function(clima){
           
            switch(clima){
                case 'ensolarado':
                return "<img src='"+this.patch_img+"/ensolarado.svg'/>";

                case 'chuvoso':
                return "<img src='"+this.patch_img+"/chuvoso.svg'/>";

                case 'instavel':
                return "<img src='"+this.patch_img+"/sol-nuvens.svg'/>";

                case 'tempestuoso':
                return "<img src='"+this.patch_img+"/tempestuoso.svg'/>";

                case 'nublado':
                return "<img src='"+this.patch_img+"/nublado.svg'/>";
            }
            
        }
    }
}
</script>