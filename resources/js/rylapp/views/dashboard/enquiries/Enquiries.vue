<template>
  <v-container>
    <v-card>
    <v-card-title>
      Enquiries
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
    name: 'enquiries',
    data () {
      return {
         headers: [
          {
            text: 'Date',
            align: 'start',
            value: 'date'
          },
          { text: 'Guest Name', value: 'name' }, 
          { text: 'Messages', value:'messages' },
          { text: '', value:'' },
          
        ]
      }
    }
}
</script>

<style scoped>

</style>
