<template>
    <div class="addresses-container">
        <h1 class="title">Libreta de direcciones</h1>

        <p class="info-text">
            Crea y guarda direcciones de entrega para hacer tus pedidos <br> 
            fácilmente
        </p>

        <section class="addresses" v-for="address in addresses" :key="address.id" :id="'address-' + address.id">
            <strong>{{address.postal_code}}</strong>
            <span>
                <strong class="link-edit" id="link-edit" v-on:click="goToAddress(address)">Editar <br></strong>
            </span>


            <strong class="link-delete" v-on:click="deleteAddress(address)" id="link-delete">
                Eliminar
            </strong>


            <div class="name-address">
                {{address.address_line_1}}
            </div>

        </section>
    </div>
</template>

<script>
    export default {
        name: "UserAddresses",
        props: ['addresses'],
        data() {
            return {
            }
        },

        methods: {
            deleteAddress: function(address) {
                window.axios.delete('/address/' + address.id)
                .then(response => {
                    for (let i = 0; i < this.addresses.length; i++) {
                        if (address.id == this.addresses[i].id) {
                            this.addresses.splice(i, 1);
                        }
                    }
                })
                .catch((error) => {
                    if (error.response.status == 401) {
                        window.localStorage.removeItem('auth_token')
                        window.location.href = '/login';
                    }
                });
            },



            goToAddress(address) {
                window.location.href = "/account/" + address.id;
            },
        },

    };
</script>