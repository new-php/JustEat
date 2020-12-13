<template>
    <div class="order-background">
        <form class="order-info-container" align="middle" >
            <span class="order-date">{{order.created_at}}</span>
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
                <textarea class="coment-field" id="coment" placeholder="Cuéntanos tu experiencia" v-model="order.details"></textarea>
                <button id="save" v-on:click="send" type="submit" class="btn submit-button">
                    <span class="submit-button-text"><strong>Enviar</strong></span>
                </button>
            </div>
        </section>

        <div class="order-other-information">
            <section class="restaurant-section">
                <div class="restaurant-info">
                    <div class="restaurant-logo-container">
                        <img draggable="false" class="restaurant-logo" :src="'storage/' + restaurant.logo">
                    </div>
                    <div class="restaurant-data">
                        <div class="restaurant-name">
                            <strong>{{ restaurant.name }}</strong>
                        </div>
                        <div class="restaurant-address">
                            <div>{{ restaurant.address }}, {{ restaurant.city }}, {{ restaurant.postal_code }}</div>
                            <div>{{ restaurant.phone }}</div>
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
                    <section class="products-list" v-for="(item) in order_items" :key=item.id :id="'order_item-' + item.id">
                        <span class="item-info"><strong>{{item.quantity}}x {{products.find(element => element.id == item.product_id).name}}</strong>
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
                        <div class="user-info-name"><strong>{{ address.name }}</strong>
                        </div>
                        <div class="user-info-address">
                            <div>{{ address.address_line_1 }}, {{ address.city }}, {{ address.postal_code }}</div>
                            <div>{{ address.phone }}</div>
                        </div>
                    </div>
                </div>
                <div class="user-coment"> User coments</div>
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
                hardcoded_rating_1: 0,
                hardcoded_rating_2: 0,
                hardcoded_rating_3: 0,
                username: "Don Quijote",
                order: {
                    id: 1,
                    user_id: 23,
                    address_id: 8,
                    restaurant_id: 6,
                    details: "",
                    shipping: 1.60,
                    total: 19.99,
                    order_status: "RECEIVED",
                    status: "COMPLETED",
                    rider_id: "",
                    delivery_mode: "",                            
                    delivery_time: "",
                    payed: "",
                    created_at: "01/01/2020",
                    updated_at: "",
                },
                address:
                    {
                        id: 8,
                        user_id: 23,
                        name: "Don Quijote",
                        address_name: "Default",
                        phone: "671714702",
                        address_line_1: "Carrer de Mata, 3-5",
                        address_line_2: "",
                        observations: "",
                        city: "Barcelona",
                        postal_code: "08004",
                    },
                restaurant: {
                    id: 6,
                    user_id: 54,
                    name: "TGB - The Good Burguer",
                    email: "",
                    photo: "",
                    logo: "",
                    phone: "938328944",
                    address: "Carrer de Villarroel, 223",
                    postal_code: "08036",
                    city: "Barcelona",
                    state: "Catalunya",
                    country: "España",
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
                        product_id: 2,
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
                    }],
                products: [
                    {
                        id: 1,
                        restaurant_id: 6,
                        photo: "",
                        description: "",
                        name: "Mr Burguer",
                        price: 10.00,
                        available: "",
                    },
                    {
                        id: 2,
                        restaurant_id: 6,
                        photo: "",
                        description: "",
                        name: "Batido helado choco",
                        price: 5.00,
                        available: "",
                    },
                    {
                        id: 3,
                        restaurant_id: 6,
                        photo: "",
                        description: "",
                        name: "Patatas fritas",
                        price: 4.99,
                        available: "",
                    }],
            }
        },
        methods:{
            send(event) {
                event.preventDefault();
                window.axios.put('order/' + this.id,
                    {
                        order: this.order,
                        address: this.address,
                        restaurant: this.restaurant,
                        order_items: this.order_items,
                        products: this.products,
                    },
                )
                .then(response => {
                })
                .catch((error) => {
                });
            },
            goToRestaurant() {
                window.location.href = "/restaurants/" + this.restaurant.id;
            },
        },
        mounted(){
            //get per l'order
            window.axios.get('order/' + this.id)
            .then(response => {
                this.order = response.data.data.order;
                this.address = response.data.data.address;
                this.restaurant = response.data.data.restaurant;
                this.order_items = response.data.data.order_items;
                this.products = response.data.data.products;
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
