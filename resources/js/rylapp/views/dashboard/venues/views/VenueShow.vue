<template>
  <div>
    <v-card tile elevation="2">
      <v-img
        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
        height="340px"
      >
        <v-btn
          absolute
          top
          left
          tile
          color="normal"
          @click="$router.push({ name: 'venues' })"
        >
          <v-icon left> mdi-keyboard-backspace </v-icon>
          Back to list
        </v-btn>
        <v-btn color="white" absolute top right icon x-large>
          <v-icon> mdi-image-edit-outline </v-icon>
        </v-btn>
      </v-img>

      <!-- VENUE NAME -->
      <v-card-title v-if="!isNameEditorOpened" class="text-h4 mt-6">
        {{ venue.name }}
        <v-tooltip right>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              class="ml-2"
              text
              v-bind="attrs"
              v-on="on"
              @click="isNameEditorOpened = true"
            >
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
          </template>
          Rename venue name
        </v-tooltip>
      </v-card-title>
      <v-card-title v-else class="text-h4 mt-6">
        <v-col cols="5" class="d-flex align-center">
          <v-text-field name="name" label="Venue name" v-model="venue.name" />
          <v-btn
            class="mx-2"
            x-small
            fab
            elevation="0"
            color="success"
            @click="isNameEditorOpened = false"
          >
            <v-icon>mdi-check</v-icon>
          </v-btn>
          <v-btn
            x-small
            fab
            elevation="0"
            color="error"
            @click="isNameEditorOpened = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-col>
      </v-card-title>
      <!--  -->
      <!--  -->

      <!-- Venue Content -->
      <div v-if="venue.description" class="d-flex mr-2">
        <v-spacer></v-spacer>
        <v-btn text color="primary" @click="isContentEditorOpened = false">
          <v-icon class="mr-2">mdi-pencil</v-icon>
          Edit content
        </v-btn>
      </div>
      <v-card-text
        v-if="venue.description"
        class="body-1"
        v-html="venue.description"
      >
      </v-card-text>
      <v-card-text v-else-if="!isContentEditorOpened" class="text-h4">
        NO CONTENT
        <v-btn text color="success" @click="isContentEditorOpened = true">
          <v-icon>mdi-plus</v-icon>
          Create Content
        </v-btn>
      </v-card-text>
      <v-card-text v-else class="text-h4">
        <h1 class="text-h6 font-weight-medium">Content</h1>
        <v-row class="flex-column">
          <v-col>
            <ckeditor
              :editor="editor"
              v-model="venue.description"
              :config="editorConfig"
            />
          </v-col>
          <v-col class="d-flex">
            <v-btn
              text
              color="normal mr-2"
              @click="isContentEditorOpened = false"
            >
              Cancel
            </v-btn>
            <v-btn tile color="success" @click="isContentEditorOpened = false">
              Save
            </v-btn>
          </v-col>
        </v-row>
      </v-card-text>
      <!--  -->
      <!--  -->
    </v-card>

    <v-card tile elevation="2" class="mt-2 px-3 pb-2">
      <v-row>
        <v-col cols="4">
          <!-- features -->
          <!-- feature not exists -->
          <div v-if="isEmpty(venue.features)">
            <venue-no-features
              v-if="!featuresCreate"
              @open:add-features="(action) => (featuresCreate = action)"
            />

            <!-- features create -->
            <venue-features-create
              v-else-if="featuresCreate"
              @close:add-features="(action) => (featuresCreate = action)"
              :features="venue.features"
            />
          </div>

          <!-- features exists -->
          <div v-else>
            <!-- features exists -->
            <v-card tile elevation="0" color="grey lighten-3">
              <v-btn
                v-if="!featuresEditor"
                absolute
                top
                right
                text
                color="primary"
                @click="featuresEditor = true"
              >
                <v-icon>mdi-square-edit-outline</v-icon>
              </v-btn>
              <v-card-title>
                <v-icon large class="mr-2">mdi-information-variant</v-icon>
                Features
              </v-card-title>
              <!-- features list -->
              <v-card-text
                v-if="!featuresEditor"
                class="body-1 d-flex flex-column"
              >
                <span v-for="i in 5" :key="i" class="py-2">
                  lorem {{ i }}
                </span>
              </v-card-text>
              <!-- features edit -->
              <v-card-text v-else class="body-1 d-flex flex-column">
                <div class="d-flex align-center">
                  <v-text-field
                    v-model="newFeature"
                    type="text"
                    name="newFeature"
                    label="Add new feature"
                  />
                  <v-btn class="ml-2 mb-2" fab x-small color="normal">
                    <v-icon>mdi-plus</v-icon>
                  </v-btn>
                </div>
                <span v-for="i in 5" :key="i" class="py-2">
                  <v-btn icon x-small color="error">
                    <v-icon>mdi-close</v-icon>
                  </v-btn>
                  <v-btn icon x-small color="primary">
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>
                  Feature {{ i }}
                </span>
                <v-divider></v-divider>
                <div class="mt-4 d-flex flex-row-reverse">
                  <v-btn
                    class="mx-2"
                    x-small
                    fab
                    elevation="0"
                    color="success"
                    @click="featuresEditor = false"
                  >
                    <v-icon>mdi-check</v-icon>
                  </v-btn>
                  <v-btn
                    x-small
                    fab
                    elevation="0"
                    color="error"
                    @click="featuresEditor = false"
                  >
                    <v-icon>mdi-close</v-icon>
                  </v-btn>
                </div>
              </v-card-text>
            </v-card>
          </div>
          <!--  -->
          <!--  -->
        </v-col>
        <v-col cols="4">
          <v-card tile elevation="0" color="grey lighten-3">
            <v-card-title>
              <v-icon large class="mr-2">mdi-account-multiple</v-icon>
              Capacities
            </v-card-title>
            <v-card-text class="body-1">
              <span class="font-weight-medium">{{ venue.max_people }}</span>
              people (minimum of
              <span class="font-weight-medium">{{ venue.min_people }}</span>
              people)
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-card>
    <v-card class="mt-2 px-3 pb-2">
      <v-row>
        <v-col cols="8">
          <v-card tile color="grey lighten-3" elevation="0">
            <v-card-title> Available Dates </v-card-title>
            <v-card-text>
              <v-calendar interval-height="300" interval-width="300">
              </v-calendar>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import VenueNoFeatures from "./features/VenueNoFeatures";
import VenueFeaturesCreate from "./features/VenueFeaturesCreate";

export default {
  name: "venue-show",
  components: {
    VenueNoFeatures,
    VenueFeaturesCreate,
  },
  data: () => ({
    venue: [],
    show: false,
    isNameEditorOpened: false,
    isContentEditorOpened: false,
    featuresCreate: false,
    featuresEditor: false,
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
    getContacts() {
      return Object.values(this.venue);
    },
  },
  methods: {
    isEmpty(arr) {
      if (arr) return false;
      return true;
    },
  },
  mounted() {
    axios
      .get("http://royalemelina.test/api/venues/" + this.$route.params.id)
      .then((res) => {
        this.venue = res.data.data;
      })
      .catch((err) => {});
  },
};
</script>

<style>
</style>