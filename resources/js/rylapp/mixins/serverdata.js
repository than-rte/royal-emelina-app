import { get } from "lodash"
import { getVenuesAll } from "../ajax/venues"
import http from "../lib/http"

export default {
  methods: {
    async serverDataForTables(params) {
      const { page, sort, order, paginate } = params

      return await get_venueList(params)
    }
  }
}
