<template>
    <div class="view">
        <div class="header">
            <a href="/"><strong>Inicio</strong></a>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span>{{this.name_tab_selected}}</span>
        </div>

        <div class="app-container">
            <div class="options-container">
                <div id="info-user" class="option option-selected" v-on:click="change_tab('info-user')">
                    Información de la cuenta
                </div>
                <div id="pedidos" class="option" v-on:click="change_tab('pedidos')">
                    Pedidos
                </div>
                <div id="dir-reparto" class="option" v-on:click="change_tab('dir-reparto')">
                    Direcciones de reparto
                </div>
                <div id="contacto" class="option" v-on:click="change_tab('contacto')">
                    Preferencias de contacto
                </div>
            </div>

            <main class="restaurant-products-container" v-if="tab_selected === 'info-user'">  
                <section>
                    <user-information :id="user.id" :name="user.name" :email="user.email" :phone="user.phone"></user-information>
                </section>
            </main>

            <main class="restaurant-products-container" v-if="tab_selected === 'pedidos'">
                <section>
                    <user-orders></user-orders>
                </section>
            </main>

            <main class="restaurant-products-container" v-if="tab_selected === 'dir-reparto'">
                <section>
                    <user-addresses :addresses="user.addresses"></user-addresses>
                </section>
            </main>

            <main class="restaurant-products-container" v-if="tab_selected === 'contacto'">
                <section>
                    <user-contact :id="user.id" :sms_offers="user.sms_offers" :email_offers="user.email_offers"></user-contact>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserManagementPage",

    data() {
        return {
            user: "",
            tab_selected: 'info-user',
            name_tab_selected: 'Información de la cuenta',
        }
    },

    mounted(){
        window.axios.get('user')
            .then(response => {
                this.user = response.data.data;
            })
            .catch(response => {
                if (error.response.status == 401) {
                    window.localStorage.removeItem('auth_token');
                    window.localStorage.removeItem('username');
                    window.location.href = '/login';
                }
            });
    },

    methods: {
        change_tab: function(tab) {
            if (tab === 'info-user') {
                $('#info-user').addClass('option-selected');
                $('#pedidos').removeClass('option-selected');
                $('#dir-reparto').removeClass('option-selected');
                $('#contacto').removeClass('option-selected');
                this.tab_selected = 'info-user';
                this.name_tab_selected = 'Información de la cuenta';
            } else if(tab === 'pedidos'){
                $('#pedidos').addClass('option-selected');
                $('#info-user').removeClass('option-selected');
                $('#dir-reparto').removeClass('option-selected');
                $('#contacto').removeClass('option-selected');
                this.tab_selected = 'pedidos';
                this.name_tab_selected = 'Pedidos';
            } else if(tab === 'dir-reparto'){
                $('#dir-reparto').addClass('option-selected');
                $('#pedidos').removeClass('option-selected');
                $('#info-user').removeClass('option-selected');
                $('#contacto').removeClass('option-selected');
                this.tab_selected = 'dir-reparto';
                this.name_tab_selected = 'Direcciones de reparto';
            } else{
                $('#contacto').addClass('option-selected');
                $('#pedidos').removeClass('option-selected');
                $('#dir-reparto').removeClass('option-selected');
                $('#info-user').removeClass('option-selected');
                this.tab_selected = 'contacto';
                this.name_tab_selected = 'Preferencias de contacto';
            }
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
    },
    };
</script>