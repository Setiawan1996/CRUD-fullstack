import Vue from 'vue'
import App from './App.vue'
import router from './router'

import axios from 'axios'

axios.defaults.baseURl = 'http://localhost:8080/'

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
