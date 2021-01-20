export default {
  methods: {
    async get_paginatedVenues(params) {
      const { page, sort, order, paginate } = params
      const data = await axios
        .get(`/venues?page=${page}&sort=${sort}&order=${order}&paginate=${paginate}`)
        .then(res => {
          if (res.status == 200) {
            this.$store.dispatch("venues/overwriteVenueList", res.data.data)
            return res.data
          }
        })
        .catch(err => {
          console.log(err)
        })

      return data
    },
    async post_addVenue(params) {
      const submitted = await axios
        .post(`/venues`, params)
        .then(res => {
          if (res.status == 201) {
            this.$store.dispatch("venues/addToVenueList", res.data)
            return true
          }
        })
        .catch(err => {
          console.log(err)
        })

      return submitted
    }
  }
}
