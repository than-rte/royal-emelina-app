<template>
  <v-container>
    <v-card class="d-flex pa-1 mb-3" tile color="grey lighten-5" elevation="0">
      <v-icon color="orange darken-1" class="pr-2" x-large
        >mdi-book-open</v-icon
      >
      <h1 class="text-h4 my-4 font-weight-medium lh">Book List</h1>
    </v-card>

    <v-data-table
      class="elevation-2 row-pointer"
      :headers="headers"
      :items="books"
      :search="search"
      :loading="books ? false : true"
      loading-text="Loading books.. Please wait"
      item-key="name"
      :sort-by="'schedule_time'"
      sort-desc
    >
      <template v-slot:[`item.actions`]="{ item }">
        <v-icon
          medium
          class="mr-2"
          color="blue lighten-1"
          @click="editBook(item)"
        >
          mdi-pencil-box-multiple-outline
        </v-icon>
        <v-icon medium color="red darken-1" @click="cancelBook(item)">
          mdi-cancel
        </v-icon>
      </template>
      <template v-slot:[`item.info`]="{ item }">
        <v-icon
          medium
          class="mr-2"
          color="blue lighten-1"
          @click="showBook(item)"
        >
          mdi-information
        </v-icon>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
export default {
  name: "books",
  data: () => ({
    search: "",
  }),
  methods: {},
  computed: {
    headers() {
      return [
        { text: "Venue", align: "start", value: "name" },
        { text: "Schedule Time", value: "schedule_time" },
        { text: "Duration", value: "duration" },
        { text: "Actions", align: "center", value: "actions" },
        { text: "Information", align: "center", value: "info" },
      ]
    },
    books: {
      get() {
        return []
      },
    },
  },
  created() {},
  mounted() {},
}
</script>

<style scoped>
.lh {
  line-height: 1.1;
}
</style>