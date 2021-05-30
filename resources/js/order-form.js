import axios from 'axios'
import VueAxios from 'vue-axios'


import { createApp } from 'vue'
import FormOrder from './components/FormOrder.vue'

createApp(FormOrder).use(VueAxios, axios).mount("#order-form");

