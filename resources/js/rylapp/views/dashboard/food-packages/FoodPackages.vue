<template>
  <v-container>
    <v-card>
      <v-card-title>
        Food Packages
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="enquiries"
        :search="search"
      ></v-data-table>
    </v-card>
  </v-container>
</template>

<script>
import { VContainer } from 'vuetify/lib'

export default {
    name: 'food-packages',
}
</script>

<style>

</style>
