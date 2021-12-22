import Vue from 'vue'
import Vuex from 'vuex'

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
      context.commit('setItems', ['item'])
      console.log(context)
    }
  },
  modules: {
  }
})
