import Vue from "vue"
import Vuex from "vuex"
import venues from "./modules/venues"
import test from "./modules/test"
//load Vuex
Vue.use(Vuex)

//create store
export default new Vuex.Store({
  modules: {
    venues,
    test
  }
})
