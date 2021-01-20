<template>
  <div>
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="mx-5" tile color="success" v-bind="attrs" v-on="on">
          <v-icon left> mdi-plus </v-icon>
          Add venue
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Add Venue</span>
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
          <v-container>
            <v-text-field
              label="Venue Name"
              name="name"
              type="text"
              v-model="venue.name"
            />
            <v-text-field
              label="Minimum people required"
              name="min_people"
              type="number"
              min="0"
              v-model="venue.min_people"
            />
            <v-text-field
              label="Maximum people required"
              name="max_people"
              type="number"
              min="0"
              v-model="venue.max_people"
            />
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="error" text @click="close"> Cancel </v-btn>
          <v-btn color="success" text @click="form_submit"> Submit </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import apiCalls from "../../../../mixins/utils/apiCalls"
export default {
  name: "venue-add-dialog",
  data: () => ({
    dialog: false,
    message: false,
    submitted: false,
    venue: {
      user_id: localStorage.getItem("id"),
      name: "",
      min_people: "",
      max_people: "",
    },
  }),
  computed: {
    errors() {
      return $this.state.venues.errors
    },
    hasErrors() {
      return this.errors >= 1 ? true : false
    },
  },
  methods: {
    form_submit() {
      const venue = _.clone(this.venue)
      // this.$store.dispatch('venues/addVenue', venue);

      const submitted = this.post_addVenue(venue)
      submitted.then((res) => {
        if (res) {
          this.clearFields()
          this.dialog = false
        }
      })
    },
    clearFields() {
      this.venue.name = ""
      this.venue.min_people = ""
      this.venue.max_people = ""
    },
    close() {
      this.clearFields()
      this.dialog = false
    },
  },
  mixins: [apiCalls],
}
</script>