<template>
  <v-card class="pa-4" width="400px" tile elevation="0">
    <v-row class="flex-column">
      <v-col>
        <v-text-field
          label="Venue Name"
          name="name"
          type="text"
          v-model="detail.name"
        />
        <v-text-field
          label="Minimum people required"
          name="min_people"
          type="number"
          min="0"
          v-model="detail.min_people"
        />
        <v-text-field
          label="Maximum people required"
          name="max_people"
          type="number"
          min="0"
          v-model="detail.max_people"
        />
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
export default {
  name: "venue-add-details",
  data: () => ({
    detail: {
      name: "",
      min_people: "",
      max_people: "",
    },
  }),
  methods: {
    submit_details() {},
  },
}
</script>

<style>
</style>