<template>
    <div class="bg-white pt-4">
        <div class="delivery-container" align="middle">
            <div class="delivery-title">
                <span>Confirma los datos de entrega</span>
            </div>
            <div class="delivery-name">
                <span>¿No eres {{username}}? <a dusk="change-user" class="change-user-link" href="#" v-on:click="change_user()"><strong>Cambia de usuario</strong></a></span>
            </div>
            <div class="mt-2">
                <span>Nombre</span>
            </div>
            <div class="delivery-input-container">
                <input class="delivery-input" id="Name" dusk="name" placeholder="Nombre" type="text" v-model="name" required>
            </div>
            <div>
                <span>Teléfono</span>
            </div>
            <div class="delivery-input-container">
                <input class="delivery-input" dusk="phone" placeholder="Teléfono" type="tel" v-model="phone" required>
            </div>
            <div>
                <span>Dirección</span>
            </div>
            <div class="delivery-input-container">
                <input class="delivery-input" dusk="address1" placeholder="Calle y número (Ej: Calle del alba 12)" type="text" v-model="address_line_1" required>
                <input class="delivery-input mt-2" dusk="address2" placeholder="Piso y puerta (Ej: Entresuelo B)" v-model="address_line_2" type="text">
                <input class="delivery-input mt-2" dusk="obs" placeholder="Observaciones (Ej: Timbre 254)" v-model="details" type="text">
            </div>
            <div>
                <span>Ciudad</span>
            </div>
            <div class="delivery-input-container">
                <input class="delivery-input" dusk="city" placeholder="Ciudad" type="text" v-model="city" required>
            </div>
            <div>
                <span>Código Postal</span>
            </div>
            <div class="delivery-input-container">
                <input class="delivery-input" dusk="post_code" placeholder="Código postal" type="text" v-model="post_code" required>
            </div>
            <div>
                <button type="submit" id="continuar-button" dusk="continuar-button" v-on:click="goToDeliveryTime()" class="btn delivery-button mt-1"><strong>Continuar</strong></button>
            </div>
        </div>
    </div>

</template>

<script>
  export default {
    name: "OrderDeliveryAddress",
    props: ['order'],
    data() {
        return {
            name: '',
            phone: '',
            address_line_1: '',
            address_line_2: '',
            details: '',
            city: '',
            post_code: '',
        }
    },
    methods: {
        goToDeliveryTime() {
            this.checkRequiredFields();

            window.axios.put('/order/' + this.order.id + '/address',
                {
                    name: this.name,
                    phone: this.phone,
                    address_line_1: this.address_line_1,
                    address_line_2: this.address_line_2,
                    details: this.details,
                    city: this.city,
                    post_code: this.post_code,
                }
            )
            .then(response => {
                window.location.href = '/order/' + this.order.id + '/delivery-time';
            })
            .catch(error => {
                if (error.response.status == 401) {
                    window.localStorage.removeItem('auth_token')
                    window.location.href = '/';
                }

                if (error.response.status == 403) {
                    window.location.href = '/';
                }
            })
        },
        checkRequiredFields() {

        },
        change_user() {
            window.localStorage.removeItem('auth_token');
            window.localStorage.removeItem('username');
            window.location.href = '/login';             
        },
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
    }
  };
</script>
