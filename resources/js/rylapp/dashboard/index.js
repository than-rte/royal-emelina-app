import Main from './Main'
import home from '../dashboard/views/home/index'

export default {
  path: '/dashboard',
  component: Main,
  children: [...home],
}