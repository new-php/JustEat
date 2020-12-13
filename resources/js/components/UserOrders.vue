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
                            {{ order.created_at }}
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
                    {
                        id: 1,
                        user_id: 23,
                        address_id: "",
                        restaurant_id: 6,
                        details: "",
                        shipping: "",
                        total: 19.99,
                        order_status: "RECEIVED",
                        status: "COMPLETED",
                        rider_id: "",
                        delivery_mode: "",                            
                        delivery_time: "",
                        payed: "",
                        created_at: "01/01/2020",
                        updated_at: "",
                        restaurant: 
                        {
                            id: 6,
                            user_id: 54,
                            name: "TGB - The Good Burguer",
                            email: "",
                            photo: "",
                            logo: "",
                            phone: "",
                            address: "",
                            postal_code: "",
                            city: "",
                            state: "",
                            country: "",
                            cif: "",
                            created_at: "",
                            updated_at: "",
                        },
                        order_items: [
                            {
                                id: 1,
                                order_id: 1,
                                product_id: 1,
                                price: 10.00,
                                quantity: 1,
                                created_at: "", 
                                updated_at: "",
                            },
                            {
                                id: 2,
                                order_id: 1,
                                product_id: 4,
                                price: 5.00,
                                quantity: 1,
                                created_at: "",
                                updated_at: "",
                            },
                            {
                                id: 3,
                                order_id: 1,
                                product_id: 3,
                                price: 4.99,
                                quantity: 1,
                                created_at: "",
                                updated_at: "",
                            }
                        ],
                    },
                    {
                        id: 2,
                        user_id: 23,
                        address_id: "",
                        restaurant_id: 4,
                        details: "",
                        shipping: "",
                        total: 14.99,
                        order_status: "RECEIVED",
                        status: "COMPLETED",
                        rider_id: "",
                        delivery_mode: "",                            
                        delivery_time: "",
                        payed: "",
                        created_at: "25/05/2020",
                        updated_at: "",
                        restaurant: 
                        {
                            id: 4,
                            user_id: 26,
                            name: "Pans & Company",
                            email: "",
                            photo: "",
                            logo: "",
                            phone: "",
                            address: "",
                            postal_code: "",
                            city: "",
                            state: "",
                            country: "",
                            cif: "",
                            created_at: "",
                            updated_at: "",
                        },
                        order_items: [
                            {
                                id: 1,
                                order_id: 2,
                                product_id: 1,
                                price: 10.00,
                                quantity: 1,
                                created_at: "", 
                                updated_at: "",
                            },
                            {
                                id: 2,
                                order_id: 2,
                                product_id: 3,
                                price: 4.99,
                                quantity: 1,
                                created_at: "",
                                updated_at: "",
                            }
                        ],
                    }  
                ],
            }
        },
        methods: {
            goToOrder(order) {
                window.location.href = "/order/" + order.id;
            },
        }
    };
</script>
