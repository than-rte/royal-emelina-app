import Vue from "vue"
import VueRouter from "vue-router"
import admin from "../views/dashboard/Admin.vue"
import enquiries from "../views/dashboard/enquiries/Enquiries.vue"
import reservations from "../views/dashboard/reservations/Reservations.vue"
import venues from "../views/dashboard/venues/Venues.vue"
import events from "../views/dashboard/events/Events.vue"
import foodPackages from "../views/dashboard/food-packages/FoodPackages.vue"
import VenueAdd from "../views/dashboard/venues/views/VenueAdd.vue"
import VenueList from "../views/dashboard/venues/views/VenueList.vue"
import VenueShow from "../views/dashboard/venues/views/VenueShow.vue"
import VenueEdit from "../views/dashboard/venues/views/VenueEdit.vue"
import galleries from "../views/dashboard/galleries/Galleries.vue"
import books from "../views/dashboard/books/Books.vue"

Vue.use(VueRouter)

const routes = [
  {
    path: "/rylapp",
    component: admin,
    children: [
      {
        path: "",
        redirect: { name: "books" }
      },
      {
        name: "inquiries",
        path: "inquiries",
        component: enquiries
      },
      {
        name: "books",
        path: "books",
        component: books
      },
      {
        name: "reservations",
        path: "reservations",
        component: reservations
      },
      {
        name: "galleries",
        path: "galleries",
        component: galleries
      },
      {
        path: "venues",
        component: venues,
        children: [
          {
            path: "",
            name: "venues",
            redirect: { name: "list" }
          },
          {
            name: "list",
            path: "list",
            component: VenueList
          },
          {
            name: "venue-add",
            path: "add",
            component: VenueAdd
          },
          {
            name: "venue-show",
            path: "show/:id",
            component: VenueShow
          },
          {
            name: "venue-edit",
            path: "edit/:id",
            component: VenueEdit
          }
        ]
      },
      {
        name: "events",
        path: "events",
        component: events
      },
      {
        name: "food-packages",
        path: "food-packages",
        component: foodPackages
      },
      {
        // matches everything else
        path: "*",
        name: "not-found",
        redirect: { name: "" }
      }
    ]
  }
]

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
})

export default router
