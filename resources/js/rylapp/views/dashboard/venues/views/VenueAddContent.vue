<template>
  <v-card class="pa-4" elevation="0">
    <h1 class="text-h6 font-weight-medium">Content</h1>
    <v-row class="flex-column">
      <v-col>
        <ckeditor
          :editor="editor"
          v-model="description"
          :config="editorConfig"
        />
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic"

export default {
  name: "venue-add-content",
  data: () => ({
    description: null,
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
  methods: {
    submit_content() {},
  },
}
</script>

<style>
</style>