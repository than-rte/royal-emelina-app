<template>
  <v-card tile elevation="0" color="grey lighten-3">
    <v-card-title>
      <v-icon large class="mr-2">mdi-information-variant</v-icon>
      Features
    </v-card-title>
    <v-card-text class="body-1 d-flex flex-column">
      <div class="d-flex align-center">
        <v-text-field
          v-model="newFeature"
          type="text"
          name="newFeature"
          label="Add new feature"
        />
        <v-btn
          class="ml-2 mb-2"
          fab
          x-small
          color="normal"
          @click="$emit('save:add-features', newfeature)"
        >
          <v-icon>mdi-plus</v-icon>
        </v-btn>
      </div>
      <div v-if="hasFeatures(features)">
        <span v-for="(feature, i) in features" :key="i" class="py-2">
          <v-btn icon x-small color="error">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-btn icon x-small color="primary">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          {{ feature }}
        </span>
      </div>
      <v-divider></v-divider>
      <div class="mt-4 d-flex flex-row-reverse">
        <v-btn
          small
          elevation="0"
          color="error"
          @click="$emit('close:add-features', false)"
        >
          <v-icon left>mdi-close</v-icon>
          close
        </v-btn>
      </div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "venue-features-create",
  props: ["features"],
  data: () => ({
    newFeature: "",
  }),
  methods: {
    hasFeatures(item) {
      if (item) return true
      return false
    },
  },
}
</script>

<style>
</style>