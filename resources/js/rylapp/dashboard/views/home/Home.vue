<template>
    <v-sheet width="100%">
         <v-app-bar flat>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
          </v-app-bar>
          <v-main>
          </v-main>
    </v-sheet>
</template>

<script>
import { VSheet, VAppBar, VAppBarNavIcon, VMain} from 'vuetify/lib'

export default {
    props: ['expanded'],
    name: 'home',
  //    watch: {
  //   //Sidebar Toggling
  //   expanded: function(newExpanded, oldExpanded) {
  //     if(newExpanded) this.sidebar.width = "315px"
  //     else this.sidebar.width = "0px"
  //   }
  // }
}
</script>

<style>

</style>
//  @click ="expanded = !expanded"