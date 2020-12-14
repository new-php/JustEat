<template>
    <div class="info-background">
        <form class="info-container" align="middle" >
            <span class="info-label">Preferencias de contacto</span>

            <div class="form-done" id="form-done">
                <span>Tus preferencias de contacto se han actualizado</span>
            </div>
            <div class="form-error" id="form-error">
                <span>Ha habido algun error en guardar tus cambios, prueba más tarde.</span>
            </div>

            <div class="check-block">
                <h4>Conocer las notifiaciones del pedido por</h4>
                <div class="form-check">
                    <input id="sms" type="checkbox" disabled checked>
                    <label class="check-label" for="sms">SMS (Solo para notificaciones importantes)</label>
                </div>
                <div class="form-check">
                    <input id="email" type="checkbox" disabled checked>
                    <label class="check-label" for="email">Email (Las confirmaciones del pedido te las enviamos por email)</label>
                </div>
            </div>

            <div class="check-block">
                <h4>Recibe ofertas y descuentos por</h4>
                <div class="form-check">
                    <input id="sms_offers" type="checkbox" v-model="sms_offers">
                    <label class="check-label" for="sms_offers">SMS</label>
                </div>
                <div class="form-check">
                    <input id="email_offers" type="checkbox" v-model="email_offers">
                    <label class="check-label" for="email_offers">Email</label>
                </div>
            </div>


            <button id="save" v-on:click="save" type="submit" class="btn submit-button">
                <span class="submit-button-text"><strong>Guardar cambios</strong></span>
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "UserInfo",
        props: ['sms_offers', 'email_offers', 'id'],
        data() {
            return {
            }
        },
        methods: {
            save(event) {
                event.preventDefault();
                window.axios.put('user/' + this.id,
                    {
                        sms_offers: this.sms_offers,
                        email_offers: this.email_offers,
                    },
                )
                .then(response => {
                    $('#form-done').addClass("form-done-active");
                })
                .catch((error) => {
                    $('#form-error').addClass("form-error-active");
                    if (error.response.status == 401) {
                        window.localStorage.removeItem('auth_token');
                        window.localStorage.removeItem('username');
                        window.location.href = '/login';
                    }
                });
            }
        }
    };
</script>
