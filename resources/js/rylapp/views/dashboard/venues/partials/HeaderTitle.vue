<template>
  <v-card
    class="d-flex pa-1"
    tile
    color="grey lighten-5"
    :elevation="elevation || 0"
  >
    <v-icon color="orange darken-1" class="pr-2" x-large>
      {{ icon }}
    </v-icon>
    <h1 class="text-h4 my-4 font-weight-medium lh">{{ titleText }}</h1>
  </v-card>
</template>

<script>
export default {
  props: {
    icon: String,
    titleText: String,
    elevation: Number,
  },
}
</script>

<style>
</style>