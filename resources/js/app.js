require('./bootstrap');
import 'bootstrap';

import Vue from 'vue';
window.Vue = require('vue');

Vue.component('restaurants-page', require('./components/RestaurantsPage.vue').default);
Vue.component('restaurants-categories', require('./components/RestaurantCategories.vue').default);

const app = new Vue({
    el: '#app',
});
