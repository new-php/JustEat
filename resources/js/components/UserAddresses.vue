<template>
    <div class="addresses-container">
        <h1 class="title">Libreta de direcciones</h1>

        <p class="info-text">
            Crea y guarda direcciones de entrega para hacer tus pedidos <br> 
            fácilmente
        </p>

        <section class="addresses" v-for="address in list_addresses" :key="address.id" :id="'address-' + address.id">
            <strong>{{address.postal_code}}</strong>
            <span>
                <a href="/account" class="link-edit" id="link-edit">
                    <strong>Editar <br></strong>
                </a>
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
                list_addresses: this.addresses,
            }
        },

        methods: {
            deleteAddress: function(product) {
                for (let i = 0; i < this.list_addresses.length; i++) {
                    if (product.id == this.list_addresses[i].id) {
                        this.list_addresses.splice(i, 1);
                    }
                }

                if (this.list_addresses.length <= 0) {
                    this.list_addresses = null;
                }
            },
        },

    };
</script>