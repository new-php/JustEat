<template>
    <div class="bg-white payment-page-container" align="middle">
        <h3 class="my-3"><strong>¿Cómo te gustaría pagar?</strong></h3>
        <div class="bg-white payment-container">
            <div class="payment-type-container mr-2">
                <div class="payment-type payment-type-bottom-line" v-for="payment in payments" :id="'payment-type-' + payment.id">
                    <div class="payment-type-header" v-on:click="expand_collapse('payment-type-' + payment.id)">
                        <div class="payment-type-header-text">
                            <div id="radio" dusk="radio-default" class="payment-type-radio">
                                <div class="checked"></div>
                            </div>
                            <span class="payment-type-label">{{ payment.type }} {{ payment.number }} {{ payment.exp }}</span>
                        </div>
                        <i id="angle" class="payment-angle fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class="payment-type-body" id="payment-body">
                        <div class="payment-type-card">
                            <img v-if="payment.type == 'VISA'" src="/storage/images/visa.svg" class="card-image">
                            <img v-if="payment.type == 'MASTERCARD'" src="/storage/images/mastercard.svg" class="card-image">
                            <img v-if="payment.type == 'AMERICANEXPRESS'" src="/storage/images/americanexpress.svg" class="card-image">
                            <span>{{ payment.type }}</span>
                        </div>
                        <div class="coupon-section">
                            <a class="coupon-link" dusk="default-coupon" href="#" v-on:click="open_close_coupon"><strong>Tengo un código de descuento</strong></a>
                            <div v-if="coupon_container_open" class="coupon-container">
                                <input class="coupon-input" type="text" name="coupon">
                                <button class="btn coupon-button" v-on:click="apply_coupon">Aplicar</button>
                            </div>
                        </div>
                        <button class="btn pay-button" v-on:click="pay" id="user-payment">Hacer mi pedido</button>
                    </div>
                </div>
                <div class="payment-type payment-type-bottom-line" id="payment-type-new">
                    <div class="payment-type-header" v-on:click="expand_collapse('payment-type-new')">
                        <div class="payment-type-header-text">
                            <div id="radio" dusk="radio-card" class="payment-type-radio">
                                <div class="checked"></div>
                            </div>
                            <span class="payment-type-label">Paga con tarjeta de débito o crédito</span>
                        </div>
                        <i id="angle" class="payment-angle fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class="payment-type-body" id="payment-body">
                        <div class="payment-type-card">
                            <img src="/storage/images/visa.svg" class="card-image">
                            <img src="/storage/images/mastercard.svg" class="card-image">
                            <img src="/storage/images/americanexpress.svg" class="card-image">
                        </div>
                        <div class="payment-card-info">
                            <div class="payment-card-info-line">
                                <span><strong>Número de tarjeta</strong></span>
                                <input class="text-input" type="text" name="coupon">
                            </div>
                            <div class="payment-card-info-line">
                                <input type="checkbox">
                                <span>Guardar esta tarjeta</span>
                            </div>
                            <div class="payment-card-info-line">
                                <span><strong>Fecha de caducidad</strong></span>
                                <br>
                                <select class="">
                                    <option v-for="month in months">{{month}}</option>
                                </select>
                                <select class="">
                                    <option v-for="year in years">{{year}}</option>
                                </select>
                            </div>
                            <div class="payment-card-info-line">
                                <span><strong>Código de seguridad</strong></span>
                                <br>
                                <div class="security-code-container">
                                <input class="security-code-input" type="text" name="coupon">
                                    <svg class="security-code-photo" xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 100 60">
                                        <g id="Payment-badge-set">
                                            <g id="Dark-Payment-badges" transform="translate(-130 -264)">
                                                <g id="DinersClub-dark" transform="translate(130 264)">
                                                    <path id="Rectangle" d="M4 0h92c2.2 0 4 1.8 4 4v52c0 2.2-1.8 4-4 4H4c-2.2 0-4-1.8-4-4V4c0-2.2 1.8-4 4-4z" fill="#c3c3c3"/>
                                                    <path id="Fill-26" class="st1" d="M46.6 50.4zm0 0z"/>
                                                </g>
                                            </g>
                                        </g>
                                        <path d="M0 8.4h100v13H0z"/>
                                        <path class="st1" d="M4.1 27.6h92.7v18.3H4.1z"/>
                                        <text transform="translate(34.026 42.099)" font-size="15.229" font-family="Helvetica">123 456</text>
                                        <path fill="none" stroke="#ec1100" stroke-width="2" stroke-miterlimit="10" d="M63.4 27.6h33.4v18.3H63.4z"/>
                                    </svg>
                                    <span class="security-code-text">El código de 3 dígitos de la <strong>parte posterior</strong> de tu tarjeta</span>
                                </div>
                            </div>
                            <div class="payment-card-info-line">
                                <span><strong>Nombre del titular de la tarjeta</strong></span>
                                <input class="text-input" type="text" name="coupon">
                            </div>
                            <div class="payment-card-info-line">
                                <input type="checkbox">
                                <span class="payment-address">Dirección de facturación: {{ this.order.address }} (deselecciona esta casilla para modiificar esta dirección de facturación)</span>
                            </div>
                        </div>
                        <div class="coupon-section">
                            <a class="coupon-link" dusk="card-coupon" href="#" v-on:click="open_close_coupon"><strong>Tengo un código de descuento</strong></a>
                            <div v-if="coupon_container_open" class="coupon-container">
                                <input class="coupon-input" type="text" name="coupon">
                                <button class="btn coupon-button" v-on:click="apply_coupon">Aplicar</button>
                            </div>
                        </div>
                        <button class="btn pay-button" v-on:click="pay" id="new-payment">Hacer mi pedido</button>
                    </div>
                </div>
                <div class="payment-type payment-type-bottom-line" id="payment-type-paypal">
                    <div class="payment-type-header" v-on:click="expand_collapse('payment-type-paypal')">
                        <div class="payment-type-header-text">
                            <div id="radio" dusk="radio-paypal" class="payment-type-radio">
                                <div class="checked"></div>
                            </div>
                            <span class="payment-type-label">PayPal</span>
                        </div>
                        <i id="angle" class="payment-angle fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class="payment-type-body" id="payment-body">
                        <div class="payment-card-info">
                            <div class="payment-card-info-line">
                                <input type="checkbox">
                                <span class="payment-address">Guardar mis detalles de PayPal</span>
                            </div>
                        </div>
                        <div class="coupon-section">
                            <a class="coupon-link" dusk="paypal-coupon" href="#" v-on:click="open_close_coupon"><strong>Tengo un código de descuento</strong></a>
                            <div v-if="coupon_container_open" class="coupon-container">
                                <input class="coupon-input" type="text" name="coupon">
                                <button class="btn coupon-button" v-on:click="apply_coupon">Aplicar</button>
                            </div>
                        </div>
                        <button class="btn pay-button" v-on:click="pay" id="paypal-payment">Hacer mi pedido</button>
                    </div>
                </div>
                <div class="payment-type" id="payment-type-cash">
                    <div class="payment-type-header" v-on:click="expand_collapse('payment-type-cash')">
                        <div class="payment-type-header-text">
                            <div id="radio" dusk="radio-cash" class="payment-type-radio">
                                <div class="checked"></div>
                            </div>
                            <span class="payment-type-label">Pagar con dinero en efectivo</span>
                        </div>
                        <i id="angle" class="payment-angle fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class="payment-type-body" id="payment-body">
                        <button class="btn pay-button" v-on:click="pay" id="cash-payment">Hacer mi pedido</button>
                    </div>
                </div>
            </div>
            <div class="payment-type-container ml-2">
                <div class="your-order payment-type-bottom-line payment-padding">
                    <h4><strong>Tu pedido</strong></h4>
                    <div class="order-price-item" v-for="item in order.orderItems">
                        <span v-if="item.quantity > 1">{{ item.quantity }} x {{ item.name }}</span>
                        <span v-if="item.quantity <= 1">{{ item.name }}</span>
                        <span>{{ item.price }}</span>
                    </div>
                </div>
                <div class="your-order payment-type-bottom-line payment-padding">
                    <div class="order-price-item mb-2 order-price-sub">
                        <span><strong>Subtotal</strong></span>
                        <span><strong>{{ parseFloat(order.total).toFixed(2) }}</strong></span>
                    </div>
                    <div class="order-price-item my-2">
                        <span>Coste de envío</span>
                        <span>{{ parseFloat(order.shipping).toFixed(2) }}</span>
                    </div>
                    <div class="order-price-item mt-2 order-price-total">
                        <span><strong>Total</strong></span>
                        <span><strong>{{ (parseFloat(order.total) + parseFloat(order.shipping)).toFixed(2) }}</strong></span>
                    </div>
                </div>
                <div class="order-restaurant payment-type-bottom-line payment-padding text-center">
                    {{ order.restaurant.name }}, {{ order.restaurant.address }}, {{ order.restaurant.postal_code }} {{ order.restaurant.city }}
                </div>
                <div class="order-delivery payment-padding">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                        <path fill="#2A3846" d="M18.729 13.737c1.733 0 3.143 1.411 3.143 3.144s-1.41 3.144-3.143 3.144a3.147 3.147 0 01-3.145-3.144 3.148 3.148 0 013.145-3.144zM14.373 4c.32 0 .616.152.803.405l.065.1 3.321 5.818a1 1 0 01-.073 1.103l-.088.1-3.919 3.918a1 1 0 01-.575.285l-.132.008h-4.63c.14.355.223.74.223 1.144a3.148 3.148 0 01-3.144 3.144 3.147 3.147 0 01-3.143-3.144c0-.323.053-.634.146-.927l.077-.217H3a1 1 0 01-.993-.883L2 14.737v-.959c0-1.41.5-2.703 1.326-3.72l.17-.2L3 9.86a1 1 0 01-.117-1.993L3 7.86h5.456c.755 0 1.433.42 1.77 1.094.426.861 1.138 2.29 1.241 2.472.418.744 1.586.67 2.095.422.738-.36 1.484-1.112 1.865-1.659.106-.153.313-.605.087-1.15l-.066-.138-1.656-2.9h-1.378a1 1 0 01-.117-1.994L12.414 4h1.96zm4.356 11.737c-.631 0-1.145.513-1.145 1.144a1.145 1.145 0 101.145-1.144zm-12.505 0a1.145 1.145 0 000 2.288 1.145 1.145 0 000-2.288z"></path>
                    </svg>
                    <strong>Entrega: {{ order.delivery_time }}</strong>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PaymentMethod",
    props: ['order'],
    data() {
        return {
            payments: [
                {
                    id: 1,
                    type: "VISA",
                    number: "****1234",
                    exp: "05/23",
                },
            ],
            payment_selected: null,
            coupon_container_open: false,
            coupon_value: '',
            months: ["MM", '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12',],
            years: ["YY", '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'],
        }
    },
    methods: {
        expand_collapse: function(id) {
            var element = $('#' + id);
            if (id !== this.payment_selected) {
                if (this.payment_selected != null) {
                    var prev_element = $('#' + this.payment_selected);
                    prev_element.find('#radio').removeClass('payment-type-radio-active');
                    prev_element.find('#angle').removeClass('fa-angle-up').addClass('fa-angle-down');
                    prev_element.find('#payment-body').css('display', 'none');
                }
                element.find('#radio').addClass('payment-type-radio-active');
                element.find('#angle').addClass('fa-angle-up').removeClass('fa-angle-down');
                element.find('#payment-body').css('display', 'block');
                this.payment_selected = id;
            } else {
                element.find('#radio').removeClass('payment-type-radio-active');
                element.find('#angle').removeClass('fa-angle-up').addClass('fa-angle-down');
                element.find('#payment-body').css('display', 'none');
                this.payment_selected = null;
            }
        },
        open_close_coupon: function(evt) {
            evt.preventDefault();
            this.coupon_container_open = !this.coupon_container_open;
            console.log(this.coupon_container_open);
        },
        apply_coupon: function(evt) {
            evt.preventDefault();
        },
        pay: function(evt) {
            evt.preventDefault();
            var payed= true;
            if(evt.currentTarget.id == "cash-payment"){
                payed = false;
            }
            window.axios.put('/order/' + this.order.id + '/pay',
                {
                    payed: payed,
                },
            )
            .then(response => {
                window.location.href = '/';
            })
            .catch((error) => {
                if (error.response.status == 401) {
                    window.localStorage.removeItem('auth_token');
                    window.localStorage.removeItem('username');
                    window.location.href = '/login';
                }

                if (error.response.status == 403) {
                    window.location.href = '/';
                }
            });
        },
        subtotal: function() {
            var subtotal = 0;
            for (let i = 0; i < this.order.orderItems.length; i++) {
                subtotal += this.order.orderItems[i].price * this.order.orderItems[i].quantity;
            }

            return subtotal;
        },
    }
};
</script>
