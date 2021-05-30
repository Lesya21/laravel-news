import axios from 'axios'
import VueAxios from 'vue-axios'


import { createApp } from 'vue'
import Form from './components/Form.vue'

createApp(Form).use(VueAxios, axios).mount("#header-form");

