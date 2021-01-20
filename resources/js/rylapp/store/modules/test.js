//states
const state = {
  dashboard_mountx: 0
}

//getters
const getters = {
  getVenues: state => state.venues
}

//actions
const actions = {
  async inc_dashboard({ commit }) {
    commit("inc_dashboard")
  }
}

//mutations
const mutations = {
  inc_dashboard: state => state.dashboard_mountx++
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
