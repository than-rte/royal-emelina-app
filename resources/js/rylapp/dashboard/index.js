import Main from './Main'
import home from '../dashboard/views/home/index'
import inquiries from '../dashboard/views/inquiries/index'

export default {
  name: "dashboard",
  path: 'dashboard',
  component: Main,
  children: [
    ...home,
    inquiries,
  ]
}