<template>
    <div class="bg-white pt-4 full-height">
        <div class="delivery-address-container" align="middle">
            <div class="delivery-address-title">
                <span>Confirma los datos de entrega</span>
            </div>
            <div class="delivery-address-name">
                <span>¿No eres {{username}}? <a class="change-user-link" href="#"><strong>Cambia de usuario</strong></a>
                </span>
            </div>
            <div class="mt-2">
                <span>Nombre</span>
            </div>
            <div class="delivery-addres-input-container">
                <input class="delivery-addres-input" id="Name" placeholder="Nombre" type="text" :value="username" required>
            </div>
            <div>
                <span>Teléfono</span>
            </div>
            <div class="delivery-addres-input-container">
                <input class="delivery-addres-input" placeholder="Teléfono" type="tel" required>
            </div>
            <div>
                <span>Dirección</span>
            </div>
            <div class="delivery-addres-input-container">
                <input class="delivery-addres-input" placeholder="Calle y número (Ej: Calle del alba 12)" type="text" required>
                <input class="delivery-addres-input mt-2" placeholder="Piso y puerta (Ej: Entresuelo B)" type="text">
                <input class="delivery-addres-input mt-2" placeholder="Observaciones (Ej: Timbre 254)" type="text">
            </div>
            <div>
                <span>Ciudad</span>
            </div>
            <div class="delivery-addres-input-container">
                <input class="delivery-addres-input" placeholder="Ciudad" type="text">
            </div>
            <div>
                <span>Código Postal</span>
            </div>
            <div class="delivery-addres-input-container">
                <input class="delivery-addres-input" placeholder="Código postal" type="text">
            </div>
                <button type="submit" v-on:click="goToDeliveryTime()" class="btn delivery-address-button mt-1"><strong>Continuar</strong></button>
            </div>
        </div>
    </div>

</template>

<script>
  export default {
    name: "OrderDeliveryAddress",
    data() {
        return {
            username: 'Marc Soler Bages'
        }
    },
    mounted() {
    },
    methods: {
        goToDeliveryTime() {
            window.location.href = '/order/delivery-time';
        }
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
