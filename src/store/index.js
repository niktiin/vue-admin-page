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
    async requestAPIGetItem (context) {
      const api = 'http://localhost:3000/api/index.php/api/items'
      const responce = await axios.get(api)
      // Проверяем ответ на полноту и ошибки
      if (!responce || responce.status !== 200) {
        return
      }
      context.commit('setItems', responce.data)
    }
  },
  modules: {
  }
})
