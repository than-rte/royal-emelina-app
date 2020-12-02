//Extras
require('./bootstrap');

//Vue on client's website
import Vue from 'vue'
import globalcomponents from './components/globalcomponents.js';

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    components: {
      ...globalcomponents,
    }
})

