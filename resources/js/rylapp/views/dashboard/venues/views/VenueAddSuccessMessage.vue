<template>
  <v-dialog v-model="message" width="500px">
    <v-card>
      <v-card-title class="headline green lighten-5">
        Successfully Added
        <v-icon class="pb-1 pl-1" color="green" large> mdi-check-bold </v-icon>
      </v-card-title>
      <v-card-text class="pt-6 pb-12 body-1">
        Venue successfully added...
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions centered>
        <v-spacer></v-spacer>
        <v-btn color="success" x-large text @click="message = false">
          OK
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "venue-add-success-message",
  props: ["message"],
}
</script>