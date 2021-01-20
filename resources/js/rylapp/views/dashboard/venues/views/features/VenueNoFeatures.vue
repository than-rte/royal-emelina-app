<template>
  <v-card tile elevation="0" color="grey lighten-3">
    <v-card-title>
      <v-icon large class="mr-2">mdi-information-variant</v-icon>
      Features
    </v-card-title>
    <v-card-text class="text-h5 d-flex flex-column">
      No Features...
      <v-btn
        class="mt-4"
        text
        color="success"
        @click="$emit('open:add-features', true)"
      >
        <v-icon>mdi-plus</v-icon>
        Add Feature
      </v-btn>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "venue-no-features",
  props: ["features"],
  data: () => ({}),
  computed: {},
}
</script>

<style>
</style>