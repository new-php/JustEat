<template>
    <div class="info-background">
        <form class="info-container" align="middle" >
            <span class="info-label">Cuenta</span>

            <div class="form-done" id="form-done">
                <span>Gracias, la información de tu cuenta ha sido actualizada</span>
            </div>
            <div class="form-error" id="form-error">
                <span>Alguno de los campos introducidos no es válido o está vacio</span>
            </div>

            <div>
                <span>Nombre</span>
                <input name="name" class="info-input" v-model="user.name" placeholder="Introduce tu nombre completo" type="text" required>
            </div>
            <div>
                <span>E-mail</span>
                <input name="email" class="info-input" v-model="user.email" placeholder="Introduce tu email" type="email" value="email_holder" required>
            </div>
            <div>
                <span>Número de teléfono</span>
                <input name="phone" class="info-input" v-model="user.phone" placeholder="Introduce tu número de teléfono" type="text" value="phone_number" required>
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
        props: ['user'],
        data() {
            return {
            }
        },
        methods: {
            save(event) {
                event.preventDefault();
                window.axios.put('user/' + this.user.id,
                    {
                        name: this.user.name,
                        email: this.user.email,
                        phone: this.user.phone,
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
