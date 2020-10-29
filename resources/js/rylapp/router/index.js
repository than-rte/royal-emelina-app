import Vue from 'vue'
import VueRouter from 'vue-router'
import App from '../App'
import dashboard from '../dashboard/index'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: App,
    children: [
      {
        path: '/dashboard',
        component: () => import('../dashboard/Main.vue'),
        children: [
          {
            path: 'inquiries',
            component: () => import('../dashboard/views/inquiries/Inquiries.vue')
          }
        ],
      },
    ],

  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
