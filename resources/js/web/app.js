//Extras
require('./bootstrap');

//Vue on client's website
import Vue from 'vue'
import vuetify from '../plugins/vuetify'
import globalcomponents from './components/globalcomponents.js';

Vue.config.productionTip = false

const app = new Vue({
    vuetify,
    el: '#app',
    components: {
      ...globalcomponents,
    }
})

