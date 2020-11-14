require('./bootstrap');
import 'bootstrap';

import Vue from 'vue';
window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

Vue.component('restaurant-page', require('./components/RestaurantPage.vue').default);
Vue.component('restaurants-page', require('./components/RestaurantsPage.vue').default);
Vue.component('restaurants-categories', require('./components/RestaurantCategories.vue').default);
Vue.component('main-page', require('./components/MainPage.vue').default);

const app = new Vue({
    el: '#app',
});
