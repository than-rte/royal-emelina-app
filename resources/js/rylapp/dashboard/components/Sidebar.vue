<template>
   <v-navigation-drawer 
          v-model="sidebar.expanded"
          :width= "sidebar.width"
          :height="sidebar.height"
          dark
        >
        <v-toolbar flat dark>
          <v-toolbar-title class="headline text-uppercase">
              <span class="font-weight-light">Royal Emelina</span>
            </v-toolbar-title>
        </v-toolbar>
        </v-navigation-drawer>
</template>

<script>
import { VNavigationDrawer, VToolbar } from 'vuetify/lib'
export default {
    name: "sidebar",
    data: () => ({
    sidebar: {
      expanded: true,
      height: "100vh",
      width: "315px"
    }
  })
}
</script>

<style>

</style>