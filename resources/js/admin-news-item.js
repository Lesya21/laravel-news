import axios from 'axios'
import VueAxios from 'vue-axios'

import { createApp } from 'vue'
import NewsItem from './components/NewsItem.vue'

createApp(NewsItem).use(VueAxios, axios).mount('.admin-news-item');


