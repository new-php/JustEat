require('./bootstrap');
import 'bootstrap';

import Vue from 'vue';
window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

Vue.component('restaurant-page', require('./components/RestaurantPage.vue').default);
Vue.component('restaurants-page', require('./components/RestaurantsPage.vue').default);
Vue.component('restaurants-categories', require('./components/RestaurantCategories.vue').default);
Vue.component('order-details', require('./components/OrderDetails.vue').default);
Vue.component('order-time-confirm', require('./components/OrderTimeConfirm.vue').default);
Vue.component('payment-method', require('./components/PaymentMethod.vue').default);

const app = new Vue({
    el: '#app',
});
