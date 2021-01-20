<template>
  <v-app>
    <v-row no-gutters style="flex-wrap: nowrap">
      <v-col cols="auto">
        <!-- Sidebar Section -->
        <v-navigation-drawer
          id="cs-sidebar"
          v-model="sidebar.expanded"
          :width="sidebar.width"
          light
          floating
        >
          <!-- Sidebar Header -->
          <v-toolbar flat class="grey lighten-5 mb-9 mt-2" height="143px">
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
      </v-col>
      <v-col id="main-content">
        <v-row class="d-flex flex-column" no-gutters>
          <v-col>
            <v-toolbar min-height="90" class="py-md-2" flat>
              <v-app-bar-nav-icon
                class="mr-3"
                @click="sidebar.expanded = !sidebar.expanded"
              ></v-app-bar-nav-icon>

              <v-spacer></v-spacer>
              <v-menu transition="slide-x-transition" bottom right offset-y>
                <template v-slot:activator="{ on, attrs }">
                  <v-btn
                    v-bind="attrs"
                    v-on="on"
                    tile
                    class="px-13"
                    :elevation="0"
                    color="orange lighten-4"
                  >
                    <v-icon left large>mdi-account</v-icon>
                    Admin
                  </v-btn>
                </template>

                <v-card flat tile :elevation="0">
                  <v-list>
                    <v-list-item>
                      <v-list-item-avatar>
                        <img src="" alt="" />
                      </v-list-item-avatar>

                      <v-list-item-content>
                        <v-list-item-title>
                          {{ getUserFullName }}
                        </v-list-item-title>
                        <v-list-item-subtitle> Administrator </v-list-item-subtitle>
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
                    <v-btn color="primary" text @click="logout()"> Logout </v-btn>
                  </v-card-actions>
                </v-card>
              </v-menu>
            </v-toolbar>
            <v-divider color="red"></v-divider>
          </v-col>
          <v-col>
            <v-main>
              <transition name="router-anim">
                <router-view></router-view>
              </transition>
            </v-main>
            <v-footer padless color="white">
              <v-col class="text-center" cols="12"> </v-col>
            </v-footer>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-app>
</template>

<script>
import NavLink from "../../components/NavLink"

import axios from "axios"

export default {
  name: "admin",
  components: {
    NavLink,
  },
  data: () => ({
    items: [
      { title: "Click Me" },
      { title: "Click Me" },
      { title: "Click Me" },
      { title: "Click Me 2" },
    ],
    navLinks: [
      {
        text: "Books",
        icon: "mdi-book-open",
        link: "books",
      },
      {
        text: "Schedules",
        icon: "mdi-calendar-month",
        link: "reservations",
      },
      {
        text: "Inquiries",
        icon: "mdi-mailbox",
        link: "inquiries",
      },
      {
        text: "Galleries",
        icon: "mdi-image-multiple",
        link: "galleries",
      },
      {
        text: "More",
        icon: "mdi-more",
        linkItems: [
          {
            text: "Venues",
            icon: "mdi-city-variant",
            link: "venues",
          },
          {
            text: "Events",
            icon: "mdi-pencil-box-multiple",
            link: "events",
          },
          {
            text: "Food Packages",
            icon: "mdi-food-apple",
            link: "food-packages",
          },
        ],
      },
    ],
    offset: true,
    sidebar: {
      expanded: true,
      width: "260",
    },
    user: {
      fname: "",
      lname: "",
    },
  }),
  computed: {
    getUserFullName() {
      return `${this.user.fname} ${this.user.lname}`
    },
  },
  methods: {
    logout() {
      axios.post("http://royalemelina.test/admin/logout").then(res => {
        localStorage.clear()

        window.location.href = "http://royalemelina.test"
      })
    },
  },
  watch: {
    //Sidebar Toggling
    "sidebar.expanded": function (newExpanded, oldExpanded) {
      if (newExpanded) this.sidebar.width = "260"
      else this.sidebar.width = "0"
    },
  },
  mounted() {
    this.user.fname = localStorage.getItem("first_name")
    this.user.lname = localStorage.getItem("last_name")
  },
}
</script>

<style lang="scss" scoped>
.bg {
  background: blue;
}
#cs-sidebar {
  min-height: 100vh;
  background-color: #fafafa;
}

#main-content {
  width: 100%;
}

.text-header {
  color: #fff !important;
  text-decoration: none;
}

.v-text-field {
  width: 400px;
}

.v-menu__content {
  top: 70px !important;
}

.router-anim-enter-active {
  animation: fadeIn ease 0.5s;
}
@keyframes fadeIn {
  0% {
    transform: translateY(-15px);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}

.router-anim-leave-active {
  animation: fadeOut ease;
}
@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
</style>
