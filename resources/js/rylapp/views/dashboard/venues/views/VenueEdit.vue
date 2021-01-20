<template>
  <div ref="chat">
    <h1 class="text-h5 my-4 pl-5 font-weight-medium">Add Venue</h1>
    <v-card class="px-5 py-2 mt-3" max-width="100%" tile :elevation="4">
      <v-row>
        <v-col cols="6" class="mr-5">
          <h1 class="text-h6 font-weight-medium">Preview</h1>
          <v-text-field
            v-model="venue.name"
            name="name"
            type="text"
            label="Venue Name"
            :error-messages="axErrors.name"
            @input="clearField('name')"
            :rules="[(v) => !!v || 'The name field is required']"
            required
          />

          <h1 class="text-h6 font-weight-medium">People Capacity</h1>

          <v-text-field
            v-model="venue.min_people"
            name="min_people"
            @input="clearField('min_people')"
            type="number"
            min="0"
            label="Minimum people required"
            max-width="40"
            :error-messages="
              axErrors.min_people ||
              (errors.minError ? 'must be less than maximum people' : '')
            "
          />
          <v-text-field
            v-model="venue.max_people"
            name="max_people"
            @input="clearField('max_people')"
            type="number"
            min="0"
            label="Maximum people required"
            required
            :error-messages="
              axErrors.max_people ||
              (errors.maxError ? 'must be greater than minimum people' : '')
            "
          />
        </v-col>
        <v-col cols="4" class="ml-5">
          <h1 class="text-h6 font-weight-medium">Front Image</h1>
          <v-img height="128" width="256"></v-img>
        </v-col>
      </v-row>
    </v-card>
    <v-card class="pa-4 mt-3" tile :elevation="4">
      <h1 class="text-h6 font-weight-medium">Content</h1>
      <v-row class="flex-column">
        <v-col>
          <ckeditor
            :editor="editor"
            v-model="venue.description"
            :config="editorConfig"
          />
        </v-col>
        <v-col class="d-flex flex-row-reverse">
          <v-btn
            @click="edit_submit"
            tile
            color="success"
            x-large
            elevation="2"
          >
            Submit
          </v-btn>

          <v-btn
            @click="cancel_edit"
            tile
            color="normal"
            x-large
            elevation="0"
            class="mr-4"
          >
            Cancel
          </v-btn>
        </v-col>
      </v-row>
    </v-card>
    <v-dialog v-model="dialog" persistent max-width="480">
      <v-card>
        <v-card-title class="headline" color="success">
          <v-icon class="mr-2" color="green">mdi-checkbox-marked-circle</v-icon>
          Successfully Added
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text class="py-5 body-1">
          Venue successfully added...
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="closeDialog" x-large>
            OK
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic"
import axios from "axios"

export default {
  data: () => ({
    venue: {
      user_id: localStorage.getItem("id"),
      name: null,
      image: null,
      description: null,
      min_people: null,
      max_people: null,
    },
    errors: {
      minError: false,
      maxError: false,
    },
    axErrors: [],
    rules: {
      name: [
        (v) => !!v || "Venue name is required...",
        (v) =>
          (v && v.length <= 50) || "Venue name must be less than 50 characters",
      ],
    },
    dialog: false,
    editor: ClassicEditor,
    editorConfig: {
      toolbar: {
        items: [
          "heading",
          "|",
          "bold",
          "italic",
          "link",
          "|",
          "bulletedList",
          "numberedList",
          "|",
          "increaseIndent",
          "decreaseIndent",
          "insertTable",
          "|",
          "undo",
          "redo",
        ],
      },
      table: {
        contentToolbar: ["tableColumn", "tableRow", "mergeTableCells"],
      },
      language: "en",
    },
  }),
  computed: {
    errorsServer: {
      get() {
        return this.$store.state.venues.errors
      },
    },
  },
  methods: {
    add_venue() {
      this.axErrors = []
      axios
        .post("http://royalemelina.test/api/venues", this.venue)
        .then((res) => {
          this.dialog = true
        })
        .catch((err) => {
          this.axErrors = err.response.data.errors
        })

      // this.$store.dispatch('venues/addVenue', this.venue).catch(err => {

      //   console.log('asd')

      // })

      //  console.log('asdsadasda')
      //  this.$refs.chat.scrollIntoView()
      //   this.$router.push({name: 'venue-list'})
    },
    clearField(field) {
      this.axErrors[field] = null
    },
    closeDialog() {
      this.dialog = false
      this.$router.push({ name: "venue-list" })
    },
    cancel_edit() {
      this.$router.push({ name: "venue-list" })
    },
  },

  watch: {
    "venue.min_people": function (newv, oldv) {
      let min = Number(newv)
      let max = Number(this.venue.max_people)
      if (min > max) this.errors.minError = true
      else {
        this.errors.minError = false
        this.errors.maxError = false
      }
    },
    "venue.max_people": function (newv, oldv) {
      let max = Number(newv)
      let min = Number(this.venue.min_people)
      if (min > max) this.maxError = true
      else {
        this.errors.minError = false
        this.errors.maxError = false
      }
    },
  },

  mounted() {
    axios
      .get("http://royalemelina.test/api/venues/" + this.$route.params.id)
      .then((res) => {
        this.venue = res.data.data
      })
      .catch((err) => {})
  },
}
</script>

<style scoped>
</style>