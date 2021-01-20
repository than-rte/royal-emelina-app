<template>
  <div>
    <header-title :icon="'mdi-city-variant'" :titleText="'Venue List'" />
    <div class="flex-1-1-auto d-flex align-center justify-end">
      <v-text-field
        v-model="search"
        label="Search..."
        single-line
        flat
        solo
        prepend-inner-icon="mdi-magnify"
        class="pt-7"
        background-color="#eee"
        @input="searchList"
      />
      <v-btn class="mx-5" tile color="success" @click="$router.push({ name: 'venue-add' })">
        <v-icon left> mdi-plus </v-icon>
        Add venue x
      </v-btn>
      <!-- <venue-add-dialog />
      <venue-add-success-message :message="messageSuccess" /> -->
    </div>
    <v-data-table
      class="elevation-2 row-pointer"
      :headers="headers"
      :options.sync="options"
      :items="venues"
      :server-items-length="total_length"
      :loading="loading"
      loading-text="Loading venues.. Please wait"
      :items-per-page="10"
      :page="1"
      item-key="name"
      :sort-by="'updated_at'"
      sort-desc
    >
      <template v-slot:[`item.created_at`]="{ value }">
        <date-time :d="new Date(value)" />
      </template>
      <template v-slot:[`item.updated_at`]="{ value }">
        <date-time :d="new Date(value)" />
      </template>
      <template v-slot:[`item.available`]="{ value }">
        <span v-if="value" class="green--text"> active </span>
        <span v-else class="red--text"> disabled </span>
      </template>
      <template v-slot:[`item.actions`]="{ item }">
        <v-icon medium class="mr-2" color="blue lighten-1" @click="showVenueOnEdit(item)">
          mdi-pencil-box-multiple-outline
        </v-icon>
        <v-icon medium color="red darken-1" @click="promptVenueOnDelete(item)"> mdi-delete </v-icon>
      </template>
      <template v-slot:[`item.info`]="{ item }">
        <v-icon medium class="mr-2" color="blue lighten-1" @click="showVenue(item)">
          mdi-information
        </v-icon>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import HeaderTitle from "../partials/HeaderTitle"
import apiCalls from "../../../../mixins/utils/apiCalls"
import DateTime from "../../../../components/DateTime"
import { getVenueList, getSearchResult } from "../../../../ajax/venues"
// import VenueAddDialog from "./VenueAddDialog"
// import VenueAddSuccessMessage from "./VenueAddSuccessMessage"
export default {
  name: "venue-list",
  components: {
    DateTime,
    // VenueAddDialog,
    // VenueAddSuccessMessage,
    HeaderTitle,
  },
  data: () => ({
    /** venue table */
    search: "",
    venues: [],
    options: {},
    total_length: null,
    loading: true,
    isSelectionTriggered: false,
    proto_venues: [],
    messageSuccess: false,
  }),
  methods: {
    /** venue table */
    showVenue(item) {
      this.$router.push({ name: "venue-show", params: { id: item.id } })
    },
    showVenueOnEdit(item) {
      this.$router.push({ name: "venue-edit", params: { id: item.id } })
    },
    promptVenueOnDelete(item) {},

    searchList() {
      return 0
      if (this.search.length >= 1) {
        //fetch search result
        getSearchResult(this.search)
          .then(res => {
            this.venues = res.data
          })
          .catch(err => {
            console.log(err)
          })
      } else {
        //default
        this.loading = true
        this.options.sortBy[0] = this.options.sortBy[0] || "name"

        const params = {
          page: this.options.page,
          sort: this.options.sortBy[0],
          order: this.options.sortDesc[0] ? "desc" : "asc",
          paginate: this.options.itemsPerPage,
        }

        getVenueList(params)
          .then(res => {
            this.venues = res.data.data.data
            this.total_length = res.data.total_length
            this.loading = false
          })
          .catch(err => {
            console.log(err)
          })
      }
    },
  },
  computed: {
    headers: {
      get: () => {
        return [
          { text: "Venue Name", align: "start", value: "name" },
          { text: "Created At", value: "created_at" },
          { text: "Updated At", value: "updated_at" },
          { text: "Available", value: "available" },
          { text: "Actions", align: "center", value: "actions", sortable: false },
          { text: "Information", align: "center", value: "info", sortable: false },
        ]
      },
    },
  },
  watch: {
    /** venue table */
    options: {
      handler() {
        this.loading = true
        this.options.sortBy[0] = this.options.sortBy[0] || "name"

        const params = {
          page: this.options.page,
          sort: this.options.sortBy[0],
          order: this.options.sortDesc[0] ? "desc" : "asc",
          paginate: this.options.itemsPerPage,
        }

        getVenueList(params)
          .then(res => {
            this.venues = res.data.data.data
            this.total_length = res.data.total_length
            this.loading = false
          })
          .catch(err => {
            console.log(err)
          })
      },
      deep: true,
    },
  },

  /** mixins */
  mixins: [apiCalls],
}
</script>

<style scoped>
</style>