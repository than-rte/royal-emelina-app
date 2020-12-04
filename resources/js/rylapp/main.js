import Vue from 'vue'
import App from './App.vue'
import router from './router/index'
import store from './store'
import vuetify from '../plugins/vuetify'

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  el: '#rylapp',
  components: {
    App
  }
})
