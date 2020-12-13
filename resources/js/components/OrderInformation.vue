<template>
    <div v-if="data_fetched" class="order-background">
        <form class="order-info-container" align="middle" >
            <span class="order-date">{{ new Date(order.created_at).getDate() }}/{{new Date(order.created_at).getMonth() + 1}}/{{new Date(order.created_at).getFullYear()}}</span>
            <span class="order-status"><strong>{{order.order_status}}</strong></span>
        </form>
        <section class="order-rating-container">
            <span class="user-name"><strong>Hola, {{username}}, ¿cómo ha ido tu pedido?</strong></span>
            <div class="ratings-input">
                <div class="food-rating">
                    <strong>Calidad de la comida</strong>
                    <b-form-rating class="star-rating" v-model="hardcoded_rating_1" stars="6" size="lg" color="#FF8000" inline no-border></b-form-rating>
                </div>
                <div class="service-rating">
                    <strong>Servicio del restaurante</strong>
                    <b-form-rating class="star-rating" v-model="hardcoded_rating_2" stars="6" size="lg" color="#FF8000" inline no-border></b-form-rating>
                </div>
                <div class="time-rating">
                    <strong>Hora de entrega</strong>
                    <b-form-rating class="star-rating" v-model="hardcoded_rating_3" stars="6" size="lg" color="#FF8000" inline no-border></b-form-rating>
                </div>
            </div>
            <div class="order-coment">
                <textarea class="coment-field" id="coment" placeholder="Cuéntanos tu experiencia"></textarea>
                <button id="save" type="submit" class="btn submit-button">
                    <span class="submit-button-text"><strong>Enviar</strong></span>
                </button>
            </div>
        </section>

        <div class="order-other-information">
            <section class="restaurant-section">
                <div class="restaurant-info">
                    <div class="restaurant-logo-container">
                        <img draggable="false" class="restaurant-logo" :src="'storage/' + order.restaurant.logo">
                    </div>
                    <div class="restaurant-data">
                        <div class="restaurant-name">
                            <strong>{{ order.restaurant.name }}</strong>
                        </div>
                        <div class="restaurant-address">
                            <div>{{ order.restaurant.address }}, {{ order.restaurant.city }}, {{ order.restaurant.postal_code }}</div>
                            <div>{{ order.restaurant.phone }}</div>
                        </div>
                        <a href="">Ver la carta</a>
                    </div>
                </div>

                <div class="separator">
                    <hr>
                </div>

                <div class="order-summary">
                    <div class="summary-label"><strong>Resumen del pedido</strong>
                    </div>
                    <section class="products-list" v-for="(item) in order.order_items" :key=item.id :id="'order_item-' + item.id">
                        <span class="item-info"><strong>{{item.quantity}}x {{item.product.name}}</strong>
                        </span>
                        <span class="item-price">
                            <strong>{{ item.price }}€</strong>
                        </span>
                    </section>
                </div>

                <div class="separator">
                    <hr>
                </div>

                <div class="costs-section">
                    <div class="subtotal">
                        <span class="subtotal-label">SUBTOTAL:</span>
                        <span class="subtotal-price">{{ order.total }}€</span>
                    </div>
                    <div class="shipping">
                        <span class="shipping-label">Gastos de entrega:</span>
                        <span class="shipping-price">{{ order.shipping }}€</span>
                    </div>
                </div>

                <div class="separator">
                    <hr>
                </div>

                <div class="order_price">
                    <span class="order_price-label"><strong>Total pagado en VISA</strong></span>
                    <span class="order_price-price"><strong>{{ order.total + order.shipping }}€</strong> </span>
                </div>
            </section>

            <section class="user-section">
                <div class="user-info">
                    <div class="address-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="user-address">
                        <div class="user-info-label">
                            <strong>Dirección de entrega</strong>
                        </div>
                        <div class="user-info-name"><strong>{{ order.address.name }}</strong>
                        </div>
                        <div class="user-info-address">
                            <div>{{ order.address.address_line_1 }}, {{ order.address.city }}, {{ order.address.postal_code }}</div>
                            <div>{{ order.address.phone }}</div>
                        </div>
                    </div>
                </div>
                <div class="user-coment"> <p>User coments</p></div>
            </section>
        </div>

    </div>
</template>

<script>
    export default {
        name: "OrderInformation",
        props: ["id"],
        data() {
            return {
                data_fetched: false,
                hardcoded_rating_1: 0,
                hardcoded_rating_2: 0,
                hardcoded_rating_3: 0,
                order: {
                },
            }
        },
        methods:{
            goToRestaurant() {
                window.location.href = "/restaurants/" + this.restaurant.id;
            },
        },
        mounted(){
            //get per l'order
            window.axios.get('order/' + this.id)
            .then(response => {
                this.order = response.data.data.order;
                this.data_fetched = true;
            })
            .catch(response => {
                if (error.response.status == 401) {
                    window.localStorage.removeItem('auth_token');
                    window.localStorage.removeItem('username');
                    window.location.href = '/login';
                }
            });
        },
        computed: {
            username: function() {
                var username = window.localStorage.getItem('username');
                if (username && username !== undefined && username !== "undefined") {
                    if (username != "null") {
                        return username
                    } else {
                        return "Mi Cuenta";
                    }
                }
            }
        },
    };
</script>
