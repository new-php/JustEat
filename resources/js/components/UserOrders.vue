<template>
    <div class="info-background">
        <form class="info-container" align="middle" >
            <span class="info-label">Pedidos previos</span>

            <div class="orders-container">
                <section class="order-card" v-for="(order) in orders" :key=order.id :id="'order-' + order.id" v-on:click="goToOrder(order)">
                    <div class="order-restaurant-logo-container">
                        <img draggable="false" class="order-restaurant-logo" :src="'storage/' + order.restaurant.logo">
                    </div>
                    <div class="order-info">
                        <div class="order-restaurant-name">
                            <strong>{{ order.restaurant.name }}</strong>
                        </div>
                        <div class="order-date">
                            {{ new Date(order.created_at).getDate() }}/{{new Date(order.created_at).getMonth() + 1}}/{{new Date(order.created_at).getFullYear()}}
                        </div>
                        <div class="order-price">
                            {{ order.total }}€
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "UserOrders",
        props: [],
        data() {
            return {
                orders: [
                ],
            }
        },
        methods: {
            goToOrder(order) {
                window.location.href = "/order/" + order.id;
            },
        },
        mounted(){
            //get per l'order
            window.axios.get('orders')
            .then(response => {
                this.orders = response.data.data;
            })
            .catch(response => {
                if (error.response.status == 401) {
                    window.localStorage.removeItem('auth_token');
                    window.localStorage.removeItem('username');
                    window.location.href = '/login';
                }
            });
        },
    };
</script>
