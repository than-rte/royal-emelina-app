window._ = require("lodash")

window.axios = require("axios")
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
axios.defaults.baseURL = "http://royalemelina.test/api" // the prefix of the URL
axios.defaults.headers.get["Accept"] = "application/json" // default header for all get request
axios.defaults.headers.post["Accept"] = "application/json"

import Vue from "vue"
import App from "./App.vue"
import router from "./router/index"
import store from "./store"
import vuetify from "../plugins/vuetify"
import CKEditor from "@ckeditor/ckeditor5-vue2"

Vue.config.productionTip = false

var filter = function(text, length, clamp) {
  clamp = clamp || "..."
  var node = document.createElement("div")
  node.innerHTML = text
  var content = node.textContent
  return content.length > length ? content.slice(0, length) + clamp : content
}

Vue.filter("truncate", filter)
Vue.use(CKEditor)

new Vue({
  vuetify,
  router,
  store,
  el: "#rylapp",
  components: {
    App
  }
})
