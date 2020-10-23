<template>
    <v-app>
        <div class="d-flex flex-row">
            <!-- Sidebar Section -->
            <v-navigation-drawer 
                id="sidebar"
                v-model="sidebar.expanded"
                :width= "sidebar.width"
                :height="sidebar.height"
                dark
            >
               <!-- Sidebar Header -->
               <v-toolbar flat dark>
                    <v-toolbar-title class="headline text-uppercase">
                        <span class="font-weight-light">Royal Emelina</span>
                    </v-toolbar-title>
                </v-toolbar>

                 <!-- Sidebar List -->
                 <v-list>
                     <!-- Inquiries -->
                     <v-list-group
                        :value="false"
                        prepend-icon="mdi-account-circle"
                     >
                        <template v-slot:activator>
                            <v-list-item-title>Inquiries</v-list-item-title>
                        </template>

                        <v-list-item link to="inquiries"> 
                            <v-list-item-content>
                                <v-list-item-title>Pends</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                     </v-list-group>
                     <!-- Events -->
                     <v-list-group
                        :value="false"
                        prepend-icon="mdi-account-circle"
                     >
                        <template v-slot:activator>
                            <v-list-item-title>Events</v-list-item-title>
                        </template>

                        <v-list-item link>
                            <v-list-item-content>
                                <v-list-item-title>Calendar</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item link>
                            <v-list-item-content>
                                <v-list-item-title>Events</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                     </v-list-group>

                     <!-- Venues -->
                     <v-list-group
                        :value="false"
                        prepend-icon="mdi-account-circle"
                     >
                        <template v-slot:activator>
                            <v-list-item-title>Venues</v-list-item-title>
                        </template>
                        <v-list-item link>
                            <v-list-item-content>
                                <v-list-item-title>Venues</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                     </v-list-group>
                     <!-- Offers -->
                      <v-list-group
                        :value="false"
                        prepend-icon="mdi-account-circle"
                     >
                        <template v-slot:activator>
                            <v-list-item-title>Offers</v-list-item-title>
                        </template>
                        <v-list-item link>
                            <v-list-item-content>
                                <v-list-item-title>Food Packages</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                     </v-list-group>
                 </v-list>
            </v-navigation-drawer>

            <!-- Main Section -->
            <div id="main-content" class="d-flex flex-column">
                <v-app-bar max-height="64">
                    <v-app-bar-nav-icon @click ="sidebar.expanded = !sidebar.expanded"></v-app-bar-nav-icon>
                    <v-toolbar-title>This is Title</v-toolbar-title>
                </v-app-bar>
                <v-main>
                    <router-view></router-view>
                </v-main>
            </div>
        </div>
    </v-app>
</template>

<script>
import  { 
    VApp, 
    VAppBar, 
    VRow, 
    VCol, 
    VList, 
    VListGroup,
    VListItem, 
    VListItemContent, 
    VListItemTitle, 
    VListItemIcon
} from 'vuetify/lib'

export default {
    name: 'dashboard',
    data: () => ({
    sidebar: {
      expanded: true,
      height: "100vh",
      width: "315px"
    },
    item: 0,
      items: [
        { text: 'My Files', icon: 'mdi-folder' },
        { text: 'Shared with me', icon: 'mdi-account-multiple' },
        { text: 'Starred', icon: 'mdi-star' },
        { text: 'Recent', icon: 'mdi-history' },
        { text: 'Offline', icon: 'mdi-check-circle' },
        { text: 'Uploads', icon: 'mdi-upload' },
        { text: 'Backups', icon: 'mdi-cloud-upload' },
      ],
  }),
    watch: {
    //Sidebar Toggling
    "sidebar.expanded": function(newExpanded, oldExpanded) {
      if(newExpanded) this.sidebar.width = "315px"
      else this.sidebar.width = "0px"
    }
  }
}
</script>

<style lang="scss">
    #main-content {
        width: 100%;
    }
</style>