require('./bootstrap');
import 'bootstrap';

import Vue from 'vue';
window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

Vue.component('vue-header', require('./components/Header.vue').default);
Vue.component('vue-footer', require('./components/Footer.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('restaurant-page', require('./components/RestaurantPage.vue').default);
Vue.component('restaurants-page', require('./components/RestaurantsPage.vue').default);
Vue.component('restaurants-categories', require('./components/RestaurantCategories.vue').default);
Vue.component('main-page', require('./components/MainPage.vue').default);
Vue.component('menu-restaurant-page', require('./components/MenuRestaurantsPage.vue').default);

const app = new Vue({
    el: '#app',
});
