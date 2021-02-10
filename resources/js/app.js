require('./bootstrap');

window.Vue = require('vue');

// https://www.npmjs.com/package/vuejs-auto-complete
import Autocomplete from 'vuejs-auto-complete'

import Vue from "vue";

// https://www.npmjs.com/package/vue-moment
const moment = require('moment');
require('moment/locale/pt-br');
 
Vue.use(require('vue-moment'), { moment });
moment.locale('pt-br');

Vue.component('card', require('./components/card.vue').default);
Vue.component('previsao', require('./components/previsao.vue').default);
Vue.component("autocomplete", Autocomplete);  
Vue.component('select-cidade', require('./components/select-cidade.vue').default);

const app = new Vue({
    el: '#app',
});
