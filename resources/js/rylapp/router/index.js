import Vue from 'vue'
import VueRouter from 'vue-router'
import App from '../App.vue'
import dashboard from '../views/dashboard/Dashboard.vue'
import home from '../views/dashboard/home/Home.vue'
import enquiries from '../views/dashboard/enquiries/Enquiries.vue'
import eventCalendar from '../views/dashboard/event-calendar/EventCalendar.vue'
import venues from '../views/dashboard/venues/Venues.vue'
import events from '../views/dashboard/events/Events.vue'
import foodPackages from '../views/dashboard/food-packages/FoodPackages.vue'

Vue.use(VueRouter)

const routes = [
    {
        // path: '/',
        // component: App,
        // children: [
        //     {
                path: '/dashboard',
                component: dashboard,
                children: [
                    {
                        path: '',
                        component: home
                    },
                    {
                        path: 'enquiries',
                        component: enquiries
                    },
                    {
                        path: 'event-calendar',
                        component: eventCalendar
                    },
                    {
                        path: 'venues',
                        component: venues
                    },
                    {
                        path: 'events',
                        component: events
                    },
                    {
                        path: 'food-packages',
                        component: foodPackages
                    }
                ]
        //     }
        // ],
    }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
