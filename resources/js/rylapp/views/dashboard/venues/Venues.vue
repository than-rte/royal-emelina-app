<template>
  <v-container>
    <div class="title mt-5">
      <h1>Venues</h1>
    </div>
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
        ></v-text-field>
    </div>
    <v-data-table
        class="elevation-2"
        :headers="headers"
        :items="getVenues"
        :search="search"
    >
    <template v-slot:[`item.actions`]="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon>
    </template>
    </v-data-table>
  </v-container>
</template>

<script>
import { VContainer } from 'vuetify/lib'

export default {
    name: 'venues',
    data: () => {
      return {
        search: '',
        headers: [
          { text: 'Venue Name', align: 'start', value: 'name' },
          { text: 'Available', value: 'available' }, 
          { text: 'Actions', value:'actions' },
          {text: 'Created At', align: 'end', value: 'created_at' },
          {text: 'Updated At', align: 'end', value: 'updated_at' },
        ],
      }
    },
    computed: {
      getVenues: {
        get() {
          return this.$store.state.venues.venues
        }
      }
    },
    created() {
      this.$store.dispatch('venues/fetchVenues')
    }
}
</script>

<style>

</style>
