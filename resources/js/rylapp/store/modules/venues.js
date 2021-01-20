const state = {
  venues: []
}

const getters = {}

const actions = {
  async overwriteVenueList({ commit }, payload) {
    commit("OVERWRITE_LIST", payload)
  },
  async addToVenueList({ commit }, payload) {
    commit("ADD_VENUE_TO_THE_LIST", payload)
  },
  async fetchVenues({ commit }) {
    axios
      .get("/venues")
      .then(res => {
        commit("populateVenues", res.data.data)
      })
      .catch(err => {
        console.log(err)
      })
  },

  async addVenue({ commit }, newVenue) {
    await axios
      .post("/venues", newVenue)
      .then(res => {
        commit("addVenue", res.data.data)
      })
      .catch(err => {
        console.log(err)
      })
  },

  async resetErrors({ commit }, reset) {
    commit("resetErrors", reset)
  }
}

const mutations = {
  populateVenues: (state, fetched_venues) => {
    state.venues = fetched_venues
  },
  hasErrors: (state, errors) => {
    state.errors = errors
  },
  resetErrors: (state, errors) => {
    state.errors = errors
  },
  addVenue: (state, newVenue) => {
    state.venues.unshift(newVenue)
  },
  OVERWRITE_LIST: (state, payload) => {
    state.venues = payload.data
  },
  ADD_VENUE_TO_THE_LIST: (state, payload) => {
    state.venues.unshift(payload.data)
  }
}

/**
 *
 * fetchPaginatedVenues
 *
 *
 */

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
