/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { ServerTable, ClientTable } from 'vue-tables-2';
Vue.use(ClientTable, {}, false, 'bootstrap4', 'default');
Vue.use(ServerTable, {}, false, 'bootstrap4', 'default');


Vue.component('App', require('./components/App.vue').default);


import router from './routes/index';
import services from './services/_index';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import Vuex from 'vuex';
import storeIndex from './store/index';
import Skeleton from 'vue-loading-skeleton';

Vue.use(Skeleton);

Vue.use(Vuex);
let store = new Vuex.Store(storeIndex);

Vue.use(Toast);

Vue.use(ElementUI);

Vue.config.productionTip = false

Vue.use({
	install(Vue) {
		Object.defineProperty(Vue.prototype, '$services', {
			value: services
		})
	}
})

const app = new Vue({
    el: '#app',
    router,
    store
});
