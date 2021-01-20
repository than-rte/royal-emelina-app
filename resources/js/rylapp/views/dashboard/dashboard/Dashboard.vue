<template>
  <v-container fluid>
    <h1 class="text-h5 font-weight-medium mb-6">Overview</h1>
    <v-card flat tile :elevation="0" class="d-flex justify-space-between mb-10">
      <overview-card
        v-for="(overview, i) in overviews"
        :key="i"
        :overview="overview"
      />
    </v-card>

    <v-row no-gutters>
      <v-col> </v-col>
      <v-col> </v-col>
      <v-col> </v-col>
      <v-col> </v-col>
    </v-row>

    <h1 class="text-h5 font-weight-medium">Recent Activity</h1>
  </v-container>
</template>

<script>
import { VContainer } from "vuetify/lib"
import OverviewCard from "../../../components/OverviewCard"

export default {
  name: "dashboard",
  components: {
    OverviewCard,
  },
  data: () => ({
    mountx: 0,
    overviews: [
      {
        text: "Unread Inquiries",
        value: "20",
      },
      {
        text: "Booked Events",
        value: "50",
      },
      {
        text: "Resolved Events",
        value: "120",
      },
      {
        text: "Created Venues",
        value: "5",
      },
    ],
  }),

  computed: {},

  mounted() {
    this.$store.dispatch("test/inc_dashboard")
    console.log("dashboard: " + this.$store.state.test.dashboard_mountx)
  },
  beforeDestroy() {
    console.log("i am called...")
  },
}
</script>

<style>
</style>
