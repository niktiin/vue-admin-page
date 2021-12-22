import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    items: []
  },
  mutations: {
    setItems (state, items) {
      if (!items || !Array.isArray(items)) {
        return
      }
      state.items = items
    }
  },
  actions: {
    requestAPIGetItem (context) {
      const url = 'http://localhost:3000/api/index.php/api/items'

      context.commit('setItems', ['item'])
      console.log(context)
    }
  },
  modules: {
  }
})
