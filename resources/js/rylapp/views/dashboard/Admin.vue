<template>
    <v-app>
        <div class="d-flex flex-row">
            <!-- Sidebar Section -->
            <v-navigation-drawer 
                id="sidebar"
                v-model="sidebar.expanded"
                :width= "sidebar.width"
                class="sidebar-height sidebar-bg"
            >
               <!-- Sidebar Header -->
               <v-toolbar flat class="sidebar-bg mb-9" height="143px">
                    <v-toolbar-title class="headline text-uppercase">
                        <v-img
                            max-height="150"
                            max-width="250"
                            src="http://royalemelina.test/images/logo.png"
                    ></v-img>
                    </v-toolbar-title>
                </v-toolbar>

                <!-- nav links -->
                <v-list>
                    <v-list-item-group>
                         <div v-for="(navlink, i) in navLinks" :key="i">
                             <NavLink :link="navlink" />
                         </div>
                    </v-list-item-group>
                </v-list>
            </v-navigation-drawer>

            <!-- Main Section -->
            <div id="main-content" class="d-flex flex-column">
                <v-toolbar max-height="64">
                    <v-app-bar-nav-icon class="mr-3" @click ="sidebar.expanded = !sidebar.expanded"></v-app-bar-nav-icon>
                    
                    <v-spacer></v-spacer>
                    <v-menu
                        transition="slide-x-transition"
                        bottom
                        right
                        :offset-y="offset"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                            v-bind="attrs"
                            v-on="on"
                            icon
                            >
                           
                             <v-icon large>mdi-cog-outline</v-icon>
                            </v-btn>
                        </template>

                        <v-card>
                            <v-list>
                                <v-list-item>
                                    <v-list-item-avatar>
                                    <img
                                        src=""
                                        alt=""
                                    >
                                    </v-list-item-avatar>

                                    <v-list-item-content>
                                        <v-list-item-title>{{ getUserFullName }}</v-list-item-title>
                                        <v-list-item-subtitle>Administrator</v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                            <v-divider></v-divider>

                            <v-list>
                                <v-list-item link>
                                    <v-list-item-title>Edit Profile</v-list-item-title>
                                </v-list-item>
                            </v-list>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="primary"
                                    text
                                    @click="logout()"
                                >
                                    Logout
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-menu>
                </v-toolbar>
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

import NavLink from '../../components/NavLink'

import axios from 'axios'

export default {
    name: 'admin',
    components: {
        NavLink
    },
    data: () => ({
    selectedLink: 0,
    navLinks: [
        {
            text: 'Dashboard',
            icon: 'mdi-home',
            link: "dashboard",
        },
        {
            text: 'Inquiries',
            icon: 'mdi-mailbox',
            link: "inquiries",
        },
        {
            text: 'Reservations',
            icon: 'mdi-calendar-month',
            link: "reservations",
        },
        {
            text: 'More',
            icon: 'mdi-more',
            linkItems: [
                {
                    text: 'Venues',
                    icon: 'mdi-city-variant',
                    link: 'venues'
                },
                {
                    text: 'Events',
                    icon: 'mdi-pencil-box-multiple',
                    link: 'events'
                },
                {
                    text: 'Food Packages',
                    icon: 'mdi-food-apple',
                    link: 'food-packages'
                },
            ],
        },
    ],
    offset: true,
    sidebar: {
      expanded: true,
      height: "1999px",
      width: "300px"
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
    user: {
        fname: '',
        lname: '',
    },
  }),
  computed: {
      getUserFullName() {
          return `${this.user.fname} ${this.user.lname}`
      }
  },
  methods: {
      logout() {
          axios.post('http://royalemelina.test/dashboard/logout')
            .then(res => {
                
                localStorage.clear()

                window.location.href = 'http://royalemelina.test'
            })
      }
  },
  watch: {
    //Sidebar Toggling
    "sidebar.expanded": function(newExpanded, oldExpanded) {
      if(newExpanded) this.sidebar.width = "315px"
      else this.sidebar.width = "0px"
    }
  },
  mounted() {
      this.user.fname = localStorage.getItem('first_name')
      this.user.lname = localStorage.getItem('last_name')
  }
}
</script>

<style lang="scss">
    #main-content {
        width: 100%;
    }

    .text-header {
        color: #fff !important;
        text-decoration: none;
    }

    .sidebar-height {
        min-height: 100vh !important;
    }

    .v-text-field{
      width: 400px;
    }

    .v-menu__content {
        top: 70px !important;
    }

    .sidebar-bg {
        background: #f9f6f7 !important;
    }
</style>