<template>
    <div class="addresses-app">
        <div class="addresses-container" v-if="tab_selected === 'addresses'">
            <h1 class="title">Libreta de direcciones</h1>

            <p class="info-text">
                Crea y guarda direcciones de entrega para hacer tus pedidos <br> 
                fácilmente
            </p>

            <section class="addresses" v-for="address in addresses" :key="address.id" :id="'address-' + address.id">
                <strong>{{address.address_name}}</strong>
                <span>
                    <strong class="link-edit" id="link-edit" v-on:click="change_to_address('address', address)">Editar <br></strong>
                </span>


                <strong class="link-delete" v-on:click="deleteAddress(address)" id="link-delete">
                    Eliminar
                </strong>


                <div class="name-address">
                    {{address.address_line_1}} <br>
                    {{address.address_line_2}}
                </div>

            </section>
        </div>

        <div class="address-container" v-if="tab_selected === 'address'">
            <form class="info-container" align="middle" >
                <span class="title">Editar dirección</span>

                <div>
                    <span>Dirección <br></span>
                    <input id='l1' name="address_line_1" class="info-input-address" v-model="address.address_line_1" placeholder="Calle y número (Ej: Calle del alba 12)" type="text" required>
                    <input id='l2' name="address_line_2" class="info-input-address" v-model="address.address_line_2" placeholder="Piso y puerta (Ej: Entresuelo B)" type="text" required>
                    <input id='obs' name="address_observations" class="info-input-address" v-model="address.observations" placeholder="Observaciones (Ej: Timbre 254)" type="text">
                </div>

                <div>
                    <span>Ciudad <br></span>
                    <input id='city' name="address_city" class="info-input-address" v-model="address.city" placeholder="Ciudad" type="text" required>
                </div>

                <div>
                    <span>Código Postal <br></span>
                    <input id='pc' name="address_postal_code" class="info-input-address" v-model="address.postal_code" placeholder="Código Postal" type="text" required>
                </div>

                <div>
                    <form action="/action_page.php">
                        <span>Elige un nombre para esta dirección <br></span>
                        <label>
                            <input type="radio" value="Casa"> Casa
                        </label><br>
                        <label>
                            <input type="radio" value="Trabajo"> Trabajo
                        </label><br>
                        <label>
                            <input type="radio" value="Own-direction"> Añade tu propia dirección
                        </label><br>
                    </form>
                </div>

                <div>
                    <input id='name' name="address_name" class="info-input-address-1" v-model="address.address_name" placeholder="Nombre de la dirección" type="text" required>
                </div>

                <button id='btnOk' v-on:click="save" type="submit" class="btn submit-button-address">
                    <span class="submit-button-text"><strong>Hecho</strong></span>
                </button>

                <button id='btnCancel' v-on:click="change_to_addresses()" type="button" class="btn submit-button-cancel">
                    <span class="submit-button-text"><strong>Cancelar</strong></span>
                </button>

            </form>
        </div>

    </div>

</template>

<script>
    export default {
        name: "UserAddresses",
        props: ['addresses'],
        data() {
            return {
                tab_selected: 'addresses',
                address: '',
            }
        },

        methods: {

            change_to_address: function(tab, address) {
                if (tab === 'address') {
                    this.tab_selected = 'address';
                    this.address = address;
                }
            },

            change_to_addresses: function() {
                this.tab_selected = 'addresses';
                this.address = '';
            },

            save(event) {
                event.preventDefault();
                window.axios.put('/address/' + this.address.id,
                    {
                        address_name: this.address.address_name,
                        address_line_1: this.address.address_line_1,
                        address_line_2: this.address.address_line_2,
                        observations: this.address.observations,
                        city: this.address.city,
                        post_code: this.address.post_code,
                    },
                )
                .then(response => {
                    this.tab_selected = 'addresses';
                    this.address = '';
                })
                .catch((error) => {
                    if (error.response.status == 401) {
                        window.localStorage.removeItem('auth_token')
                        window.location.href = '/login';
                    }
                });
            },

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

        },

    };
</script>