import Vue from 'vue'
import VueRouter from 'vue-router'
import App from '../App.vue'
import admin from '../views/dashboard/Admin.vue'
import dashboard from '../views/dashboard/dashboard/Dashboard.vue'
import enquiries from '../views/dashboard/enquiries/Enquiries.vue'
import reservations from '../views/dashboard/reservations/Reservations.vue'
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
                path: '/admin',
                component: admin,
                children: [
                    {
                        path: '',
                        redirect: {name: 'dashboard'}
                    },
                    {
                        name:'dashboard',
                        path: 'dashboard',
                        component: dashboard
                    },
                    {
                        name: 'inquiries',
                        path: 'inquiries',
                        component: enquiries
                    },
                    {
                        name: 'reservations',
                        path: 'reservations',
                        component: reservations
                    },
                    {   
                        name: 'venues',
                        path: 'venues',
                        component: venues
                    },
                    {   
                        name: 'events',
                        path: 'events',
                        component: events
                    },
                    {   name: 'food-packages',
                        path: ' food-packages',
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
