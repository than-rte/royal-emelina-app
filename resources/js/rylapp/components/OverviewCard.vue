<template>
  <v-card height="124" width="250" color="orange lighten-4" light>
    <v-card-title class="font-weight-medium pt-4 pl-6 mb-2">
      {{ overview.text }}
    </v-card-title>

    <v-card-text>
      <p class="text-h4 font-weight-bold pl-2">{{ overview.value }}</p>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "overview-card",
  props: {
    overview: {
      text: "",
      value: "",
    },
  },
}
</script>

<style>
</style>