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
                 <v-list dense>
                    <!-- Customers --> 
                    <v-list-item-group>
                        <v-subheader>CUSTOMERS</v-subheader>
                   
                        <!-- Enquiries -->
                        <router-link to="/dashboard/enquiries">
                        <v-list-item>
                            <v-list-item-icon>
                                <v-icon>mdi-mailbox-outline</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Enquiries</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        </router-link>
                        <!-- Books -->
                        <v-subheader>BOOKS</v-subheader>
                    
                        <!-- Event Calendar -->
                        <v-list-item to="/dashboard/event-calendar">
                            <v-list-item-icon>
                                <v-icon>mdi-calendar-month-outline</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Event Calendar</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    
                        <!-- General -->
                        <v-subheader>GENERAL</v-subheader>
                   
                        <!-- Venues -->
                        <v-list-item to="/dashboard/venues">
                            <v-list-item-icon>
                                <v-icon>mdi-city-variant-outline</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Venues</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        <!-- Events -->
                        <v-list-item to="/dashboard/events">
                            <v-list-item-icon>
                                <v-icon>mdi-pencil-box-multiple-outline</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Events</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        <!-- Food Packages -->
                        <v-list-item to="/dashboard/food-packages">
                            <v-list-item-icon>
                                <v-icon>mdi-food-apple-outline</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>Food Packages</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-item-group>
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