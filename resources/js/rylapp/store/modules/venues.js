import axios from 'axios'

//states
const state = {
    venues: []
}

//getters
const getters = {
    getVenues: (state) => state.venues
}

//actions
const actions = {
    async fetchVenues({ commit }) {
        axios.get("http://royalemelina.test/api/venues")
        .then(res => {
            console.log(res.data)
            commit('populateVenues', res.data)  
        })
    }
}

//mutations
const mutations = {
    populateVenues: (state, fetched_venues) => {state.venues = fetched_venues},
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
