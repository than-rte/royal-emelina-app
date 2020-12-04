import Vue from 'vue'
import Vuex from 'vuex'
import venues from './modules/venues'

//load Vuex
Vue.use(Vuex)

//create store
export default new Vuex.Store({
    modules: {
        venues,
    }
})