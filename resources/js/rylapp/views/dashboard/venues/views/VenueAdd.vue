<template>
  <v-card class="px-16 pa-2" tile elevation="0">
    <v-btn
      class="mb-3"
      tile
      color="normal"
      @click="$router.push({ name: 'venues' })"
    >
      <v-icon left> mdi-keyboard-backspace</v-icon>
      back to venue list
    </v-btn>
    <v-card>
      <header-title
        :icon="'mdi-plus'"
        :titleText="'Add Venue'"
        :elevation="1"
      />
      <v-card-text>
        <v-sheet max-height="500px" class="pa-2 overflow-y-auto">
          <div class="text-h5">Details</div>
          <v-text-field
            label="Venue Name"
            name="name"
            type="text"
            v-model="venue.name"
          />
          <v-divider class="my-5"></v-divider>
          <div class="text-h5 mb-3">Content</div>
          <ckeditor
            :editor="editor"
            v-model="venue.content"
            :config="editorConfig"
            ref="editor"
          />
          <v-divider class="my-5"></v-divider>
          <div class="text-h5 mb-3">Capacity</div>
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
          <v-divider class="my-5"></v-divider>
          <div class="text-h5 mb-3">Features</div>
          <v-sheet class="d-flex">
            <v-text-field
              label="Venue Name"
              name="name"
              type="text"
              v-model="venue.name"
            />
            <v-btn class="mr-2" fab small color="success">
              <v-icon> mdi-plus</v-icon>
            </v-btn>
            <v-btn fab small color="error">
              <v-icon> mdi-trash-can</v-icon>
            </v-btn>
          </v-sheet>
          <v-list-item-group v-model="settings" multiple active-class="">
            <v-list-item>
              <template v-slot:default="{ active }">
                <v-list-item-action>
                  <v-checkbox :input-value="active"></v-checkbox>
                </v-list-item-action>

                <v-list-item-content>
                  <v-list-item-title>Notifications</v-list-item-title>
                  <v-list-item-subtitle
                    >Notify me about updates to apps or games that I
                    downloaded</v-list-item-subtitle
                  >
                </v-list-item-content>
                <v-list-item-action>
                  <v-icon color="primary">mdi-pencil</v-icon>
                </v-list-item-action>
              </template>
            </v-list-item>
          </v-list-item-group>
          <v-divider class="my-5"></v-divider>
          <div class="text-h5 mb-3">Gallery</div>
          <v-row>
            <v-col v-for="n in 9" :key="n" class="d-flex child-flex" cols="4">
              <v-img
                :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                aspect-ratio="1"
                class="grey lighten-2"
              >
                <template v-slot:placeholder>
                  <v-row
                    class="fill-height ma-0"
                    align="center"
                    justify="center"
                  >
                    <v-progress-circular
                      indeterminate
                      color="grey lighten-5"
                    ></v-progress-circular>
                  </v-row>
                </template>
              </v-img>
            </v-col>
          </v-row>
        </v-sheet>
      </v-card-text>
    </v-card>
  </v-card>
</template>

<script>
import HeaderTitle from "../partials/HeaderTitle"
import ClassicEditor from "@ckeditor/ckeditor5-build-classic"
import ckeditorConfig from "../../../../mixins/utils/ckeditorConfig"
import LightBox from "../../../../components/LightBox"
export default {
  name: "venue-add",
  components: {
    HeaderTitle,
    LightBox,
  },
  mixins: [ckeditorConfig],
  data: () => ({
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
    venue: {
      name: "",
      content: "",
    },
  }),
  mounted() {
    console.log(this.$refs.editor.value)
  },
}
</script>

<style>
</style>